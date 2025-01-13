<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chainee</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/article.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <?php include './tools/chat.php' ?>

    <!-- 導覽列 -->
    <?php include './navbar.php'; ?>

    <!-- 主視覺 -->
    <?php include './tools/main.php'; ?>

    <!-- 主視覺2 -->
    <?php include './tools/main2.php'; ?>

    <!-- 獨家大師 -->
    <main class="main">
        <div class="container">
            <h2 class="section-title blue-underline">獨家大師</h2>
            <div class="grid">
                <!-- Card 1 -->
                <div class="card">
                    <a href="" class="card-link">
                        <div class="card-image">
                            <img src="./img/lesson.jpg" alt="課程縮圖">
                        </div>
                        <div class="card-content">
                            <a href="#" class="btn btn-primary mt-1">立即上課</a>
                            <h3 class="card-title">掌握口語表達與舞台魅力｜葉丙成的簡報必修課</h3>
                            <p class="card-author">by 葉丙成 Benson</p>
                            <p class="card-price">NT$ 12,000</p>
                            <div class="card-meta">
                                <span>11小時14分</span>
                                <span>17504 人</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="card">
                    <a href="" class="card-link">
                        <div class="card-image">
                            <img src="./img/lesson1.jpg" alt="課程縮圖">
                        </div>
                        <div class="card-content">
                            <a href="#" class="btn btn-primary">立即上課</a>
                            <h3 class="card-title">超級數字力｜一生受用的財務思維課</h3>
                            <p class="card-author">by MJ 林明樺</p>
                            <p class="card-price">NT$ 15,800</p>
                            <div class="card-meta">
                                <span>10小時35分</span>
                                <span>24323 人</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="card">
                    <a href="" class="card-link">
                        <div class="card-image">
                            <img src="./img/lesson2.jpg" alt="課程縮圖">

                        </div>
                        <div class="card-content">
                            <a href="#" class="btn btn-primary">立即上課</a>
                            <h3 class="card-title">峰值體驗2｜關鍵時刻的洞察與落地</h3>
                            <p class="card-author">by 汪志華</p>
                            <p class="card-price">NT$ 17,900</p>
                            <div class="card-meta">
                                <span>10小時7分</span>
                                <span>4244 人</span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 4 -->
                <div class="card">
                    <a href="" class="card-link">
                        <div class="card-image">
                            <img src="./img/lesson.jpg" alt="課程縮圖">
                        </div>
                        <div class="card-content">
                            <a href="#" class="btn btn-primary">立即上課</a>
                            <h3 class="card-title">風林火山｜劉必榮的致勝談判思維課</h3>
                            <p class="card-author">by 劉必榮</p>
                            <p class="card-price">NT$ 19,960</p>
                            <div class="card-meta">
                                <span>22小時50分</span>
                                <span>2764 人</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- 文章專欄 -->
    <div class="container">
        <div class="row">
            <!-- 推薦專欄 -->
            <div class="col-lg-6 mb-5">
                <h2 class="mb-4 blue-underline">推薦專欄</h2>
                <?php
                $recommendedArticles = [
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => '為何企業學習課程的方案要選擇知識衛星呢？',
                        'author' => '知識衛星 SAT. KNOWLEDGE'
                    ],
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => 'RE:LAB 圖像資訊表達',
                        'author' => 'RE:LAB'
                    ],
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => '劉博仁醫師營養功能醫學',
                        'author' => '知識衛星 SAT. KNOWLEDGE'
                    ],
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => '知識衛星 SAT. KNOWLEDGE',
                        'author' => '知識衛星 SAT. KNOWLEDGE'
                    ]
                ];
                ?>

                <div class="row g-4">
                    <?php foreach ($recommendedArticles as $article): ?>
                        <div class="col-md-6">
                            <div class="article-card">
                                <img src="<?php echo htmlspecialchars($article['image']); ?>"
                                    alt="<?php echo htmlspecialchars($article['title']); ?>"
                                    class="article-image rounded mb-3">
                                <h3 class="h5 mb-2"><?php echo htmlspecialchars($article['title']); ?></h3>
                                <p class="text-muted small">by <?php echo htmlspecialchars($article['author']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 熱門文章 -->
            <div class="col-lg-6">
                <h2 class="mb-4 blue-underline">熱門文章</h2>

                <?php
                $popularArticles = [
                    [
                        'date' => '2023/05/17',
                        'category' => '文章',
                        'title' => '資費會 X 葉丙成的簡報必修課！線上學習打造成功簡報的三大核心',
                        'author' => '為何企業學習課程的方案要選擇知識衛星呢？'
                    ],
                    [
                        'date' => '2022/05/18',
                        'category' => '文章',
                        'title' => '【有感學習訪談】學習財務知識很難？MJ老師：每天花一小時升級你的大腦即可！',
                        'author' => '知識衛星 SAT. KNOWLEDGE'
                    ],
                    [
                        'date' => '2022/05/17',
                        'category' => '文章',
                        'title' => '【有感學習訪談】課程被拿來當Netflix追劇看？葉丙成老師：我教的是溝通表達的心法',
                        'author' => '知識衛星 SAT. KNOWLEDGE'
                    ],
                    [
                        'date' => '2022/05/16',
                        'category' => '文章',
                        'title' => '【有感學習訪談】如何看完高時數的課程？焦元溥老師：大家輕鬆以對就好啦！',
                        'author' => '知識衛星 SAT. KNOWLEDGE'
                    ]
                ];
                ?>

                <div class="popular-articles">
                    <?php foreach ($popularArticles as $index => $article): ?>
                        <div class="d-flex gap-3 mb-4">
                            <div class="article-number"><?php echo $index + 1; ?></div>
                            <div>
                                <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                                    <span><?php echo htmlspecialchars($article['date']); ?></span>
                                    <span>•</span>
                                    <span><?php echo htmlspecialchars($article['category']); ?></span>
                                </div>
                                <h3 class="h5 mb-2"><?php echo htmlspecialchars($article['title']); ?></h3>
                                <p class="text-muted small">by <?php echo htmlspecialchars($article['author']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 關於我們 -->
    <section class="about-us py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- 左邊文字區塊 -->
                <div class="col-md-6">
                    <h2 class="mb-4 blue-underline">關於我們</h2>
                    <p class="mb-3">SAT. 是英文「衛星」Satellite 的縮寫，知識衛星是 SAT. KNOWLEDGE，將知識傳播至世界每個角落，是你最聰明的學習選擇。</p>
                    <ul class="list-unstyled">
                        <li>學習是一趟沒有終點的飛行</li>
                        <li>建立知識衛星，跨越時空和地域的限制</li>
                        <li>直接向各領域的頂尖大師學習</li>
                        <li>探索知識並拓展更多的興趣</li>
                        <li>透過有感的學習，造就生活的改變</li>
                        <li>接近更理想的自己</li>
                    </ul>
                    <p class="mt-4">知識衛星精品線上課｜各領域大師開課首選<br><strong>Your smart learning choice</strong></p>
                    <a href="#" class="btn btn-dark mt-3">了解更多</a>
                </div>

                <!-- 右邊圖片區塊 -->
                <div class="col-md-6 text-center mt-2">
                    <img src="./img/login_logo.jpg" alt="衛星圖像" class="rounded" style="height: 40%;max-height:400px">
                </div>
            </div>
        </div>
    </section>

    <?php include('./tools/students_back.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 計算卡片標題 -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cardTitles = document.querySelectorAll('.card-title');
            let maxHeight = 0;

            // 找出最高的標題高度
            cardTitles.forEach(title => {
                const height = title.offsetHeight;
                if (height > maxHeight) {
                    maxHeight = height;
                }
            });

            // 將最高的高度應用到所有標題
            cardTitles.forEach(title => {
                title.style.height = `${maxHeight}px`;
            });
        });
    </script>
</body>
<footer>
    <?php include('./footer.php'); ?>
</footer>

</html>