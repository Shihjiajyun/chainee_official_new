<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>鏈習生 - 主視覺頁面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/knowledge.css">
</head>

<style>
    .main-visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: url('https://chainee.io/wp-content/uploads/2024/05/%E5%85%8D%E8%B2%BB%E6%96%87%E7%AB%A0%E9%A0%81%E9%A6%96%E5%9C%96%E8%83%8C%E6%99%AF%E7%85%A7-scaled.jpg') center/cover no-repeat;
        height:58vh;
        padding: 0 10%;
        color: white;
        overflow: hidden;
        /* border-radius: 10px; */
    }

    /* 背景遮罩，讓文字更清晰 */
    .main-visual .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        /* 半透明黑色遮罩 */
        z-index: 1;
    }

    /* 內容區塊：文字靠右對齊 */
    .main-visual .content {
        position: relative;
        z-index: 2;
        max-width: 50%;
        text-align: right;
        margin-left: auto;
        margin-right: 50px;
        /* 讓內容區塊靠右 */
    }

    .main-visual h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .main-visual p {
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .main-visual .buttons {
        display: flex;
        gap: 15px;
        justify-content: right;
    }

    .btn-custom {
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-primary-custom {
        background: #007bff;
        color: white;
    }

    .btn-primary-custom:hover {
        background: #0056b3;
    }

    .btn-secondary-custom {
        background: #ffffff;
        color: #333;
        border: 1px solid #ddd;
    }

    .btn-secondary-custom:hover {
        background: rgb(123, 123, 123);
    }

    /* 右側圖片 */
    .main-visual .visual-image {
        position: relative;
        z-index: 2;
        max-width: 40%;
        height: auto;
    }
</style>

<style>
    .article-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
    }

    .featured-image-container {
        width: 100%;
        height: 100%;
        overflow: hidden;
        /* 隱藏超出部分 */
        position: relative;
    }

    .featured-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* 讓圖片填滿容器並保持比例 */
        position: absolute;
        top: 0;
        left: 0;
    }


    /* 黑色漸變遮罩：從透明到黑色 */
    .featured-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, 0.8) 90%);
        z-index: 1;
    }

    /* 置於遮罩上方的文字 */
    .bottom-text {
        position: absolute;
        bottom: 45px;
        /* 給作者與日期留空間 */
        left: 15px;
        font-size: 1.1rem;
        font-weight: 900;
        color: white;
        z-index: 2;
        transition: color 0.3s ease-in-out;
    }

    /* 作者與日期區塊 */
    .featured-image-container .article-meta {
        position: absolute;
        bottom: 10px;
        left: 15px;
        font-size: 0.9rem;
        color: white;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* 圖示樣式 */
    .article-meta i {
        margin-right: 5px;
    }

    /* Hover 時讓標題變藍色 */
    .featured-image-container:hover .bottom-text {
        color: #007bff;
    }
</style>

<style>
    /* 讓 article-card 內的元素各佔 50% */
    .article-card {
        display: flex;
        align-items: center;
        width: 100%;
        gap: 15px;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
        /* 分隔線 */
    }

    .article-card:last-child {
        border-bottom: none;
        /* 最後一個不要有底線 */
    }

    /* 讓圖片區塊佔 50% */
    .small-article-image {
        width: 50%;
        /* height: 100px; */
        /* 設定固定高度 */
        overflow: hidden;
        border-radius: 10px;
    }

    .small-article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* 保持圖片比例 */
        border-radius: 10px;
    }

    /* 讓文章內容區塊也佔 50% */
    .article-content {
        width: 50%;
    }

    /* 文章標題 */
    .article-content h5 {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 5px;
        transition: color 0.3s ease-in-out;
    }

    .article-content h5:hover {
        color: #007bff;
        /* 滑鼠懸停變藍色 */
    }

    /* 文章作者與時間 */
    .article-meta {
        font-size: 0.85rem;
        color: #666;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* 圖示 */
    .article-meta i {
        color: #888;
    }
</style>

<body>
    <!-- 導覽列 -->
    <?php include 'navbar.php' ?>
    <div class="main-visual">
        <div class="overlay"></div>
        <div class="content">
            <h1>鏈習生幣圈知識庫</h1>
            <p>從幣圈名詞到平台操作，用圖文帶你手把手入門 Web3！</p>
            <div class="buttons">
                <a href="/courses.html" class="btn btn-custom btn-primary-custom">免費課程</a>
                <a href="/articles.html" class="btn btn-custom btn-secondary-custom">最新文章</a>
            </div>
        </div>
        <img src="./img/banner.png" alt="區塊鏈學習" class="visual-image">
    </div>

    <!-- 最新文章 -->
    <div class="article_new" style="background: linear-gradient(to bottom, white, #dde8ee);">
        <div class="container py-5" id="article_new">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Latest Articles</div>
                <h2>最新文章</h2>
            </div>

            <div class="row">
                <!-- Featured Article -->
                <div class="col-lg-7">
                    <div class="article-card" style="height:100%">
                        <div class="featured-image-container">
                            <img src="https://chainee.io/wp-content/uploads/2025/02/CleanShot-2025-02-10-at-18.04.09@2x.png"
                                class="featured-image"
                                alt="加密貨幣出金3大攻略">
                            <div class="featured-overlay"></div>
                            <div class="bottom-text">合約網格是什麼？合約網格教學：做多、中性、做空策略、參數設定、風險、常見問題一次看</div>
                            <div class="article-meta">
                                <span><i class="fas fa-user"></i>作者名稱</span>
                                <span><i class="fas fa-calendar"></i>2025-02-10</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Articles -->
                <div class="col-lg-5">
                    <!-- 文章列表 -->

                    <!-- Article 1 -->
                    <div class="article-card">
                        <div class="small-article-image">
                            <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/1-r13kjdvn8n8wtink3oqc6ga2vgws53pk1491h8ve6w.png" alt="總鎖倉價值是什麼？">
                        </div>
                        <div class="article-content">
                            <h5>總鎖倉價值是什麼？為何不該和 PoS 質押價值合併計算？</h5>
                            <div class="article-meta">
                                <span><i class="fas fa-user"></i> GGBear 葛研究</span>
                                <span><i class="fas fa-calendar"></i> 2025-01-10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Article 2 -->
                    <div class="article-card">
                        <div class="small-article-image">
                            <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-02-06-at-12.17.43@2x-r139zbsvw6z6hipjdeku0cwk2u5zuuwns09bxkdy2e.png" alt="Pendle Finance是什麼？">
                        </div>
                        <div class="article-content">
                            <h5>Pendle Finance是什麼？分離加密資產「所有權」與「收益權」的 DeFi 理財新策略</h5>
                            <div class="article-meta">
                                <span><i class="fas fa-user"></i> 區塊斯基</span>
                                <span><i class="fas fa-calendar"></i> 2025-01-09</span>
                            </div>
                        </div>
                    </div>

                    <!-- Article 3 -->
                    <div class="article-card">
                        <div class="small-article-image">
                            <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-02-06-at-12.17.43@2x-r139zbsvw6z6hipjdeku0cwk2u5zuuwns09bxkdy2e.png" alt="幣圈盤勢分析">
                        </div>
                        <div class="article-content">
                            <h5>幣圈盤勢分析 2025/01/08</h5>
                            <div class="article-meta">
                                <span><i class="fas fa-user"></i> MO哥</span>
                                <span><i class="fas fa-calendar"></i> 2025-01-09</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 最新文章_輪播 -->
            <div class="swiper-container" id="article_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-21-at-16.26.14@2x-r0bq644kbh8cruiuqmompg093om8lloorlyfzsv2bo.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/%E7%9B%A4%E5%8B%A2%E5%88%86%E6%9E%90-1_22_3-r0di6k65m9uefx6re8mb5fbu64aqnp6b9k1v8a1dp4.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 更多 .swiper-slide -->

                </div>

                <!-- Swiper 分頁點 -->
                <div class="swiper-pagination"></div>

                <!-- Swiper 左右導航按鈕 -->
                <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
            </div>
        </div>
    </div>

    <!-- 學幣圈 + 學投資 -->
    <div class="article_new" style="background-image: linear-gradient(180deg, white 0%, #fff9ef 80%);">
        <div class="container py-5" id="article_new">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Learn Crypto</div>
                <h2>學幣圈</h2>
            </div>

            <!-- 最新文章_輪播 -->
            <div class="swiper-container" id="article_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-21-at-16.26.14@2x-r0bq644kbh8cruiuqmompg093om8lloorlyfzsv2bo.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/%E7%9B%A4%E5%8B%A2%E5%88%86%E6%9E%90-1_22_3-r0di6k65m9uefx6re8mb5fbu64aqnp6b9k1v8a1dp4.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swiper 分頁點 -->
                <div class="swiper-pagination mt-4"></div>

                <!-- Swiper 左右導航按鈕 -->
                <!-- <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> -->
                <div class="d-flex justify-content-center mt-3" style="height:60px">
                    <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center" style="background-color:#037fff;padding:10px 30px;border-radius:10px;width:auto;height:100%">查看所有「學幣圈」文章</a>
                </div>
            </div>
        </div>

        <div class="container py-5" id="article_new" style="margin-top:70px">
            <!-- Section Title -->
            <div class="section-title" id="investing">
                <div class="en-title">Learn Investing</div>
                <h2>學投資</h2>
            </div>

            <!-- 最新文章_輪播 -->
            <div class="swiper-container" id="article_swiper">
                <div class="swiper-wrapper" id="investing">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-21-at-16.26.14@2x-r0bq644kbh8cruiuqmompg093om8lloorlyfzsv2bo.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/%E7%9B%A4%E5%8B%A2%E5%88%86%E6%9E%90-1_22_3-r0di6k65m9uefx6re8mb5fbu64aqnp6b9k1v8a1dp4.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swiper 分頁點 -->
                <div class="swiper-pagination mt-4"></div>

                <!-- Swiper 左右導航按鈕 -->
                <!-- <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> -->
                <div class="d-flex justify-content-center mt-3" style="height:60px">
                    <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center" style="background-color:#ff7a02;padding:10px 30px;border-radius:10px;width:auto;height:100%;border:none;">查看所有「學投資」文章</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 學開戶 + 撿好康 -->
    <div class="article_new" style="background-image: linear-gradient(180deg, white 0%, #fff9ef 100%);">
        <div class="container py-5" id="article_new">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Open Accounts</div>
                <h2>學開戶</h2>
            </div>

            <!-- 最新文章_輪播 -->
            <div class="swiper-container" id="article_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-21-at-16.26.14@2x-r0bq644kbh8cruiuqmompg093om8lloorlyfzsv2bo.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/%E7%9B%A4%E5%8B%A2%E5%88%86%E6%9E%90-1_22_3-r0di6k65m9uefx6re8mb5fbu64aqnp6b9k1v8a1dp4.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swiper 分頁點 -->
                <div class="swiper-pagination mt-4"></div>
                <div class="position-relative">
                    <!-- 圖片（不占用空間） -->
                    <img src="./img/icon.png" alt="圖示" class="icon_side">

                    <!-- 按鈕（可覆蓋圖片） -->
                    <div class="button-container">
                        <a href="#" class="btn btn-primary" style="background-color:#037fff; padding:10px 30px; border-radius:10px;width:auto;">
                            查看所有「學開戶」文章
                        </a>
                    </div>
                </div>


            </div>
        </div>

        <div class="container py-5" id="article_new">
            <!-- Section Title -->
            <div class="section-title" id="investing">
                <div class="en-title">Find Deals</div>
                <h2>撿好康</h2>
            </div>

            <!-- 最新文章_輪播 -->
            <div class="swiper-container" id="article_swiper">
                <div class="swiper-wrapper" id="investing">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-21-at-16.26.14@2x-r0bq644kbh8cruiuqmompg093om8lloorlyfzsv2bo.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/%E7%9B%A4%E5%8B%A2%E5%88%86%E6%9E%90-1_22_3-r0di6k65m9uefx6re8mb5fbu64aqnp6b9k1v8a1dp4.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swiper 分頁點 -->
                <div class="swiper-pagination mt-4"></div>

                <!-- Swiper 左右導航按鈕 -->
                <!-- <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> -->
                <div class="d-flex justify-content-center mt-3" style="height:60px">
                    <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center" style="background-color:#ff7a02;padding:10px 30px;border-radius:10px;width:auto;height:100%;border:none;">查看所有「撿好康」文章</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 專欄作家 -->
    <div class="article_new" style="background-image: white">
        <div class="container py-5" id="article_new">
            <!-- Section Title -->
            <div class="section-title">
                <div class="en-title">Columnists</div>
                <h2>專欄作家</h2>
            </div>

            <!-- 最新文章_輪播 -->
            <div class="swiper-container" id="article_swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-21-at-16.26.14@2x-r0bq644kbh8cruiuqmompg093om8lloorlyfzsv2bo.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/%E7%9B%A4%E5%8B%A2%E5%88%86%E6%9E%90-1_22_3-r0di6k65m9uefx6re8mb5fbu64aqnp6b9k1v8a1dp4.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-image-container">
                                <div class="card-tag">幣圈天上掉錢下來</div>
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/image-r0epup4cepzcwpkj7synipaaanfkuyga2wxzh30i6m.png" alt="SOLV Megadrop">
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                                <div class="card-meta">
                                    Posted by <span>閱讀筆耕 • 2025-01-07</span>
                                </div>
                                <p class="card-description">
                                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！最後更新日期：2024 年 1 月
                                </p>
                                <!-- <div class="card-footer_new">
                                    <a href="#" class="read-more">閱讀更多</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swiper 分頁點 -->
                <div class="swiper-pagination mt-4"></div>

                <!-- Swiper 左右導航按鈕 -->
                <!-- <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> -->
                <div class="d-flex justify-content-center mt-3" style="height:60px">
                    <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center" style="background-color:#037fff;padding:10px 30px;border-radius:10px;width:auto;height:100%">查看所有「專欄作家」文章</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper("#article_swiper", {
                slidesPerView: 1, // 每次顯示 3 個卡片
                spaceBetween: 0, // 卡片間距
                loop: true, // 無限循環
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 3
                    }, // 桌機 3 張
                    768: {
                        slidesPerView: 2
                    },
                    479:{
                        slidesPerView: 1
                    }
                }
            });
        });
    </script>

</body>


<footer>
    <?php include 'footer.php' ?>
</footer>

</html>