<?php
session_start();
require 'php/db.php'; // 連接資料庫
$user_id = $_SESSION['user_id'] ?? null;
$user_email = $_SESSION['user_email'] ?? null;

$has_purchased = false;

// 確保 `id` 參數存在並且是數字
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : 0;

// 從 `subscription` 表中查詢對應的訂閱內容
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

$backgroundImage = htmlspecialchars($subscription['main_visual'] ?: './img/logo.jpg');

// **檢查該用戶是否已購買該訂閱**
if ($user_id) {
    $checkPurchaseQuery = "SELECT id FROM transactions_subscription WHERE user_id = ? AND subscription_id = ? LIMIT 1";
    $stmt = $mysqli->prepare($checkPurchaseQuery);
    $stmt->bind_param('ii', $user_id, $id);
    $stmt->execute();
    $purchaseResult = $stmt->get_result();

    if ($purchaseResult->num_rows > 0) {
        $has_purchased = true;
        $transaction = $purchaseResult->fetch_assoc();
        $transaction_id = $transaction['id']; // 取得交易 ID
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/subscription.css">
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="hero-section" style="background-image: url('<?php echo $backgroundImage; ?>');">
        <div class="overlay"></div>

        <div class="container position-relative text-white" id="hero">
            <!-- 左上角標籤 -->
            <span class="badge-started">已開課</span>

            <!-- 課程標題 -->
            <div class="course-content">
                <h1 class="course-title"><?php echo htmlspecialchars($subscription['title']); ?></h1>

                <!-- 星級評分 -->
                <div class="star-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span>5</span>
                </div>
            </div>

            <!-- 左下角購買按鈕 -->
            <div class="buy-section">
                <?php if ($user_id): ?>
                    <?php if ($has_purchased): ?>
                        <button class="btn btn-lg btn-success" onclick="window.location.href='./subscription_articles.php?id=<?php echo $id; ?>'">
                            已購買，前往上課
                        </button>
                    <?php else: ?>
                        <form id="paymentForm" action="./newebpay/src/payment_subscription.php" method="POST">
                            <input type="hidden" name="subscription_id" value="<?php echo htmlspecialchars($subscription['id']); ?>">
                            <input type="hidden" name="subscription_name" value="<?php echo htmlspecialchars($subscription['title']); ?>">
                            <input type="hidden" name="original_price" value="<?php echo htmlspecialchars($subscription['price']); ?>">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                            <input type="hidden" name="user_email" value="<?php echo htmlspecialchars($_SESSION['user_email']); ?>">
                            <button class="btn btn-lg btn-primary buy-button-video">
                                立即購買 NT$ <?php echo number_format($subscription['price']); ?>
                            </button>
                        </form>

                    <?php endif; ?>
                <?php else: ?>
                    <button class="btn btn-lg btn-secondary" onclick="redirectToLogin()">
                        購買前請先登入
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <div class="container py-4" id="introduce">
        <div class="row">
            <div class="col-lg-8">
                <!-- 課程資訊 -->
                <h5 class="mb-4">課程資訊</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="course-info-item">
                            <div class="course-info-icon">
                                <i class="far fa-calendar"></i>
                            </div>
                            <div>
                                <div class="text-muted">最後更新時間</div>
                                <div><?php echo htmlspecialchars(date('Y/m/d H:i', strtotime($subscription['last_updated']))); ?></div>
                            </div>
                        </div>
                        <div class="course-info-item">
                            <div class="course-info-icon">
                                <i class="far fa-file-alt"></i>
                            </div>
                            <div>
                                <div class="text-muted">創作者</div>
                                <div><?php echo htmlspecialchars($subscription['creator']); ?></div>
                            </div>
                        </div>
                        <div class="course-info-item">
                            <div class="course-info-icon">
                                <i class="far fa-user"></i>
                            </div>
                            <div>
                                <div class="text-muted">課程學員</div>
                                <div>18526 人</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="course-info-item">
                            <div class="course-info-icon">
                                <i class="far fa-eye"></i>
                            </div>
                            <div>
                                <div class="text-muted">觀看期限</div>
                                <div>無限制</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 課程說明 -->
                <p class="mt-4">
                    <?php echo nl2br(htmlspecialchars($subscription['description'])); ?>
                </p>

                <!-- 影片或封面圖 -->
                <div class="video-container mb-4">
                    <img src="<?php echo htmlspecialchars($subscription['main_visual'] ?: './img/logo.jpg'); ?>" alt="訂閱封面圖" class="img-fluid w-100">
                </div>

                <!-- 標籤導航 -->
                <ul class="nav nav-tabs mb-4 justify-content-center" id="navTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-content="intro" href="#">簡介</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="qa" href="#">問答</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="comments" href="#">留言</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="reviews" href="#">評價</a>
                    </li>
                </ul>

                <!-- 內容區塊 -->
                <div class="content-area">
                    <!-- 簡介 -->
                    <div class="content active" id="intro">
                        <img src="<?php echo htmlspecialchars($subscription['long_image'] ?: './img/logo.jpg'); ?>" alt="簡介圖片" class="content-image">
                    </div>

                    <!-- 常見問題 -->
                    <div class="content" id="qa">
                        <div class="accordion" id="faqAccordion">
                            <!-- 問題 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                                        Q1: 如何註冊帳號？
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        註冊帳號很簡單，只需點擊首頁右上角的「註冊」按鈕，填寫個人資料，並完成驗證即可。
                                    </div>
                                </div>
                            </div>

                            <!-- 問題 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Q2: 如何重設密碼？
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        如果忘記密碼，請點擊「忘記密碼」連結，輸入註冊時使用的電子郵件地址，我們將發送重設密碼的連結到您的信箱。
                                    </div>
                                </div>
                            </div>

                            <!-- 問題 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Q3: 支援哪些付款方式？
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        我們支援信用卡、支付寶、微信支付以及銀行轉帳等多種付款方式，詳情請參考我們的付款頁面。
                                    </div>
                                </div>
                            </div>

                            <!-- 問題 4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        Q4: 如何聯繫客服？
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        您可以通過我們的「聯繫我們」頁面提交問題，或直接發送電子郵件至 support@example.com，我們的客服團隊將在24小時內回覆您。
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 留言區 -->
                    <div class="content" id="comments">
                        <div class="comment-section">
                            <!-- 提示登入 -->
                            <div class="login-prompt">
                                <a href="#" class="login-link">登入</a> 後才可留言發問喔！
                            </div>

                            <!-- 留言清單 -->
                            <div class="comment-list">
                                <!-- 留言 1 -->
                                <div class="comment">
                                    <div class="comment-header">
                                        <img src="./img/login_logo.jpg" alt="XXX" class="user-avatar">
                                        <div class="user-info">
                                            <span class="user-name">XXX</span>
                                            <span class="comment-date">2025/01/09 14:49:56</span>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        你好，如果我購買了課程，請問是上知識衛星網站上登入觀看嗎？
                                    </div>
                                </div>


                                <!-- 留言 2 -->
                                <div class="comment">
                                    <div class="comment-header">
                                        <img src="./img/login_logo.jpg" alt="XXX" class="user-avatar">
                                        <div class="user-info">
                                            <span class="user-name">XXX</span>
                                            <span class="comment-date">2024/09/05 11:57:11</span>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        請問2024有線上互動坊的規劃嗎？
                                    </div>
                                </div>

                                <!-- 留言 3 -->
                                <div class="comment">
                                    <div class="comment-header">
                                        <img src="./img/login_logo.jpg" alt="XXX" class="user-avatar">
                                        <div class="user-info">
                                            <span class="user-name">XXX</span>
                                            <span class="comment-date">2023/03/25 23:58:33</span>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        是否能分享更多相關的課程內容？
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 評價區 -->
                    <div class="content" id="reviews">
                        <div class="review-section">
                            <!-- 評價 1 -->
                            <div class="review">
                                <div class="review-header">
                                    <img src="./img/login_logo.jpg" alt="用戶頭像" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">XXX</span>
                                        <span class="review-date">2021/12/21 10:00:14</span>
                                        <div class="user-rating">
                                            ★★★★★
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    因為工作關係選擇了葉老師的線上課程，學到很多簡報的技巧也改變了以前的我看待簡報能力的不足所在，收穫很多，也因為是線上課程彌補了工作行程上無法配合固定時段固定地點上課的缺憾。總而言之，葉老師的線上簡報課程真的太棒了。辛苦葉老師以及知識衛星的製作團隊！
                                </div>
                            </div>

                            <!-- 評價 2 -->
                            <div class="review">
                                <div class="review-header">
                                    <img src="./img/login_logo.jpg" alt="用戶頭像" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">XXX</span>
                                        <span class="review-date">2021/11/24 18:30:22</span>
                                        <div class="user-rating">
                                            ★★★★★
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    以為今年感恩節假期我應該一如往常的廢到天荒地老，但自從我打開了內成老師的簡報課後，居然迫不及待地讓我兩天就如同追魚缸遊戲一樣欲罷不能的追完了，而且還收穫滿滿！
                                    <br><br>
                                    原本只想說就是教教如何做簡報技巧提升自己，但沒想到整套課根本實做簡報、溝通、做人談判的最大重點：同理心和換位思考。
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- 價格卡片 -->
            <div class="col-lg-4" id="price">
                <div class="price-content">
                    <div class="price-card">
                        <div class="text-center mb-4">
                            <img src="<?php echo htmlspecialchars($subscription['main_visual'] ?: './img/logo.jpg'); ?>" alt="課程封面" class="img-fluid rounded mb-3">
                            <h3 class="mb-3">NT$ <?php echo number_format($subscription['price']); ?></h3>
                        </div>
                        <div class="mb-4">
                            <p>✦ 無限次數觀看鏈習生</p>
                            <p>✦ 分期 (三期、六期) 零利率方案僅限：玉山、台新銀行信用卡</p>
                        </div>
                        <div class="d-flex gap-2">
                            <?php if (!$user_id): ?>
                                <!-- 未登入 -->
                                <button class="btn btn-lg btn-secondary w-100" onclick="redirectToLogin()">購買前請先登入</button>
                            <?php elseif ($has_purchased): ?>
                                <!-- 已購買 -->
                                <button class="btn btn-lg btn-success w-100" onclick="window.location.href='./subscription_articles.php?id=<?php echo $id; ?>'">
                                    已購買，前往上課
                                </button>
                            <?php else: ?>
                                <!-- 尚未購買 -->
                                <form id="paymentForm" action="./newebpay/src/payment_subscription.php" method="POST" class="w-100">
                                    <input type="hidden" name="subscription_id" value="<?php echo htmlspecialchars($subscription['id']); ?>">
                                    <input type="hidden" name="subscription_name" value="<?php echo htmlspecialchars($subscription['title']); ?>">
                                    <input type="hidden" name="original_price" value="<?php echo htmlspecialchars($subscription['price']); ?>">
                                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                                    <input type="hidden" name="user_email" value="<?php echo htmlspecialchars($_SESSION['user_email']); ?>">
                                    <button class="btn btn-lg btn-primary w-100">立即購買</button>
                                </form>
                                <button class="btn btn-lg btn-outline-secondary w-100" onclick="addToCart(<?php echo $subscription['id']; ?>)">
                                    <i class="fas fa-shopping-cart"></i> 加入購物車
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 切換內容 -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.nav-link[data-content]'); // 僅選擇有 data-content 的連結
            const contents = document.querySelectorAll('.content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault(); // 阻止頁籤連結的預設行為

                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Hide all content
                    contents.forEach(content => content.classList.remove('active'));

                    // Show corresponding content
                    const targetId = this.getAttribute('data-content');
                    const targetContent = document.getElementById(targetId);
                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });
        });
    </script>

</body>
<footer>
    <?php include './footer.php' ?>
</footer>

</html>