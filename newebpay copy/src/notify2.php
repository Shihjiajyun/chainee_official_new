<?php
require __DIR__.'/../vendor/autoload.php';

use Src\Config\Config;
use Xup6m6fu04\NewebPay\NewebPayCallback;

// 获取藍新支付的通知数据
$callbackData = file_get_contents('php://input');

// 初始化配置
$config = Config::get();
$callback = new NewebPayCallback($config);

// 验证回调签名
if ($callback->validate($callbackData)) {
    $data = $callback->decode($callbackData);

    // 提取用户支付数据
    $merchantOrderNo = $data['Result']['MerchantOrderNo'] ?? '';
    $amount = $data['Result']['Amt'] ?? 0;
    $status = $data['Status'] ?? ''; // 检查支付状态
    $email = $data['Result']['Email'] ?? '';

    if ($status === 'SUCCESS') {
        // 处理支付成功逻辑，比如保存到数据库或调用其他接口
        // 以下为示例逻辑：
        savePaymentToDatabase($merchantOrderNo, $amount, $email);

        // 返回成功响应
        http_response_code(200);
        echo 'SUCCESS';
    } else {
        // 记录支付失败或其他状态
        logPaymentError($data);

        // 返回错误响应
        http_response_code(400);
        echo 'FAIL';
    }
} else {
    // 签名验证失败
    http_response_code(400);
    echo 'INVALID SIGNATURE';
}

// 保存支付信息到数据库
function savePaymentToDatabase($orderNo, $amount, $email)
{
    // 这里实现您的数据库保存逻辑
    // 例如使用 PDO 插入数据：
    $pdo = new PDO('mysql:host=localhost;dbname=ticketing', 'username', 'password');
    $stmt = $pdo->prepare('INSERT INTO payments (order_no, amount, email, created_at) VALUES (?, ?, ?, NOW())');
    $stmt->execute([$orderNo, $amount, $email]);
}

// 记录支付错误
function logPaymentError($data)
{
    $errorLog = __DIR__ . '/logs/payment_error.log';
    file_put_contents($errorLog, json_encode($data) . PHP_EOL, FILE_APPEND);
}
