<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>鏈習生 - 主視覺頁面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="./css/knowledge.css">
</head>

<body>
    <!-- 導覽列 -->
    <?php include 'navbar.php' ?>
    <div class="main-visual">
        <div class="overlay"></div>
        <div class="content">
            <h1>鏈習生幣圈知識庫</h1>
            <p>從幣圈名詞到平台操作，讓我們帶你手把手入門 Web3！</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="/courses.html" class="btn btn-custom btn-primary-custom">免費課程</a>
                <a href="/articles.html" class="btn btn-custom btn-secondary-custom">最新文章</a>
            </div>
        </div>
    </div>

    <!-- 最新文章 -->
    <div class="container py-5" id="article_new">
        <!-- Section Title -->
        <div class="section-title">
            <div class="en-title">Latest Articles</div>
            <h2>最新文章</h2>
        </div>

        <div class="row">
            <!-- Featured Article -->
            <div class="col-lg-7">
                <div class="article-card position-relative">
                    <div class="overlay-text position-absolute text-white p-3" style="background-color:red; font-weight: 900; top: 10px; left: 10px; z-index: 10;">
                        最新焦点
                    </div>
                    <img src="./img/login_logo.jpg" class="featured-image rounded" alt="加密貨幣出金3大攻略">
                    <div class="bottom-text position-absolute text-white p-3" style="font-weight: 900; bottom: 10px; left: 10px; z-index: 10; background-color: rgba(0, 0, 0, 0.6);">
                        加密貨幣出金3大攻略
                    </div>
                </div>
            </div>


            <!-- Sidebar Articles -->
            <div class="col-lg-5">
                <!-- Article 1 -->
                <div class="article-card d-flex">
                    <div class="small-article-image rounded me-3" style="min-width: 120px;">
                        <img src="./img/lesson.jpg" class="w-100 h-100 rounded" alt="總鎖倉價值是什麼？">
                    </div>
                    <div>
                        <h5>總鎖倉價值是什麼？為何不該和 PoS 質押價值合併計算？</h5>
                        <div class="article-meta">
                            <span>GGBear 葛研究</span>
                            <span class="mx-2">•</span>
                            <span>2025-01-10</span>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="article-card d-flex">
                    <div class="small-article-image rounded me-3" style="min-width: 120px;">
                        <img src="./img/lesson1.jpg" class="w-100 h-100 rounded" alt="Pendle Finance是什麼？">
                    </div>
                    <div>
                        <h5>Pendle Finance是什麼？分離加密資產「所有權」與「收益權」的 DeFi 理財新策略</h5>
                        <div class="article-meta">
                            <span>區塊斯基</span>
                            <span class="mx-2">•</span>
                            <span>2025-01-09</span>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="article-card d-flex">
                    <div class="small-article-image rounded me-3" style="min-width: 120px;">
                        <img src="./img/lesson2.jpg" class="w-100 h-100 rounded" alt="幣圈盤勢分析">
                    </div>
                    <div>
                        <h5>幣圈盤勢分析 2025/01/08</h5>
                        <div class="article-meta">
                            <span>MO哥</span>
                            <span class="mx-2">•</span>
                            <span>2025-01-09</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 最新文章_輪播 -->
        <div class="carousel" id="article_carousel_new">
            <div class="card">
                <div class="card-image-container">
                    <div class="card-tag">幣圈天上掉錢下來</div>
                    <img src="./img/lesson.jpg" alt="SOLV Megadrop">
                </div>
                <div class="card-content">
                    <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                    <div class="card-meta">
                        Posted by <span>閱讀筆耕</span> • 2025-01-07
                    </div>
                    <p class="card-description">
                        最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！跨進半年，幣安交易所 Megadrop 活動正式開跑，趕快來看看如何參與！
                    </p>
                    <div class="card-footer_new">
                        <a href="#" class="read-more">閱讀更多</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-image-container">
                    <div class="card-tag">學習投資</div>
                    <img src="./img/lesson.jpg" alt="投資學習">
                </div>
                <div class="card-content">
                    <h3 class="card-title">台幣、港幣、比特幣，哪個會先消失？</h3>
                    <div class="card-meta">
                        Posted by <span>高重建老師</span> • 2024-12-23
                    </div>
                    <p class="card-description">
                        隨著數位支付的普及，各種貨幣的未來發展引發熱議。本文將深入探討三種不同性質的貨幣：台幣、港幣和比特幣的未來發展趨勢。
                    </p>
                    <div class="card-footer_new">
                        <a href="#" class="read-more">閱讀更多</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-image-container">
                    <div class="card-tag">幣圈大調查</div>
                    <img src="./img/lesson.jpg" alt="幣圈調查">
                </div>
                <div class="card-content">
                    <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                    <div class="card-meta">
                        Posted by <span>閱讀筆耕</span> • 2024-12-17
                    </div>
                    <p class="card-description">
                        透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                    </p>
                    <div class="card-footer_new">
                        <a href="#" class="read-more">閱讀更多</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-image-container">
                    <div class="card-tag">幣圈大調查</div>
                    <img src="./img/lesson.jpg" alt="幣圈調查">
                </div>
                <div class="card-content">
                    <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                    <div class="card-meta">
                        Posted by <span>閱讀筆耕</span> • 2024-12-17
                    </div>
                    <p class="card-description">
                        透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                    </p>
                    <div class="card-footer_new">
                        <a href="#" class="read-more">閱讀更多</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-image-container">
                    <div class="card-tag">幣圈大調查</div>
                    <img src="./img/lesson.jpg" alt="幣圈調查">
                </div>
                <div class="card-content">
                    <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                    <div class="card-meta">
                        Posted by <span>閱讀筆耕</span> • 2024-12-17
                    </div>
                    <p class="card-description">
                        透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                    </p>
                    <div class="card-footer_new">
                        <a href="#" class="read-more">閱讀更多</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 學幣圈 -->
    <div class="pb-5">
        <div class="container py-5" id="article_new" style="height:auto;">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Learn Crypto</div>
                <h2>學幣圈</h2>
            </div>

            <!-- 學幣圈_輪播 -->
            <div class="carousel" id="article_carousel_new">
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈天上掉錢下來</div>
                        <img src="./img/lesson.jpg" alt="SOLV Megadrop">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2025-01-07
                        </div>
                        <p class="card-description">
                            最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！跨進半年，幣安交易所 Megadrop 活動正式開跑，趕快來看看如何參與！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">學習投資</div>
                        <img src="./img/lesson.jpg" alt="投資學習">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">台幣、港幣、比特幣，哪個會先消失？</h3>
                        <div class="card-meta">
                            Posted by <span>高重建老師</span> • 2024-12-23
                        </div>
                        <p class="card-description">
                            隨著數位支付的普及，各種貨幣的未來發展引發熱議。本文將深入探討三種不同性質的貨幣：台幣、港幣和比特幣的未來發展趨勢。
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary p-2" href="#" id="readAll">查看所有「學幣圈」文章</a>
        </div>
    </div>

    <!-- 學開戶 -->
    <div class="pb-5">
        <div class="container py-5" id="article_new" style="height:auto;">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Open Accounts</div>
                <h2>學開戶</h2>
            </div>

            <!-- 學投資_輪播 -->
            <div class="carousel" id="article_carousel_new">
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈天上掉錢下來</div>
                        <img src="./img/lesson.jpg" alt="SOLV Megadrop">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2025-01-07
                        </div>
                        <p class="card-description">
                            最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！跨進半年，幣安交易所 Megadrop 活動正式開跑，趕快來看看如何參與！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">學習投資</div>
                        <img src="./img/lesson.jpg" alt="投資學習">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">台幣、港幣、比特幣，哪個會先消失？</h3>
                        <div class="card-meta">
                            Posted by <span>高重建老師</span> • 2024-12-23
                        </div>
                        <p class="card-description">
                            隨著數位支付的普及，各種貨幣的未來發展引發熱議。本文將深入探討三種不同性質的貨幣：台幣、港幣和比特幣的未來發展趨勢。
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary p-2" href="#" id="readAll">查看所有「學開戶」文章</a>
        </div>
    </div>


    <!-- 撿好康 -->
    <div class="pb-5">
        <div class="container py-5" id="article_new" style="height:auto;">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Find Deals</div>
                <h2>撿好康</h2>
            </div>

            <!-- 撿好康_輪播 -->
            <div class="carousel" id="article_carousel_new">
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈天上掉錢下來</div>
                        <img src="./img/lesson.jpg" alt="SOLV Megadrop">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2025-01-07
                        </div>
                        <p class="card-description">
                            最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！跨進半年，幣安交易所 Megadrop 活動正式開跑，趕快來看看如何參與！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">學習投資</div>
                        <img src="./img/lesson.jpg" alt="投資學習">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">台幣、港幣、比特幣，哪個會先消失？</h3>
                        <div class="card-meta">
                            Posted by <span>高重建老師</span> • 2024-12-23
                        </div>
                        <p class="card-description">
                            隨著數位支付的普及，各種貨幣的未來發展引發熱議。本文將深入探討三種不同性質的貨幣：台幣、港幣和比特幣的未來發展趨勢。
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary p-2" href="#" id="readAll">查看所有「撿好康」文章</a>
        </div>
    </div>

    <!-- 專欄作家 -->
    <div class="pb-5">
        <div class="container py-5" id="article_new" style="height:auto;">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Columnists</div>
                <h2>專欄作家</h2>
            </div>

            <!-- 專欄作家_輪播 -->
            <div class="carousel" id="article_carousel_new">
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈天上掉錢下來</div>
                        <img src="./img/lesson.jpg" alt="SOLV Megadrop">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2025-01-07
                        </div>
                        <p class="card-description">
                            最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！跨進半年，幣安交易所 Megadrop 活動正式開跑，趕快來看看如何參與！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">學習投資</div>
                        <img src="./img/lesson.jpg" alt="投資學習">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">台幣、港幣、比特幣，哪個會先消失？</h3>
                        <div class="card-meta">
                            Posted by <span>高重建老師</span> • 2024-12-23
                        </div>
                        <p class="card-description">
                            隨著數位支付的普及，各種貨幣的未來發展引發熱議。本文將深入探討三種不同性質的貨幣：台幣、港幣和比特幣的未來發展趨勢。
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-image-container">
                        <div class="card-tag">幣圈大調查</div>
                        <img src="./img/lesson.jpg" alt="幣圈調查">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                        <div class="card-meta">
                            Posted by <span>閱讀筆耕</span> • 2024-12-17
                        </div>
                        <p class="card-description">
                            透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                        </p>
                        <div class="card-footer_new">
                            <a href="#" class="read-more">閱讀更多</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary p-2" href="#" id="readAll">查看所有「專欄作家」文章</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<button class="custom-prev"><i class="fa fa-chevron-left"></i></button>',
                nextArrow: '<button class="custom-next"><i class="fa fa-chevron-right"></i></button>',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>


<footer>
    <?php include 'footer.php' ?>
</footer>

</html>