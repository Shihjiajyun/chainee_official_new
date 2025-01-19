<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $verificationCode = $_POST['verificationCode'];

    $stmt = $mysqli->prepare("SELECT id FROM email_verifications WHERE email = ? AND verification_code = ? AND created_at >= NOW() - INTERVAL 15 MINUTE");
    $stmt->bind_param('ss', $email, $verificationCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => '驗證碼不正確或已過期']);
    }
}
?>
