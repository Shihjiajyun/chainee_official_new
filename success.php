<?php
require_once 'php/db.php';

// 檢查 GET 參數
$course_id = $_GET['course_id'] ?? null;
$subscription_id = $_GET['subscription_id'] ?? null;
$transaction = null;

if ($course_id) {
    // 從 user_courses 查詢交易資料
    $stmt = $mysqli->prepare("SELECT id, user_id, course_id, purchase_time, status, amount FROM user_courses WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaction = $result->fetch_assoc();
    $stmt->close();
} elseif ($subscription_id) {
    // 從 transactions_subscription 查詢交易資料
    $stmt = $mysqli->prepare("SELECT id, user_id, subscription_id, transaction_id, amount, created_at FROM transactions_subscription WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $subscription_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaction = $result->fetch_assoc();
    $stmt->close();
}

// 關閉資料庫連線
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>交易成功</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container text-center mt-5">
        <div class="alert alert-success" role="alert">
            <h1 class="display-4">交易成功！</h1>
            <p class="lead">感謝您的購買，以下是您的交易明細：</p>
        </div>
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">交易明細</h5>
                <?php if ($transaction): ?>
                    <p class="card-text"><strong>交易編號：</strong> <?= htmlspecialchars($transaction['id']) ?></p>
                    <p class="card-text"><strong>金額：</strong> <?= htmlspecialchars($transaction['amount']) ?> 元</p>
                    <p class="card-text"><strong>交易類型：</strong> <?= $course_id ? '課程' : '訂閱' ?></p>
                    <p class="card-text"><strong>交易時間：</strong> <?= htmlspecialchars($transaction['purchase_time'] ?? $transaction['created_at']) ?></p>
                <?php else: ?>
                    <p class="text-danger">未找到相關交易資訊。</p>
                <?php endif; ?>
            </div>
        </div>
        <a href="index.php" class="btn btn-primary mt-4">繼續購物</a>
    </div>
</body>
<footer class="mt-3">
    <?php include 'footer.php' ?>
</footer>

</html>
