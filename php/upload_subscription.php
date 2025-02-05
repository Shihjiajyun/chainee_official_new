<?php
require 'db.php'; // 連接資料庫
require '../vendor/autoload.php'; // 引入 Composer autoload

use Google\Cloud\Storage\StorageClient;

session_start();
$allowed_users = file('../allowed_users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 檢查目前用戶是否登入，以及是否在允許列表中
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_id'], $allowed_users)) {
    header('Location: ../login.php');
    exit();
}

// 初始化 Google Cloud Storage
try {
    $storage = new StorageClient([
        'keyFilePath' => '../json/user_image.json',
    ]);
    $bucketName = 'chainee_course_mainimg';
    $bucket = $storage->bucket($bucketName);
} catch (Exception $e) {
    die('Google Cloud Storage 初始化失敗：' . $e->getMessage());
}

// 表單提交處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $topic_id = $_POST['id'];
    $title = $_POST['title'];
    $creator = $_POST['creator'];
    $description = $_POST['description'];
    $outline = $_POST['outline'];
    $price = isset($_POST['price']) ? intval($_POST['price']) : 0;


    // 初始化圖片 URL
    $mainVisualUrl = null;
    $longImageUrl = null;

    // 上傳主題封面圖
    if (isset($_FILES['main_visual']) && $_FILES['main_visual']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['main_visual'];
        $fileName = uniqid() . '-' . basename($file['name']);
        $tempFilePath = $file['tmp_name'];

        try {
            $object = $bucket->upload(
                fopen($tempFilePath, 'r'),
                ['name' => "subscriptions/{$fileName}"]
            );
            $mainVisualUrl = "https://storage.googleapis.com/{$bucketName}/subscriptions/{$fileName}";
        } catch (Exception $e) {
            die('主題封面圖上傳失敗：' . $e->getMessage());
        }
    }

    // 上傳長圖
    if (isset($_FILES['long_image']) && $_FILES['long_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['long_image'];
        $fileName = uniqid() . '-' . basename($file['name']);
        $tempFilePath = $file['tmp_name'];

        try {
            $object = $bucket->upload(
                fopen($tempFilePath, 'r'),
                ['name' => "subscriptions/long/{$fileName}"]
            );
            $longImageUrl = "https://storage.googleapis.com/{$bucketName}/subscriptions/long/{$fileName}";
        } catch (Exception $e) {
            die('主題長圖上傳失敗：' . $e->getMessage());
        }
    }

    if ($topic_id == 0) {
        // 新增主題
        $query = "INSERT INTO subscription (title, creator, description, main_visual, outline, long_image, price, last_updated) 
          VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param(
            'ssssssd',
            $title,
            $creator,
            $description,
            $mainVisualUrl,
            $outline,
            $longImageUrl,
            $price
        );
    } else {
        // 更新主題
        $query = "UPDATE subscription SET title = ?, creator = ?, description = ?, outline = ?, price = ?, last_updated = NOW()";

        if ($mainVisualUrl) {
            $query .= ", main_visual = ?";
        }
        if ($longImageUrl) {
            $query .= ", long_image = ?";
        }

        $query .= " WHERE id = ?";

        $stmt = $mysqli->prepare($query);
        if (!$stmt) {
            die('SQL 準備失敗：' . $mysqli->error);
        }

        if ($mainVisualUrl && $longImageUrl) {
            $stmt->bind_param('ssssissi', $title, $creator, $description, $outline, $price, $mainVisualUrl, $longImageUrl, $topic_id);
        } elseif ($mainVisualUrl) {
            $stmt->bind_param('ssssisi', $title, $creator, $description, $outline, $price, $mainVisualUrl, $topic_id);
        } elseif ($longImageUrl) {
            $stmt->bind_param('ssssisi', $title, $creator, $description, $outline, $price, $longImageUrl, $topic_id);
        } else {
            $stmt->bind_param('ssssii', $title, $creator, $description, $outline, $price, $topic_id);
        }
    }

    if ($stmt->execute()) {
        if ($topic_id == 0) {
            header("Location: ../admin_subscriptions.php?success=created");
        } else {
            header("Location: ../admin_subscription.php?id={$topic_id}&success=1");
        }
    } else {
        die('資料庫操作失敗：' . $stmt->error);
    }
}
