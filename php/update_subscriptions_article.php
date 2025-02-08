<?php
require 'db.php'; // 連接資料庫
require '../vendor/autoload.php'; // Composer 自動加載

use Google\Cloud\Storage\StorageClient;

// 獲取表單數據
$article_id = isset($_POST['article_id']) ? $mysqli->real_escape_string($_POST['article_id']) : '';
$title = isset($_POST['title']) ? $mysqli->real_escape_string($_POST['title']) : '';
$preview_text = isset($_POST['preview_text']) ? $mysqli->real_escape_string($_POST['preview_text']) : '';
$markdown_content = str_replace("\r\n", "\n", $_POST['markdown_content']) ? $mysqli->real_escape_string($_POST['markdown_content']) : '';
$html_content = nl2br($markdown_content); // 簡單轉換 Markdown（可以替換成 Markdown 解析器）

if (!$article_id || !$title || !$preview_text || !$markdown_content) {
    die("缺少必要欄位！");
}

// 1. **獲取當前圖片 URL**
$query = "SELECT preview_image FROM subscriptions_articles WHERE article_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $article_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$currentPreviewImage = $row['preview_image']; // 保留現有圖片
$stmt->close();

// 2. **Google Cloud Storage 上傳邏輯**
$preview_image = $currentPreviewImage; // 預設為當前圖片 URL
if (isset($_FILES['preview_image']) && $_FILES['preview_image']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['preview_image'];
    $fileName = uniqid() . '-' . basename($file['name']);
    $tempFilePath = $file['tmp_name'];

    // **初始化 Google Cloud Storage**
    $storage = new StorageClient([
        'keyFilePath' => '../json/user_image.json', // 替換為你的 GCS 金鑰檔案
    ]);

    $bucketName = 'chainee_user_img'; // 替換為你的 GCS 存儲桶
    $bucket = $storage->bucket($bucketName);

    // **上傳圖片到 GCS**
    $object = $bucket->upload(
        fopen($tempFilePath, 'r'),
        [
            'name' => "article_images/{$fileName}" // 存儲路徑
        ]
    );

    // **獲取圖片公開 URL**
    $preview_image = "https://storage.googleapis.com/{$bucketName}/article_images/{$fileName}";
}

// 3. **更新資料庫**
$query = "UPDATE subscriptions_articles 
          SET title = ?, preview_text = ?, markdown_content = ?, html_content = ?, preview_image = ?, updated_at = NOW()
          WHERE article_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssssss", $title, $preview_text, $markdown_content, $html_content, $preview_image, $article_id);

if ($stmt->execute()) {
    echo "文章更新成功！<a href='../admin_subscriptions.php'>返回文章列表</a>";
} else {
    echo "更新失敗: " . $stmt->error;
}

$stmt->close();
?>
