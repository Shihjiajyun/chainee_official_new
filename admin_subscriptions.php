<?php
session_start();
require 'php/db.php'; // 引入資料庫連接

// 從外部檔案讀取允許的 user_id
$allowed_users = file('./allowed_users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 檢查用戶權限
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_id'], $allowed_users)) {
    header('Location: login.php');
    exit();
}

// 查詢所有主題
$query = "SELECT id, title, creator, description, main_visual, outline, long_image, last_updated FROM subscription ORDER BY last_updated DESC";
$result = $mysqli->query($query);

$subscriptions = [];
while ($row = $result->fetch_assoc()) {
    $subscriptions[] = $row;
}
?>


<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>鏈習生 - 訂閱專欄管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<style>
    .main {
        padding: 3rem 0;
    }

    .section-title {
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .card-link {
        text-decoration: none;
        /* 去掉下劃線 */
        color: inherit;
        /* 保持文字顏色 */
        display: block;
        /* 確保整個卡片範圍可點擊 */
    }

    .card {
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
    }

    .card-image {
        position: relative;
        height: 200px;
        background: #f5f5f5;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease, filter 0.3s ease;
        /* 添加平滑過渡效果 */
    }

    .card-image:hover img {
        transform: scale(1.1);
        /* 放大圖片 */
        filter: brightness(1.1);
        /* 增加亮度，可選 */
    }

    .card-image .btn-primary {
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        background: #0066ff;
        color: white;
    }

    .card-content {
        padding: 1rem;
    }

    .card-title {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .card-author {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .card-price {
        color: #0066ff;
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-meta {
        display: flex;
        gap: 1rem;
        color: #666;
        font-size: 0.8rem;
    }

    .grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        /* 水平置中 */
        align-items: center;
        /* 垂直置中 */
        max-width: 1200px;
        /* 設定最大寬度 */
        margin: 0 auto;
        /* 讓 .grid 置中 */
    }


    .card {
        width: 350px;
        /* 固定卡片寬度 */
        background: white;
        border-radius: 12px;
        /* 圓角 */
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        /* 陰影 */
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        text-align: center;
    }

    .card:hover {
        transform: translateY(-5px);
        /* 滑鼠懸停時稍微上浮 */
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-image img {
        width: 100%;
        height: 200px;
        /* 統一圖片高度 */
        object-fit: cover;
        /* 確保圖片完整填滿 */
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-content {
        padding: 20px;
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-instructor {
        font-size: 14px;
        color: #777;
    }

    .card-description {
        font-size: 14px;
        color: #555;
        margin-top: 10px;
        line-height: 1.5;
    }

    .card-meta {
        margin-top: 15px;
        font-size: 12px;
        color: #999;
        display: flex;
        justify-content: space-between;
    }
</style>

<body>
    <?php include 'navbar.php' ?>

    <?php if (isset($_GET['success']) && $_GET['success'] === 'created'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            訂閱內容已成功新增！
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeSuccessParam()"></button>
        </div>
    <?php endif; ?>

    <main class="main container mt-5">
        <div class="container">
            <div class="grid">
                <?php if (!empty($subscriptions)) : ?>
                    <?php foreach ($subscriptions as $subscription) : ?>
                        <div class="card">
                            <a href="admin_subscription.php?id=<?php echo htmlspecialchars($subscription['id']); ?>" class="card-link">
                                <div class="card-image">
                                    <img src="<?php echo htmlspecialchars($subscription['main_visual'] ?: './img/placeholder.jpg'); ?>" alt="主題封面">
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title"><?php echo htmlspecialchars($subscription['title']); ?></h3>

                                    <!-- 創作者 -->
                                    <p class="card-instructor">創作者：<?php echo htmlspecialchars($subscription['creator']); ?></p>

                                    <p class="card-description">
                                        <?php echo htmlspecialchars(mb_strimwidth($subscription['description'], 0, 100, '...')); ?>
                                    </p>

                                    <div class="card-meta">
                                        <span>更新於 <?php echo htmlspecialchars(date('Y-m-d', strtotime($subscription['last_updated']))); ?></span>
                                        <span>17504 人</span> <!-- 這裡可替換為真實數據 -->
                                    </div>

                                    <a href="admin_subscription.php?id=<?php echo htmlspecialchars($subscription['id']); ?>" class="btn btn-primary mt-3">編輯主題</a>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>目前沒有可用主題。</p>
                <?php endif; ?>
            </div>
            <a class="btn btn-warning mt-3" href="admin_subscription.php?id=0 ">新增主題</a>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function removeSuccessParam() {
            // 获取当前的 URL
            const url = new URL(window.location.href);

            // 删除 success 参数
            url.searchParams.delete('success');
            url.searchParams.delete('error');

            // 更新地址栏中的 URL (不会刷新页面)
            window.history.replaceState({}, document.title, url.toString());
        }
    </script>
</body>
<footer class="mt-3">
    <?php include 'footer.php' ?>
</footer>

</html>