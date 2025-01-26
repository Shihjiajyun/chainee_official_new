<?php
require_once 'db.php';
require __DIR__.'/../newebpay/newebpay-example/vendor/autoload.php';

use Src\Config\Config;
use Xup6m6fu04\NewebPay\NewebPay;

// 顯示詳細錯誤（僅用於開發環境）
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 檢查是否接收到 POST 數據
if (empty($_POST)) {
    die('未接收到 POST 數據。');
}

// 獲取 TradeInfo 和 TradeSha
$tradeInfo = $_POST['TradeInfo'] ?? null;
$tradeSha = $_POST['TradeSha'] ?? null;

if (!$tradeInfo || !$tradeSha) {
    die('缺少必要的交易資料（TradeInfo 或 TradeSha）。');
}

// 初始化 NewebPay
$config = Config::get();
$newebpay = new NewebPay($config);

$status = $_POST['Status'];
$user_id = $_GET['id'] ?? null; // 從請求中獲取用戶 ID
$course_id = $_GET['course_id'] ?? null; // 從請求中獲取課程 ID
$amount = $_GET['amount'] ?? 0; // 從請求中獲取金額

if (empty($user_id) || empty($course_id) || empty($amount) ) {
    // 跳轉到錯誤頁面並結束執行
    header("Location: ../login.php");
    exit;
}

// 紀錄交易時間
date_default_timezone_set('Asia/Taipei');
$purchase_time = date('Y-m-d H:i:s'); // 使用 PHP 內建時間函數，採用 UTC+8 時區格式

// 設置交易狀態
$transaction_status = ($status === 'SUCCESS') ? 'SUCCESS' : 'FAILED';

// 插入資料到資料表
$stmt = $mysqli->prepare("INSERT INTO user_courses (user_id, course_id, purchase_time, status, amount) VALUES (?, ?, ?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("iissd", $user_id, $course_id, $purchase_time, $transaction_status, $amount);
    if (!$stmt->execute()) {
        // 如果執行失敗，記錄錯誤訊息
        error_log('資料插入失敗：' . $stmt->error);
    }
    $stmt->close();
} else {
    error_log('準備 SQL 語句失敗：' . $mysqli->error);
}

// 確認交易狀態
$status = $_POST['Status'];
if ($status === 'SUCCESS') {
    // 成功，組裝查詢參數
    $query = http_build_query([
        'transaction_id' => $_GET['merchantOrderNo'],
        'amount' => $_GET['amount'],
        'itemDesc' => $_GET['itemDesc'] ?? '未知商品',
        'email' => $_GET['email'] ?? '',
        'user_id' => $_GET['user_id'] ?? ''
    ]);
    header("Location: ../success.php?$query");
    exit;
} else {
    // 失敗，跳轉到錯誤頁面
    header('Location: ../error.php');
    exit;
}
