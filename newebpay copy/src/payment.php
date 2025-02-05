<?php
require __DIR__ . '/../vendor/autoload.php';

use Src\Config\Config;
use Xup6m6fu04\NewebPay\NewebPay;

// 顯示錯誤訊息
ini_set('display_errors', '1');
error_reporting(E_ALL);

// 獲取前端提交的資料
$merchantOrderNo = $_POST['MerchantOrderNo'] ?? generateTimestamp();
$amount = $_POST['final_price'] ?? 0;
$itemDesc = $_POST['course_name'] ?? '未知商品';
$email = $_POST['user_email'] ?? '';
$user_id = $_POST['user_id'] ?? '';
$course_id = $_POST['course_id'] ?? '';
$discount_id = $_POST['discount_id'] ?? null; // 取得折扣碼 ID

// 確保資料的基本安全性
$merchantOrderNo = htmlspecialchars($merchantOrderNo, ENT_QUOTES, 'UTF-8');
$itemDesc = htmlspecialchars($itemDesc, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('提供的電子信箱格式無效。');
}

if ($amount <= 0) {
    die('訂單金額無效。');
}

// 初始化 NewebPay
$config = Config::get();
$newebpay = new NewebPay($config);

// 設定訂單內容
$newebpay = $newebpay->payment(
    $merchantOrderNo, // 訂單編號
    $amount, // 訂單金額
    $itemDesc, // 商品名稱
    $email // 付款人電子信箱
);

$newebpay->setReturnURL(sprintf(
    'https://chainee.io/memes_courses/php/return_handler.php?merchantOrderNo=%s&amount=%s&itemDesc=%s&email=%s&user_id=%s&course_id=%s&discount_id=%s',
    urlencode($merchantOrderNo),
    urlencode($amount),
    urlencode($itemDesc),
    urlencode($email),
    urldecode($user_id),
    urldecode($course_id),
    urldecode($discount_id)

));



// 保持 NotifyURL 不变，用于后端后台通知处理
$newebpay->setNotifyURL('https://chainee.io/memes_courses/newebpay/src/notify.php');

// $newebpay->setReturnURL('https://87946513.zeabur.app/newebpay/src/success.php');
// $newebpay->setNotifyURL('https://87946513.zeabur.app/newebpay/src/notify2.php');
$newebpay->setTokenTerm($email);

// 送出表單
echo $newebpay->submit();

/**
 * 產生隨機字串
 *
 * @param int $length 字串長度
 * @return string
 * @throws Exception
 */
function generateTimestamp(): string
{
    return strval(time()); // 返回當前的 UNIX 時間戳
}
