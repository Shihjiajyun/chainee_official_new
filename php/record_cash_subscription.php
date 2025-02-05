<?php
require_once __DIR__ . '/./db.php'; // 確保資料庫連線
header('Content-Type: application/json');

// 確保所有必要參數存在
if (!isset($_GET['transaction_id'], $_GET['amount'], $_GET['subscription_id'], $_GET['user_id'], $_GET['itemDesc'], $_GET['email'])) {
    die(json_encode(["success" => false, "message" => "缺少必要的參數"]));
}

// 從 URL 取得數據
$transaction_id = $_GET['transaction_id'];
$amount = $_GET['amount'];
$subscription_id = $_GET['subscription_id'];
$user_id = $_GET['user_id'];
$itemDesc = $_GET['itemDesc'];
$created_at = date('Y-m-d H:i:s', time() + 8 * 3600); // 設定 UTC+8 時間
$email = $_GET['email']; // 使用者 Email

// 檢查資料庫連線
if (!isset($mysqli)) {
    die(json_encode(["success" => false, "message" => "資料庫連線失敗"]));
}

// **插入交易紀錄**
$stmt = $mysqli->prepare("INSERT INTO transactions_subscription (user_id, subscription_id, transaction_id, amount, created_at) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iisss", $user_id, $subscription_id, $transaction_id, $amount, $created_at);

if (!$stmt->execute()) {
    die(json_encode(["success" => false, "message" => "交易記錄失敗: " . $stmt->error]));
}

// **開立發票**
$invoiceUrl = 'https://chainee.io/official/php/invoice.php'; // 替換為實際 URL
$invoiceData = [
    'transaction_id' => $transaction_id,
    'amount' => $amount,
    'email' => $email,
    'itemDesc' => $itemDesc,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $invoiceUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($invoiceData, '', '&', PHP_QUERY_RFC3986));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// **獲取發票 API 回應**
$invoiceResponse = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// **檢查 API 錯誤**
if ($invoiceResponse === false) {
    $curlError = curl_error($ch);
    curl_close($ch);
    die(json_encode(["success" => false, "message" => "發票處理失敗: $curlError"]));
}

curl_close($ch);
$responseData = json_decode($invoiceResponse, true);

if ($httpCode !== 200 || !isset($responseData['Status']) || $responseData['Status'] !== 'SUCCESS') {
    $errorMessage = $responseData['Message'] ?? '未知錯誤';
    die(json_encode(["success" => false, "message" => "發票開立失敗: $errorMessage"]));
}

// **發票成功，跳轉到成功頁面**
header("Location: ../success.php?course_id=$subscription_id");
exit;
?>
