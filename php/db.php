<?php
require __DIR__ . '/../vendor/autoload.php'; // 自動加載 Composer 包

use Dotenv\Dotenv;

// 加載 .env 文件
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$port = $_ENV['DB_PORT'];

try {
    // 加入 port 參數
    $mysqli = new mysqli($host, $username, $password, $dbname, $port);

    if ($mysqli->connect_error) {
        throw new Exception('資料庫連線失敗，請與開發人員聯絡: ' . $mysqli->connect_error);
    }
    mysqli_query($mysqli, "SET time_zone = '+08:00'");
    // 不要在這裡關閉連線，保持連線以供其他文件使用
} catch (Exception $e) {
    die('連接錯誤: ' . $e->getMessage());
}
