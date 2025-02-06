<?php
session_start()
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>博客文章</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/subscription_article.css">
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example" data-bs-offset="100">
    <?php include 'navbar.php' ?>

    <div class="container mt-3" id="header_start">
        <div class="mb-5">
            <header class="article-header">
                <h1 class="title">我資產中以太幣佔比遠高於比特幣，為什麼？</h1>
                <p class="date">2024 年 12 月 31 日 • 商業星期刊 • 沒有評論</p>
            </header>
        </div>
    </div>

    <div class="container" style="margin-top:20px">
        <div class="row">
            <!-- 左側導航 -->
            <nav id="navbar-example" class="col-md-3">
                <h3 class="mb-3">文章段落</h3>
                <ul class="nav flex-column"> <!-- 移除 list-group，改用 nav flex-column -->
                    <li class="nav-item"><a class="nav-link" href="#section1">以比特幣來做投資</a></li>
                    <li class="nav-item"><a class="nav-link" href="#section2">幣圈資訊家</a></li>
                    <li class="nav-item"><a class="nav-link" href="#section3">以太幣估多超果果多於決定</a></li>
                    <li class="nav-item"><a class="nav-link" href="#section4">便記</a></li>
                </ul>
            </nav>

            <!-- 主要內容 -->
            <main class="col-md-6">
                <article>
                    <blockquote class="blockquote p-3 border-start border-primary bg-light">
                        我曾透露持有的以太幣遠超過比特幣，引起好些讀者疑惑，卻還沒撰文解釋。這陣子比特幣兌美元衝破歷史新高，以太幣卻只有歷史高位的一半多些，有評論指以太坊的輝煌一去不復返，我想，是時候把話題拋出土了。
                    </blockquote>

                    <img src="./img/lesson1.jpg" alt="">

                    <section id="section1" class="content-section">
                        <h2>以比特幣來做投資</h2>
                        <p>投資的邏輯跟個人狀況息息相關，開展討論前先重申我投資決策的首要原則，是比特幣本位世界觀。</p>

                        <p>如果你在問既然是比特幣本位，為什麼反而持有更多以太幣，意味著你還沒掌握「本位」的概念，建議讀一下〈愛麗絲夢遊仙境：比特幣本位世界觀〉。</p>
                    </section>

                    <section id="section2" class="content-section">
                        <h2>幣圈資訊家</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.</p>
                    </section>

                    <blockquote class="blockquote p-3 border-start border-primary bg-light">
                        我曾透露持有的以太幣遠超過比特幣，引起好些讀者疑惑，卻還沒撰文解釋。這陣子比特幣兌美元衝破歷史新高，以太幣卻只有歷史高位的一半多些，有評論指以太坊的輝煌一去不復返，我想，是時候把話題拋出土了。
                    </blockquote>

                    <section id="section3" class="content-section">
                        <h2>以太幣估多超果果多於決定</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicingtem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.</p>
                    </section>

                    <img src="./img/IG.png" alt="" style="border-radius:25px;">

                    <section id="section4" class="content-section">
                        <h2>便記</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi sapiente et suscipit tempore autem.</p>
                    </section>

                    <img src="./img/LINE.png" alt="" style="border-radius:25px;">
                </article>
            </main>

            <!-- 右側推薦文章 -->
            <aside class="col-md-3">
                <div class="card p-3">
                    <h3 class="mb-3">推薦文章</h3>

                    <!-- 文章項目 -->
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
    <?php include 'footer.php' ?>
</footer>

</html>