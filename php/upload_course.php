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

// 表單提交處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['id']; // 接收隱藏欄位中的課程 ID
    $course_name = $_POST['course_name'];
    $course_price = $_POST['course_price'];
    $course_description = $_POST['course_description'];
    $start_date = $_POST['start_date'];
    $duration = $_POST['duration'];
    $units = $_POST['units'];
    $course_summary = $_POST['course_summary'];

    // 初始化課程圖片 URL 為 NULL，僅當用戶上傳新圖片時更新
    $courseImageUrl = null;

    if (isset($_FILES['course_image']) && $_FILES['course_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['course_image'];
        $fileName = uniqid() . '-' . basename($file['name']);
        $tempFilePath = $file['tmp_name'];

        try {
            // 初始化 Google Cloud Storage 客戶端
            $storage = new StorageClient([
                'keyFilePath' => '../json/user_image.json', // 替換為您的金鑰檔案路徑
            ]);

            $bucketName = 'chainee_course_mainimg'; // 替換為您的存儲桶名稱
            $bucket = $storage->bucket($bucketName);

            // 上傳檔案
            $object = $bucket->upload(
                fopen($tempFilePath, 'r'),
                [
                    'name' => "courses/{$fileName}", // 存儲路徑
                ]
            );

            // 獲取檔案的公開 URL
            $courseImageUrl = "https://storage.googleapis.com/{$bucketName}/courses/{$fileName}";
        } catch (Exception $e) {
            die('圖片上傳到 GCS 失敗：' . $e->getMessage());
        }
    }

    // 更新資料庫，保存課程資訊
    // 如果 $courseImageUrl 為 NULL，則保留原圖片
    $query = "UPDATE courses
              SET course_name = ?, course_price = ?, course_description = ?, start_date = ?, duration = ?, 
                  units = ?, course_summary = ?, updated_at = NOW()";

    if ($courseImageUrl) {
        $query .= ", course_image = ?";
    }

    $query .= " WHERE id = ?";

    if ($courseImageUrl) {
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

    if ($stmt->execute()) {
        header("Location: ../admin_course.php?id={$course_id}&success=1"); // 更新成功後返回到該課程頁面
    } else {
        die('資料庫更新失敗：' . $stmt->error);
    }
}
