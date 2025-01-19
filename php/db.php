<?php
$host = 'hkg1.clusters.zeabur.com';
$dbname = 'chainee';
$username = 'root';
$password = 'Q0Fo1y35IU7sbGKE426nHWPl9AY8DigM';
$port = 32709; 

try {
    // 加入 port 參數
    $mysqli = new mysqli($host, $username, $password, $dbname, $port);

    if ($mysqli->connect_error) {
        throw new Exception('資料庫連線失敗，請與開發人員聯絡: ' . $mysqli->connect_error);
    }

    // 不要在這裡關閉連線，保持連線以供其他文件使用
} catch (Exception $e) {
    die('連接錯誤: ' . $e->getMessage());
}
?>