<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // 查詢用戶
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // 登入成功
            session_start();
            $_SESSION['user_id'] = $user['id'];
            echo json_encode(['status' => 'success', 'message' => '登入成功']);
        } else {
            echo json_encode(['status' => 'error', 'message' => '帳號或密碼錯誤']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => '伺服器錯誤: ' . $e->getMessage()]);
    }
}
?>
