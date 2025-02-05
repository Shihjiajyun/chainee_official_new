<?php
require 'db.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;
use Google\Cloud\Storage\StorageClient;

// 上传到 Google Cloud Storage 的函数
function uploadToGoogleCloudStorage($filePath, $bucketName, $objectName, $serviceAccountKey)
{
    $storage = new StorageClient([
        'keyFilePath' => $serviceAccountKey
    ]);

    $bucket = $storage->bucket($bucketName);

    $bucket->upload(
        fopen($filePath, 'r'),
        ['name' => $objectName]
    );

    return sprintf('https://storage.googleapis.com/%s/%s', $bucketName, $objectName);
}

// 获取 URL 参数
$transaction_id = $_GET['transaction_id'] ?? '';
$amount = $_GET['amount'] ?? 0;
$plan = $_GET['plan'] ?? '未知方案';
$email = $_GET['email'] ?? '';
$name = $_GET['name'] ?? '匿名用戶';
$birth_date = $_GET['birth_date'] ?? null;

// 检查必要字段
if (empty($transaction_id) || empty($amount) || empty($email)) {
    die('缺少必要的支付信息，無法完成處理。');
}

// 设置 UTC+8 时间
$datetime = new DateTime('now', new DateTimeZone('Asia/Taipei'));
$paid_at = $datetime->format('Y-m-d H:i:s');

// 生成 QR Code
$qrCode = bin2hex(random_bytes(16));
$builder = new Builder(
    writer: new PngWriter(),
    writerOptions: [],
    validateResult: false,
    data: $qrCode,
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::High,
    logoPath: __DIR__ . '/../img/logo.png',
    logoResizeToWidth: 50,
    logoPunchoutBackground: true,
    size: 150,
    margin: 5
);

$result = $builder->build();
$tempFilePath = sys_get_temp_dir() . '/' . $qrCode . '.png';
$result->saveToFile($tempFilePath);

// 上传 QR Code 到 Google Cloud Storage
$bucketName = 'chainee_qrcode';
$objectName = 'qrcodes/' . $qrCode . '.png';
$serviceAccountKey = '../celestial-tract-442203-c1-e0b50de74a4e.json';

$qrCodeUrl = uploadToGoogleCloudStorage($tempFilePath, $bucketName, $objectName, $serviceAccountKey);
unlink($tempFilePath); // 删除本地临时文件

// 插入支付记录到数据库
$registration_query = $mysqli->prepare("
    INSERT INTO completed_registrations (transaction_id, email, from_address, to_address, plan, amount, name, birth_date, paid_at, qr_code)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");
$registration_query->bind_param(
    'sssssdssss',
    $transaction_id,
    $email,
    null, // 台币付款不涉及 from_address
    null, // 台币付款不涉及 to_address
    $plan,
    $amount,
    $name,
    $birth_date,
    $paid_at,
    $qrCode
);

if ($registration_query->execute()) {
    // 发送电子邮件
    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chainee@chainee.io';
        $mail->Password = 'fwsb bbhu vcai esuv';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('chainee@chainee.io', '鏈習生');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = '付款成功通知';
        $mail->Body = "
            <h1>付款成功</h1>
            <p>親愛的 {$name}，您已成功完成付款！</p>
            <p><strong>交易 ID:</strong> {$transaction_id}</p>
            <p><strong>票類型:</strong> " . htmlspecialchars($plan, ENT_QUOTES, 'UTF-8') . "</p>
            <p><strong>付款金額:</strong> {$amount} TWD</p>
            <p><strong>付款時間:</strong> {$paid_at} (UTC+8)</p>
            <p><strong>生日:</strong> " . ($birth_date ? htmlspecialchars($birth_date, ENT_QUOTES, 'UTF-8') : '未提供') . "</p>
            <p>以下是您的專屬 QR Code：</p>
            <img src='{$qrCodeUrl}' alt='QR Code'>
            <p>感謝您的參與！</p>
        ";

        $mail->send();
        echo "<h1>付款成功！</h1><p>通知郵件已發送到 {$email}</p>";
    } catch (Exception $e) {
        echo "<h1>付款成功！</h1><p>但郵件發送失敗: {$mail->ErrorInfo}</p>";
    }
} else {
    echo "<h1>付款成功！</h1><p>但記錄保存失敗: {$registration_query->error}</p>";
}
?>
