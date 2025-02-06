<?php
require 'db.php'; // 連接資料庫

header('Content-Type: application/json');

if (!isset($_GET['article_id'])) {
    echo json_encode(["message" => "請提供 article_id"]);
    exit;
}

$article_id = $mysqli->real_escape_string($_GET['article_id']);
$query = "SELECT html_content FROM subscriptions_articles WHERE article_id = '$article_id'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "html_content" => $row["html_content"]
    ]);
} else {
    echo json_encode(["message" => "文章未找到"]);
}
?>
