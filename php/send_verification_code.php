<?php
require 'db.php';
require '../vendor/autoload.php'; // 使用 PHPMailer 或其他郵件庫

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => '無效的電子信箱格式']);
        exit;
    }

    try {
        // 生成隨機驗證碼
        $verificationCode = random_int(100000, 999999);

        // 檢查是否已有驗證碼記錄
        $stmt = $mysqli->prepare("SELECT id FROM email_verifications WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // 更新已有的驗證碼
            $stmt = $mysqli->prepare("UPDATE email_verifications SET verification_code = ?, created_at = NOW() WHERE email = ?");
            $stmt->bind_param('ss', $verificationCode, $email);
        } else {
            // 插入新的驗證碼記錄
            $stmt = $mysqli->prepare("INSERT INTO email_verifications (email, verification_code, created_at) VALUES (?, ?, NOW())");
            $stmt->bind_param('ss', $email, $verificationCode);
        }

        $stmt->execute();

        // 寄送驗證碼
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chainee@chainee.io';
        $mail->Password = 'fwsb bbhu vcai esuv';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('chainee@chainee.io', '鏈習生');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = '註冊驗證碼';
        $mail->Body = "您的驗證碼為：<b>$verificationCode</b>，請於 15 分鐘內完成驗證。";

        if ($mail->send()) {
            echo json_encode(['status' => 'success']);
        } else {
            throw new Exception('郵件寄送失敗');
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>
