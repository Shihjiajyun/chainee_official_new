<?php
require 'db.php'; // 引入資料庫連接設定
require '../vendor/autoload.php'; // 引入 Composer autoload

use Google\Cloud\Storage\StorageClient;

session_start();
$allowed_users = file('../allowed_users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// 檢查目前用戶是否登入，以及是否在允許列表中
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_id'], $allowed_users)) {
    header('Location: ../login.php');
    exit();
}

// 初始化 Google Cloud Storage 客戶端和存儲桶
try {
    $storage = new StorageClient([
        'keyFilePath' => '../json/user_image.json', // 替換為您的金鑰檔案路徑
    ]);
    $bucketName = 'chainee_course_mainimg'; // 替換為您的存儲桶名稱
    $bucket = $storage->bucket($bucketName);
} catch (Exception $e) {
    die('Google Cloud Storage 初始化失敗：' . $e->getMessage());
}

// 表單提交處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['id'];
    $course_name = $_POST['course_name'];
    $course_price = $_POST['course_price'];
    $course_description = $_POST['course_description'];
    $start_date = $_POST['start_date'];
    $duration = $_POST['duration'];
    $units = $_POST['units'];
    $course_summary = $_POST['course_summary'];

    // 初始化圖片 URL
    $courseImageUrl = null;
    $courseIntroImageUrl = null;

    // 上傳課程主圖
    if (isset($_FILES['course_image']) && $_FILES['course_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['course_image'];
        $fileName = uniqid() . '-' . basename($file['name']);
        $tempFilePath = $file['tmp_name'];

        try {
            // 上傳檔案
            $object = $bucket->upload(
                fopen($tempFilePath, 'r'),
                [
                    'name' => "courses/{$fileName}",
                ]
            );

            // 獲取檔案的公開 URL
            $courseImageUrl = "https://storage.googleapis.com/{$bucketName}/courses/{$fileName}";
        } catch (Exception $e) {
            die('課程主圖上傳到 GCS 失敗：' . $e->getMessage());
        }
    }

    // 上傳課程介紹長圖
    if (isset($_FILES['course_intro_image']) && $_FILES['course_intro_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['course_intro_image'];
        $fileName = uniqid() . '-' . basename($file['name']);
        $tempFilePath = $file['tmp_name'];

        try {
            // 使用相同的存儲桶，分不同目錄存儲介紹圖
            $object = $bucket->upload(
                fopen($tempFilePath, 'r'),
                [
                    'name' => "courses/intro/{$fileName}",
                ]
            );

            // 獲取介紹圖的公開 URL
            $courseIntroImageUrl = "https://storage.googleapis.com/{$bucketName}/courses/intro/{$fileName}";
        } catch (Exception $e) {
            die('課程介紹長圖上傳到 GCS 失敗：' . $e->getMessage());
        }
    }

    if ($course_id == 0) {
        // 新增課程
        $query = "INSERT INTO courses (course_name, course_price, course_image, course_intro_image, course_description, start_date, duration, units, course_summary, created_at)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param(
            'sdssssiss',
            $course_name,
            $course_price,
            $courseImageUrl,
            $courseIntroImageUrl,
            $course_description,
            $start_date,
            $duration,
            $units,
            $course_summary
        );
    } else {
        // 更新課程
        $query = "UPDATE courses
                  SET course_name = ?, course_price = ?, course_description = ?, start_date = ?, duration = ?, 
                      units = ?, course_summary = ?, updated_at = NOW()";

        if ($courseImageUrl) {
            $query .= ", course_image = ?";
        }
        if ($courseIntroImageUrl) {
            $query .= ", course_intro_image = ?";
        }

        $query .= " WHERE id = ?";

        if ($courseImageUrl && $courseIntroImageUrl) {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param(
                'sdsssisssi',
                $course_name,
                $course_price,
                $course_description,
                $start_date,
                $duration,
                $units,
                $course_summary,
                $courseImageUrl,
                $courseIntroImageUrl,
                $course_id
            );
        } elseif ($courseImageUrl) {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param(
                'sdsssissi',
                $course_name,
                $course_price,
                $course_description,
                $start_date,
                $duration,
                $units,
                $course_summary,
                $courseImageUrl,
                $course_id
            );
        } elseif ($courseIntroImageUrl) {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param(
                'sdsssissi',
                $course_name,
                $course_price,
                $course_description,
                $start_date,
                $duration,
                $units,
                $course_summary,
                $courseIntroImageUrl,
                $course_id
            );
        } else {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param(
                'sdsssisi',
                $course_name,
                $course_price,
                $course_description,
                $start_date,
                $duration,
                $units,
                $course_summary,
                $course_id
            );
        }
    }

    if ($stmt->execute()) {
        if ($course_id == 0) {
            header("Location: ../admin_courses.php?success=created");
        } else {
            header("Location:../admin_course.php?id={$course_id}&success=1");
        }
    } else {
        die('資料庫操作失敗：' . $stmt->error);
    }
}
