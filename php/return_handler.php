<?php
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
