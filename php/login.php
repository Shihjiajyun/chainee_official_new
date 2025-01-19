<?php
require 'db.php'; // 引入資料庫連線

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    try {
        // 確保 email 和 password 不為空
        if (!$email || !$password) {
            echo json_encode(['status' => 'error', 'message' => '請提供電子信箱和密碼']);
            exit;
        }

        // 查詢用戶，選取所需的所有欄位
        $stmt = $mysqli->prepare("SELECT id, password, username, email, nickname FROM users WHERE email = ?");
        if (!$stmt) {
            throw new Exception('查詢準備失敗: ' . $mysqli->error);
        }

        $stmt->bind_param('s', $email); // 綁定參數
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // 驗證密碼
        if ($user && password_verify($password, $user['password'])) {
            // 登入成功
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_nickname'] = $user['nickname']; // 修正拼寫錯誤
            echo json_encode(['status' => 'success', 'message' => '登入成功', 'redirect' => 'index.php']);
        } else {
            // 帳號或密碼錯誤
            echo json_encode(['status' => 'error', 'message' => '帳號或密碼錯誤']);
        }
    } catch (Exception $e) {
        // 捕獲例外並返回錯誤信息
        echo json_encode(['status' => 'error', 'message' => '伺服器錯誤: ' . $e->getMessage()]);
    }
}
?>
