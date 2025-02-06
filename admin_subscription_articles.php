<?php
require 'php/db.php'; // 連接資料庫

// 取得網址中的 subscription_id 參數
$subscription_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($subscription_id > 0) {
    $query = "SELECT id, article_id, title, preview_text, preview_image, tags, updated_at 
              FROM subscriptions_articles 
              WHERE subscription_id = ? 
              ORDER BY updated_at DESC";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $subscription_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // 如果沒有提供 subscription_id，則回傳空結果
    $result = [];
}

$articles = [];
while ($row = $result->fetch_assoc()) {
    $row['tags'] = json_decode($row['tags'], true); // 解析 JSON 標籤
    $articles[] = $row;
}
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card img {
            height: 180px;
            object-fit: cover;
        }

        .card-text {
            height: 48px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .tag {
            background: #007bff;
            color: white;
            padding: 3px 8px;
            border-radius: 5px;
            font-size: 12px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container mt-4">
        <h1 class="text-center mb-4">文章列表</h1>

        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $article['preview_image'] ?: 'https://via.placeholder.com/300x180' ?>" class="card-img-top" alt="<?= htmlspecialchars($article['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($article['preview_text']) ?></p>
                            <div>
                                <?php if (!empty($article['tags'])): ?>
                                    <?php foreach ($article['tags'] as $tag): ?>
                                        <span class="tag"><?= htmlspecialchars($tag) ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small class="text-muted"><?= date("Y-m-d", strtotime($article['updated_at'])) ?></small>
                            <a href="admin_subscription_article.php?article_id=<?= urlencode($article['article_id']) ?>" class="btn btn-primary btn-sm">編輯文章</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
<footer>
    <?php include 'footer.php' ?>
</footer>

</html>