<?php
session_start();
require 'php/db.php'; // 連接資料庫

// 獲取當前用戶 ID 和 Email
$user_id = $_SESSION['user_id'] ?? null;
$user_email = $_SESSION['user_email'] ?? null;

// 如果用戶未登入，則導向登入頁面
if (!$user_id) {
    header("Location: login.php");
    exit();
}

$has_purchased = false;
$articles = [];

// 確保 `id` 參數存在並且是數字
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : 0;

// 查詢 `subscription` 訂閱內容
$query = "SELECT id, title, creator, description, main_visual, outline, long_image, last_updated, price
          FROM subscription WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $subscription = $result->fetch_assoc();
} else {
    die('找不到該訂閱內容');
}

// 設置背景圖
$backgroundImage = htmlspecialchars($subscription['main_visual'] ?: './img/logo.jpg');

// **檢查該用戶是否已購買該訂閱**
$checkPurchaseQuery = "SELECT id FROM transactions_subscription WHERE user_id = ? AND subscription_id = ? LIMIT 1";
$stmt = $mysqli->prepare($checkPurchaseQuery);
$stmt->bind_param('ii', $user_id, $id);
$stmt->execute();
$purchaseResult = $stmt->get_result();

if ($purchaseResult->num_rows > 0) {
    $has_purchased = true;
    $transaction = $purchaseResult->fetch_assoc();
    $transaction_id = $transaction['id']; // 取得交易 ID
} else {
    // 如果未購買則跳轉到訂閱購買頁面
    header("Location: purchase.php?subscription_id=$id");
    exit();
}

// **查詢訂閱內的文章**
$articlesQuery = "SELECT id, article_id, title, preview_text, preview_image, updated_at 
                  FROM subscriptions_articles 
                  WHERE subscription_id = ? 
                  ORDER BY updated_at DESC";
$stmt = $mysqli->prepare($articlesQuery);
$stmt->bind_param('i', $id);
$stmt->execute();
$articlesResult = $stmt->get_result();

while ($row = $articlesResult->fetch_assoc()) {
    $articles[] = $row;
}
?>


<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($subscription['title']); ?> - 訂閱文章</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/subscription_articles.css">
</head>
<style>
    .subscription-banner {
        background: url('<?php echo $backgroundImage; ?>') center/cover no-repeat;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }
</style>

<body>
    <?php include 'navbar.php' ?>
    <div class="subscription-banner">
        <?php echo htmlspecialchars($subscription['title']); ?>
    </div>

    <div class="container py-5">
        <h1 class="text-center mb-3 fs-1 fw-bold"><?php echo htmlspecialchars($subscription['title']); ?></h1>

        <!-- 訂閱簡介 -->
        <div class="mb-4">
            <p class="text-center fw-bold fs-4">課程簡介：<?php echo nl2br(htmlspecialchars($subscription['description'])); ?></p>
        </div>

        <div class="row g-4 mt-3">
            <?php foreach ($articles as $article): ?>
                <div class="col-12 col-md-4">
                    <a href="subscription_aticle.php?id=<?php echo htmlspecialchars($article['article_id']); ?>" class="card-link">
                        <div class="card h-100">
                            <div class="position-relative">
                                <img src="<?php echo htmlspecialchars($article['preview_image'] ?: './img/default.jpg'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($article['title']); ?>">
                                <span class="subscription-badge">訂閱限定</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($article['title']); ?></h5>
                                <div class="d-flex align-items-center mt-3">
                                    <img src="/placeholder.svg?height=40&width=40" class="profile-img me-2" alt="作者頭像">
                                    <div>
                                        <p class="mb-0"><?php echo htmlspecialchars($article['preview_text']); ?></p>
                                        <small class="meta-info"><?php echo date('Y-m-d', strtotime($article['updated_at'])); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>

        <?php if (!$has_purchased): ?>
            <div class="text-center mt-5">
                <a href="purchase.php?subscription_id=<?php echo $id; ?>" class="btn btn-primary">訂閱以解鎖所有文章</a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>