<?php
require 'db.php'; // 引入資料庫連接設定
require '../vendor/autoload.php'; // 引入 Composer autoload

use Google\Cloud\Storage\StorageClient;

session_start();

$userId = $_SESSION['user_id']; // 假設使用者 ID 存在 session 中

// 表單提交處理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];
    $profession = $_POST['profession'];
    $skills = implode(',', $_POST['skills'] ?? []);
    $interests = implode(',', $_POST['interests'] ?? []);
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    // 查詢目前的頭貼 URL
    $query = "SELECT avatar FROM users WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $currentAvatarUrl = $result->fetch_assoc()['avatar'];
    $stmt->close();

    // Google Cloud Storage 上傳邏輯
    $avatarUrl = $currentAvatarUrl; // 預設為當前頭貼 URL
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['avatar'];
        $fileName = uniqid() . '-' . basename($file['name']);
        $tempFilePath = $file['tmp_name'];

        // 初始化 Google Cloud Storage 客戶端
        $storage = new StorageClient([
            'keyFilePath' => '../json/user_image.json', // 替換為您的金鑰檔案路徑
        ]);

        $bucketName = 'chainee_user_img'; // 替換為您的存儲桶名稱
        $bucket = $storage->bucket($bucketName);

        // 上傳檔案
        $object = $bucket->upload(
            fopen($tempFilePath, 'r'),
            [
                'name' => "avatars/{$fileName}" // 存儲路徑
            ]
        );

        // 獲取檔案的公開 URL
        $avatarUrl = "https://storage.googleapis.com/{$bucketName}/avatars/{$fileName}";
    }

    // 更新資料庫
    $query = "UPDATE users 
              SET username = ?, email = ?, nickname = ?, bio = ?, profession = ?, skills = ?, 
                  interests = ?, birthday = ?, gender = ?, avatar = ?, updated_at = NOW() 
              WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        'ssssssssssi',
        $username,
        $email,
        $nickname,
        $bio,
        $profession,
        $skills,
        $interests,
        $birthday,
        $gender,
        $avatarUrl,
        $userId
    );

    if ($stmt->execute()) {
        header('Location: ../user.php?success=1'); // 更新成功
    } else {
        header('Location: ../user.php?success=0'); // 更新失敗
    }

    exit;
}
