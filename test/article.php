<?php
session_start();
require '../php/db.php'; // 連接資料庫

// 取得文章 ID
$article_id = isset($_GET['id']) ? trim($_GET['id']) : null;
if (!$article_id) {
    die('無效的文章 ID');
}

// 查詢文章
$query = "SELECT title, html_content, updated_at FROM subscriptions_articles WHERE article_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s', $article_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die('找不到該文章');
}

$article = $result->fetch_assoc();
$title = htmlspecialchars($article['title']);
$updated_at = date('Y 年 m 月 d 日', strtotime($article['updated_at']));
$html_content = $article['html_content']; // 原生 HTML

// 使用 DOMDocument 解析 <h1>
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html_content, 'HTML-ENTITIES', 'UTF-8'));

$headings = [];
$index = 1;

// 抓取所有 <h1>
foreach ($dom->getElementsByTagName('h1') as $element) {
    $text = trim($element->textContent);
    $tempId = 'section' . $index;

    // 改用 getAttribute 判斷
    $existingId = $element->getAttribute('id');
    if ($existingId === '') {
        $element->setAttribute('id', $tempId);
    } else {
        $tempId = $existingId;
    }

    $headings[] = [
        'id'   => $tempId,
        'text' => $text
    ];
    $index++;
}

// 更新後的 HTML
$html_content = $dom->saveHTML();
?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - 博客文章</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/article.css">
</head>
<style>
    .sticky-sidebar {
        position: sticky;
        top: 80px;
        /* 根據實際情況設定 */
        height: calc(100vh - 80px);
        overflow-y: auto;
    }
</style>

<body data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-offset="100">
    <?php include 'navbar.php'; ?>

    <div class="container mt-3" id="header_start">
        <div class="mb-5">
            <header class="article-header">
                <h1 class="title"><?php echo $title; ?></h1>
                <p class="date"><?php echo $updated_at; ?> • 商業星期刊 • 沒有評論</p>
            </header>
        </div>
    </div>

    <div class="container" style="margin-top:20px">
        <div class="row">
            <!-- 左側導航, sticky-top + style="top:80px;" -->
            <nav id="navbar-example" class="col-md-3">
                <h3 class="mb-3">文章段落</h3>
                <ul class="nav flex-column">
                    <?php foreach ($headings as $heading): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#<?php echo $heading['id']; ?>">
                                <?php echo htmlspecialchars($heading['text']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- 主要內容 -->
            <main class="col-md-6">
                <article class="content-section">
                    <!-- 輸出最終文章內容 (含 <h1 id="...">) -->
                    <?php echo $html_content; ?>
                </article>
            </main>

            <!-- 右側推薦文章, 同樣也可 sticky -->
            <aside class="col-md-3 sticky-top" style="top:80px;">
                <div class="card p-3">
                    <h3 class="mb-3">推薦文章</h3>

                    <div class="mb-3 article-item">
                        <img src="./img/lesson.jpg" class="img-fluid rounded" alt="推薦文章封面">
                        <h4 class="mt-2"><a href="#" class="text-decoration-none">為何投資以太幣？</a></h4>
                        <p class="author">by 鍾聖佐</p>
                        <p class="date">2025-01-17</p>
                        <p>了解以太幣的潛力與未來發展趨勢。</p>
                        <a href="#" class="more">More →</a>
                    </div>

                    <div class="mb-3 article-item">
                        <img src="./img/lesson2.jpg" class="img-fluid rounded" alt="推薦文章封面">
                        <h4 class="mt-2"><a href="#" class="text-decoration-none">比特幣 vs 以太幣</a></h4>
                        <p class="author">by 連建宏</p>
                        <p class="date">2025-01-18</p>
                        <p>兩者的優勢比較，幫助你做出明智決策。</p>
                        <a href="#" class="more">More →</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="mt-5">
    <?php include 'footer.php'; ?>
</footer>

</html>