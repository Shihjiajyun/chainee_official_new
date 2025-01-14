<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表頁面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/columnists_introduce.css">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="main-visual">
        <div class="overlay"></div>
        <div class="content">
            <h1>腦哥</h1>
        </div>
    </div>
    <div class="container my-5">
        <!-- 個人簡介區塊 -->
        <div class="profile-section">
            <img src="./img/login_logo.jpg" alt="Profile Image">
            <div>
                <h2>腦哥</h2>
                <p>每週都要吃各餐攤，早愛喜歡吃泡通，身體根本就是由垃圾食物組成的。</p>
            </div>
        </div>

        <!-- 文章卡片區塊 -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- 第一張卡片 -->
            <div class="col">
                <div class="card h-100 shadow position-relative">

                    <div class="badge">需廣傳播</div>
                    <a href="./columnists_articel.php">
                        <img src="./img/lesson.jpg" class="card-img-top" alt="JPEX 跑路疑雲">
                        <div class="card-body">
                            <h5 class="card-title">JPEX 跑路疑雲！JPEX 交易所三大現況一次看【持續更新】</h5>
                            <p class="card-text">JPEX 新聞近期現況更新：因交易所前董事會稱平台有『合規』、無差異狀態，導致使用者無法提領資金。</p>
                        </div>
                    </a>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">by 腦哥</small>
                        <small class="text-muted">發佈日期：2023-09-16</small>
                    </div>

                </div>
            </div>
            <!-- 第二張卡片 -->
            <div class="col">
                <div class="card h-100 shadow position-relative">
                    <div class="badge">低風險！小資更適合</div>
                    <a href="./columnists_articel.php">
                        <img src="./img/lesson.jpg" class="card-img-top" alt="OKX 定投策略">
                        <div class="card-body">
                            <h5 class="card-title">OKX 定投策略｜比懶人更懶人！追隨大神一鍵搞定你的定期定額投資計畫</h5>
                            <p class="card-text">OKX 定投功能非常方便：你可以選擇長期累積資金，進行定期定額的方式投入。</p>
                        </div>
                    </a>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">by 腦哥</small>
                        <small class="text-muted">發佈日期：2023-09-13</small>
                    </div>
                </div>
            </div>
            <!-- 第三張卡片 -->
            <div class="col">
                <div class="card h-100 shadow position-relative">
                    <div class="badge">學投資</div>
                    <a href="./columnists_articel.php">
                        <img src="./img/lesson.jpg" class="card-img-top" alt="網格交易是什麼？">
                        <div class="card-body">
                            <h5 class="card-title">網格交易是什麼？網格交易原理、優缺點、策略教學</h5>
                            <p class="card-text">TLDR 網格交易是一種自動化交易策略，能夠幫助投資者在波動市場中捕捉交易機會。</p>
                        </div>
                    </a>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">by 腦哥</small>
                        <small class="text-muted">發佈日期：2023-09-05</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow position-relative">
                    <div class="badge">需廣傳播</div>
                    <a href="./columnists_articel.php">
                        <img src="./img/lesson.jpg" class="card-img-top" alt="網格交易是什麼？">
                        <div class="card-body">
                            <h5 class="card-title">網格交易是什麼？網格交易原理、優缺點、策略教學</h5>
                            <p class="card-text">TLDR 網格交易是一種自動化交易策略，能夠幫助投資者在波動市場中捕捉交易機會。</p>
                        </div>
                    </a>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">by 腦哥</small>
                        <small class="text-muted">發佈日期：2023-09-16</small>
                    </div>
                </div>
            </div>
            <!-- 第二張卡片 -->
            <div class="col">
                <div class="card h-100 shadow position-relative">
                    <div class="badge">低風險！小資更適合</div>
                    <a href="./columnists_articel.php">
                        <img src="./img/lesson.jpg" class="card-img-top" alt="網格交易是什麼？">
                        <div class="card-body">
                            <h5 class="card-title">網格交易是什麼？網格交易原理、優缺點、策略教學</h5>
                            <p class="card-text">TLDR 網格交易是一種自動化交易策略，能夠幫助投資者在波動市場中捕捉交易機會。</p>
                        </div>
                    </a>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">by 腦哥</small>
                        <small class="text-muted">發佈日期：2023-09-13</small>
                    </div>
                </div>
            </div>
            <!-- 第三張卡片 -->
            <div class="col">
                <div class="card h-100 shadow position-relative">
                    <div class="badge">學投資</div>
                    <a href="./columnists_articel.php">
                        <img src="./img/lesson.jpg" class="card-img-top" alt="網格交易是什麼？">
                        <div class="card-body">
                            <h5 class="card-title">網格交易是什麼？網格交易原理、優缺點、策略教學</h5>
                            <p class="card-text">TLDR 網格交易是一種自動化交易策略，能夠幫助投資者在波動市場中捕捉交易機會。</p>
                        </div>
                    </a>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">by 腦哥</small>
                        <small class="text-muted">發佈日期：2023-09-05</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <?php include 'footer.php' ?>
</footer>

</html>