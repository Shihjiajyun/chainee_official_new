<?php
require 'db.php'; // 連接資料庫

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['article_id']) || !isset($data['markdown_content']) || !isset($data['html_content'])) {
    echo json_encode(["message" => "缺少必要參數"]);
    exit;
}

$article_id = $mysqli->real_escape_string($data['article_id']);
$markdown_content = $mysqli->real_escape_string($data['markdown_content']);
$html_content = $mysqli->real_escape_string($data['html_content']);

$query = "INSERT INTO subscriptions_articles (article_id, markdown_content, html_content) 
          VALUES ('$article_id', '$markdown_content', '$html_content')";

if ($mysqli->query($query)) {
    echo json_encode(["message" => "文章已成功儲存"]);
} else {
    echo json_encode(["message" => "儲存失敗: " . $mysqli->error]);
}
?>
