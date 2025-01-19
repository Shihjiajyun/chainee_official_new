<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];

    // 驗證當前密碼是否正確
    $stmt = $mysqli->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user || !password_verify($currentPassword, $user['password'])) {
        header('Location: ../user.php?error=incorrect_password');
        exit;
    }

    // 更新密碼
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param('si', $hashedPassword, $userId);

    if ($stmt->execute()) {
        header('Location: ../user.php?success=password_updated');
    } else {
        header('Location: ../user.php?error=update_failed');
    }
    exit;
}
?>
