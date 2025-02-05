<?php

use Ecpay\Sdk\Factories\Factory;

require __DIR__ . '/../SDK_PHP/vendor/autoload.php';

// **1️⃣ 輸出接收到的 POST 資料**
file_put_contents('invoice_debug.log', "收到的 POST 資料:\n" . print_r($_POST, true), FILE_APPEND);

// 接收 POST 資料
$transaction_id = $_POST['transaction_id'] ?? '';
$totalAmount = $_POST['amount'] ?? 0; // 含稅金額
$email = $_POST['email'] ?? '';
$itemDesc = $_POST['itemDesc'] ?? '線上課程';

// **2️⃣ 輸出參數錯誤資訊**
if (empty($transaction_id) || empty($totalAmount) || empty($email)) {
    file_put_contents('invoice_debug.log', "❌ 缺少必要參數，無法處理發票。\n", FILE_APPEND);
    die(json_encode(["success" => false, "message" => "❌ 缺少必要參數，無法處理發票。"]));
}

// 初始化綠界 SDK
$factory = new Factory([
    'hashKey' => 's5T8OBKDFUvwR7k0',
    'hashIv' => 'RJYGxrwU5EZOrlsL',
]);
$postService = $factory->create('PostWithAesJsonResponseService');

// 計算含稅金額與稅額
$itemAmount = round($totalAmount / 1.05, 0);
$taxAmount = $totalAmount - $itemAmount;

// **3️⃣ 記錄發票請求資訊**
$data = [
    'MerchantID' => '3405511',
    'RelateNumber' => 'INV' . time(),
    'CustomerEmail' => $email,
    'Print' => '0',
    'Donation' => '0',
    'TaxType' => '1',
    'SalesAmount' => $totalAmount,
    'Items' => [
        [
            'ItemName' => $itemDesc,
            'ItemCount' => 1,
            'ItemWord' => '批',
            'ItemPrice' => $totalAmount,
            'ItemTaxType' => '1',
            'ItemAmount' => $totalAmount,
        ],
    ],
    'InvType' => '07',
];

$input = [
    'MerchantID' => '3405511',
    'RqHeader' => [
        'Timestamp' => time(),
    ],
    'Data' => $data,
];

file_put_contents('invoice_debug.log', "發票請求參數:\n" . print_r($input, true), FILE_APPEND);

// **4️⃣ 發送 API 請求**
$url = 'https://einvoice.ecpay.com.tw/B2CInvoice/Issue'; // 測試環境 URL
$response = $postService->post($input, $url);

// **5️⃣ 記錄完整的 API 回應**
file_put_contents('invoice_debug.log', "綠界 API 回應:\n" . print_r($response, true), FILE_APPEND);

// **6️⃣ 檢查 API 回應**
if (!isset($response['Data']['RtnCode'])) {
    die(json_encode([
        "success" => false,
        "message" => "❌ API 沒有返回 RtnCode，請檢查請求參數",
        "response" => $response
    ]));
}

if ($response['Data']['RtnCode'] != 1) {
    die(json_encode([
        "success" => false,
        "message" => "❌ 發票開立失敗: " . $response['Data']['RtnMsg'],
        "response" => $response
    ]));
}

// **7️⃣ 發票成功**
$invoiceNumber = $response['Data']['InvoiceNo'] ?? '未知發票號碼';
$invoiceDate = $response['Data']['InvoiceDate'] ?? '未知日期';
$randomNumber = $response['Data']['RandomNumber'] ?? '未知隨機碼';

echo json_encode([
    "success" => true,
    "Status" => "SUCCESS", // ✅ 新增這行
    "message" => "✅ 發票開立成功",
    "transaction_id" => $transaction_id,
    "invoice_number" => $invoiceNumber,
    "invoice_date" => $invoiceDate,
    "random_number" => $randomNumber
]);


?>
