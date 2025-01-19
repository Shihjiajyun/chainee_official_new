<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $referralCode = $_POST['referralCode'] ?? null;
    $username = $email; // 預設使用者名稱為電子信箱

    // 插入資料到資料庫
    $stmt = $mysqli->prepare("INSERT INTO users (email, password, referral_code, username, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param('ssss', $email, $password, $referralCode, $username);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => '註冊失敗，請稍後再試']);
    }
}
?>
