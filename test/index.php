<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>鏈習生 - 首頁</title>
</head>

<style>
    .course-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
    }

    .course-title {
        font-size: 20px;
        font-weight: 700;
        max-width: 100%;
        /* 限制最大寬度 */
        white-space: normal;
        /* 允許換行 */
        overflow-wrap: break-word;
        /* 防止長單詞溢出 */
        word-wrap: break-word;
        min-height: 50px;
        /* 確保內容換行 */
    }


    .rating-stars {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #ffc107;
        /* 金色星星 */
        font-size: 18px;
    }

    .course-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .course-price {
        font-size: 20px;
        font-weight: bold;
        font-family: Public Sans;
        font-weight: 700;
        font-size: 20px;
        line-height: 20px;
        letter-spacing: 0.05px;

    }

    .course-action {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 20px;
        color: #144a99;
        transition: color 0.3s ease;
    }

    .course-action:hover {
        color: #ffc27a;
        /* 懸停時變色 */
    }

    .course-image img {
        border-radius: 12px;
    }

    .instructor-image {
        border-radius: 24px;
    }


    .feedback-section {
        position: relative;
    }

    .feedback-card {
        width: 90%;
        max-width: none;
        /* 讓卡片佔 80% 的寬度 */
        /* max-width: 800px; */
        /* 避免卡片在大螢幕上過寬 */
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        text-align: left;
        margin: auto;
        /* 讓卡片置中 */
    }

    .feedback-user {
        display: flex;
        align-items: center;
        gap: 0px !important;
        /* 調整間距，讓內容更緊湊 */
    }

    .feedback-avatar {
        width: 60px;
        /* 稍微加大頭像，提高辨識度 */
        height: 60px;
        border-radius: 50%;
        /* object-fit: cover; */
        border: 2px solid #144a99;
        /* 增加外框，提高識別 */
    }

    .feedback-user-name {
        font-size: 20px;
        /* 字體稍微放大，提高可讀性 */
        font-weight: bold;
    }

    .feedback-user-title {
        font-size: 14px;
        color: #666;
        font-style: italic;
        /* 讓職稱更有層次感 */
    }

    .feedback-rating {
        display: flex;
        gap: 0px;
        color: #ffc107;
        font-size: 18px;
        /* 加大星星圖標，讓評價更明顯 */
        margin-top: 8px;
    }

    .feedback-text {
        font-size: 16px;
        line-height: 1.6;
        /* 增加行距，提高可讀性 */
        margin-top: 12px;
        color: #444;
    }

    /* Swiper 按鈕樣式 */
    .swiper-button-prev,
    .swiper-button-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: #144a99;
        font-size: 18px;
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        z-index: 10;
        /* 確保按鈕不被 Swiper 內容遮擋 */
    }

    /* 左側按鈕 */
    .swiper-button-prev {
        z-index: 999;
        overflow: visible !important;
        left: 10px;
        /* 向內縮，讓按鈕更貼近卡片 */
    }

    /* 右側按鈕 */
    .swiper-button-next {
        z-index: 999;
        overflow: visible !important;
        right: 10px;
    }

    /* 按鈕懸停效果 */
    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        background: #144a99;
        color: white;
    }

    /* Swiper 按鈕圖示大小 */
    .swiper-button-prev:after,
    .swiper-button-next:after {
        overflow: visible !important;
        z-index: 999;
        font-size: 24px;
    }

    /* 響應式調整 */
    @media (max-width: 768px) {
        .swiper-button-prev {
            left: -30px;
            /* 在小屏幕上縮小按鈕間距 */
        }

        .swiper-button-next {
            right: -30px;
        }

        .feedback-avatar {
            width: 50px;
            height: 50px;
        }

        .feedback-user-name {
            font-size: 18px;
        }

        .feedback-text {
            font-size: 14px;
        }
    }

    .swiper-wrapper {
        padding: 0 !important;
        margin: 0 !important;
    }
</style>

<style>
    .swiper {
        width: 100%;
        padding-bottom: 40px;
    }

    #course .swiper-button-next,
    #course .swiper-button-prev {
        color: #3461fd;
        /* 讓按鈕顏色與標題一致 */
    }

    #course .swiper-pagination-bullet {
        background: #3461fd;
    }

    #course .swiper-controls {
        display: flex;
        gap: 20px;
        margin-top: 60px;
        margin-right: 60px;
    }

    #course .swiper-button-prev,
    #course .swiper-button-next {
        position: static !important;
        /* 取消 Swiper 預設的絕對定位 */
        width: 40px;
        height: 40px;
        background-color: #144a99;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    #course .swiper-button-prev:hover,
    #course .swiper-button-next:hover {
        background-color: #294bce;
    }
</style>

<style>
    /* 左側關於我們區塊 */
    .about-section {
        background: linear-gradient(135deg, #f8f9fa, #e3e6eb);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        height: 90%;
        font-size: 20px
    }

    .instructors-section h3 {
        color: #144a99;
        font-family: Public Sans;
        font-weight: 600;
        font-size: 56px;
        line-height: 56px;
        letter-spacing: 0%;

    }

    /* 右側熱門文章區塊 */
    .popular-articles {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .article-card {
        display: flex;
        align-items: center;
        background: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .article-image {
        width: 90px;
        height: 90px;
        object-fit: cover;
        margin-left: 10px;
        border-radius: 10px;
    }

    .article-content {
        padding: 10px;
    }

    .article-title {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        margin: 0;
    }

    .article-description {
        font-size: 14px;
        color: #666;
        margin-top: 5px;
    }

    .article-card:hover .article-title {
        color: #3461fd;
    }

    /* 移除超連結底線 */
    .article-card {
        text-decoration: none;
        padding: 10px;
    }

    /* 調整文章資訊排版 */
    .article-meta {
        display: flex;
        align-items: center;
        font-size: 14px;
        color: #777;
        margin-top: 5px;
    }

    .article-meta i {
        margin-right: 5px;
    }

    .instructors-section .read-more {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        color: #144a99;
        border-top: 1px solid #eee;
        padding: 10px;
        cursor: pointer;
        transition: background 0.3s, color 0.3s;
        border-radius: 10px;
    }

    .instructors-section .read-more:hover {
        background: #144a99;
        color: white;
    }

    .instructors-section .read-more i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .instructors-section .read-more:hover i {
        transform: translateX(5px);
    }
</style>

<style>
    .courses-header {
        display: flex;
        justify-content: space-between;
        /* 左右對齊 */
        align-items: center;
        /* 垂直置中 */
    }

    .controls-container {
        display: flex;
        align-items: center;
        gap: 10px;
        /* 調整按鈕與箭頭之間的距離 */
    }

    .view-more {
        text-decoration: underline;
        color: #9b9b9b;
        margin-right: 10px;
        font-size: 20px;
    }

    .swiper-controls {
        display: flex;
        gap: 5px;
        /* 控制左右箭頭間距 */
    }

    /* 讓 .container 高度根據內部內容變化 */
    .courses-section .container {
        display: flex;
        align-items: stretch;
        /* 確保內部內容拉伸至最大高度 */
        justify-content: center;
        /* 讓內容置中 */
        height: auto;
        max-height: 500px;
    }
</style>

<body>
    <?php include 'navbar.php' ?>


    <div class="hero-section">
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/qvdGZHDo4mU?autoplay=1&mute=1&loop=1&playlist=qvdGZHDo4mU" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="gradient-overlay1"></div>
        <div class="gradient-overlay"></div>

        <div class="courses-section">
            <div class="hero-content ">
                <h1>為自己學習最迷人</h1>
                <p>鏈習生 線上學習平台，找到適合你的學習方式，迎接新改變！</p>

                <div class="search-bar">
                    <input type="text" placeholder="今天想學點什麼？">
                    <button><i class="fas fa-search"></i></button>
                </div>

                <div class="tags">
                    <div class="tag">24堂新年希望加速器 🚀</div>
                    <div class="tag">先搶先贏 / 最低77折</div>
                    <div class="tag">長期問答攻防戰</div>
                    <div class="tag">2025請假攻略</div>
                </div>

            </div>
        </div>
    </div>

    <!-- 官網數據顯示 -->
    <section class="stats-section">
        <div class="stats-container container">
            <div class="stat-item">
                <div class="stat-icon-wrapper">
                    <i class="fa-solid fa-calendar-alt stat-icon"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-number">2020</div>
                    <div class="stat-label">成立年分</div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon-wrapper">
                    <i class="fa-solid fa-chalkboard-teacher stat-icon"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-number">300萬+</div>
                    <div class="stat-label">瀏覽次數</div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon-wrapper">
                    <i class="fa-solid fa-user-graduate stat-icon"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-number">20,000+</div>
                    <div class="stat-label">累計學員</div>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon-wrapper">
                    <i class="fa-solid fa-video stat-icon"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-number">10,000+</div>
                    <div class="stat-label">課程時數</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 幣圈初心者 -->
    <section class="courses-section" id="course" style="margin-top: 50px;">
        <h2 class="courses-title"><span style="color: #144a99;">幣圈初心者</span></h2>
        <div class="courses-header">
            <p class="courses-description">
                剛踏入幣圈的初心者看過來
            </p>
            <div class="controls-container">
                <a href="introduce.php?category=beginner" class="view-more">查看更多</a>
                <div class="swiper-controls">
                    <div class="swiper-button-prev swiper-button-prev-1"></div>
                    <div class="swiper-button-next swiper-button-next-1"></div>
                </div>
            </div>
        </div>


        <div class="container mb-5">
            <div class="swiper mySwiper1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg" alt="HTML course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">腦哥 | 投資加密貨幣，懂這些就夠了！從新手到穩健獲利的全方位幣圈攻略</h3>
                                    <div class="course-rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                        </div>
                                        <span>(15)</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">
                                        <span class="course-original-price"><del>NT$14,500</del></span>
                                        <span class="course-price">NT$107,999</span>
                                        <a href="course.php" class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/2025/01/20250124.jpg" alt="CSS course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">呢喃貓 | 股票操盤人轉戰幣圈 精選 10 招實戰獲利策略</h3>
                                    <div class="course-rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star-half-alt star-icon"></i>
                                        </div>
                                        <span>(30)</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">

                                        <span class="course-original-price"><del>NT$14,500</del></span>
                                        <span class="course-price">NT$107,999</span>
                                        <a href="course.php" class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-14-at-18.11.37@2x-qzzo3tyvtm12nskj930g9okjboknaoffoozndi3uzc.png" alt="JavaScript course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">AMA 是什麼？鏈習生公開群 3 大 AMA 賦能大揭秘！</h3>
                                    <div class="course-rating">
                                        <span class="text-secondary"><i class="fa-solid fa-eye"></i> 1,235 人觀看</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">
                                        <span class="course-price">$ 免費</span>
                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2024-11-29-at-11.24.42@2x-qxr3vkgw1kzk19ed6jc7n8simtm763uwjrngqra3ym.jpg" alt="JavaScript course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">比特幣投資 33 個質疑與擔憂，網友提問逐一回應</h3>
                                    <div class="course-rating">
                                        <span class="text-secondary"><i class="fa-solid fa-eye"></i> 1,235 人觀看</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">
                                        <span class="course-price">$ 免費</span>
                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 分頁點 -->
                <div class="swiper-pagination swiper-pagination-1"></div>
            </div>
        </div>
    </section>

    <!-- 幣圈見習家 -->
    <div style="background-color: rgba(231, 233, 235, 0.5);">
        <section class="courses-section pt-5" id="course" style="margin-top: 50px;">
            <h2 class="courses-title"><span style="color: #144a99;">幣圈見習家</span></h2>
            <div class="courses-header">
                <p class="courses-description">
                    剛踏入幣圈的初心者看過來
                </p>
                <div class="controls-container">
                    <a href="introduce.php?category=intermediate" class="view-more">查看更多</a>
                    <div class="swiper-controls">
                        <div class="swiper-button-prev swiper-button-prev-2"></div>
                        <div class="swiper-button-next swiper-button-next-2"></div>
                    </div>
                </div>
            </div>
            <div class="container mb-5">
                <div class="swiper mySwiper1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="course-card">
                                <div class="course-content">
                                    <div class="course-inner">
                                        <div class="course-image">
                                            <img src="https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg" alt="HTML course" class="course-img">
                                            <div class="course-tag">初心者</div>
                                        </div>
                                        <h3 class="course-title">腦哥 | 投資加密貨幣，懂這些就夠了！從新手到穩健獲利的全方位幣圈攻略</h3>
                                        <div class="course-rating">
                                            <div class="rating-stars">
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star star-icon"></i>
                                            </div>
                                            <span>(15)</span>
                                        </div>
                                    </div>
                                    <div class="course-footer">
                                        <div class="course-divider"></div>
                                        <div class="course-price-wrapper">
                                            <span class="course-original-price"><del>NT$14,500</del></span>
                                            <span class="course-price">NT$107,999</span>
                                            <button class="course-action" aria-label="Add to cart">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="course-card">
                                <div class="course-content">
                                    <div class="course-inner">
                                        <div class="course-image">
                                            <img src="https://chainee.io/wp-content/uploads/2025/01/20250124.jpg" alt="CSS course" class="course-img">
                                            <div class="course-tag">初心者</div>
                                        </div>
                                        <h3 class="course-title">呢喃貓 | 股票操盤人轉戰幣圈 精選 10 招實戰獲利策略</h3>
                                        <div class="course-rating">
                                            <div class="rating-stars">
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star star-icon"></i>
                                                <i class="fa-solid fa-star-half-alt star-icon"></i>
                                            </div>
                                            <span>(30)</span>
                                        </div>
                                    </div>
                                    <div class="course-footer">
                                        <div class="course-divider"></div>
                                        <div class="course-price-wrapper">

                                            <span class="course-original-price"><del>NT$14,500</del></span>
                                            <span class="course-price">NT$107,999</span>

                                            <button class="course-action" aria-label="Add to cart">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="course-card">
                                <div class="course-content">
                                    <div class="course-inner">
                                        <div class="course-image">
                                            <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-14-at-18.11.37@2x-qzzo3tyvtm12nskj930g9okjboknaoffoozndi3uzc.png" alt="JavaScript course" class="course-img">
                                            <div class="course-tag">初心者</div>
                                        </div>
                                        <h3 class="course-title">AMA 是什麼？鏈習生公開群 3 大 AMA 賦能大揭秘！</h3>
                                        <div class="course-rating">
                                            <span class="text-secondary"><i class="fa-solid fa-eye"></i> 1,235 人觀看</span>
                                        </div>
                                    </div>
                                    <div class="course-footer">
                                        <div class="course-divider"></div>
                                        <div class="course-price-wrapper">
                                            <span class="course-price">$ 免費</span>
                                            <button class="course-action" aria-label="Add to cart">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="course-card">
                                <div class="course-content">
                                    <div class="course-inner">
                                        <div class="course-image">
                                            <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2024-11-29-at-11.24.42@2x-qxr3vkgw1kzk19ed6jc7n8simtm763uwjrngqra3ym.jpg" alt="JavaScript course" class="course-img">
                                            <div class="course-tag">初心者</div>
                                        </div>
                                        <h3 class="course-title">比特幣投資 33 個質疑與擔憂，網友提問逐一回應</h3>
                                        <div class="course-rating">
                                            <span class="text-secondary"><i class="fa-solid fa-eye"></i> 1,235 人觀看</span>
                                        </div>
                                    </div>
                                    <div class="course-footer">
                                        <div class="course-divider"></div>
                                        <div class="course-price-wrapper">
                                            <span class="course-price">$ 免費</span>
                                            <button class="course-action" aria-label="Add to cart">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 分頁點 -->
                    <div class="swiper-pagination swiper-pagination-1"></div>
                </div>
            </div>
        </section>
    </div>

    <!-- 幣圈實戰冒險者 -->
    <section class="courses-section" id="course" style="margin-top: 50px;">
        <h2 class="courses-title"><span style="color: #144a99;">幣圈實戰冒險者</span></h2>

        <div class="courses-header">
            <p class="courses-description">
                剛踏入幣圈的初心者看過來
            </p>
            <div class="controls-container">
                <a href="introduce.php?category=advanced" class="view-more">查看更多</a>
                <div class="swiper-controls">
                    <div class="swiper-button-prev swiper-button-prev-3"></div>
                    <div class="swiper-button-next swiper-button-next-3"></div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="swiper mySwiper1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg" alt="HTML course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">腦哥 | 投資加密貨幣，懂這些就夠了！從新手到穩健獲利的全方位幣圈攻略</h3>
                                    <div class="course-rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                        </div>
                                        <span>(15)</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">
                                        <span class="course-original-price"><del>NT$14,500</del></span>
                                        <span class="course-price">NT$107,999</span>
                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/2025/01/20250124.jpg" alt="CSS course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">呢喃貓 | 股票操盤人轉戰幣圈 精選 10 招實戰獲利策略</h3>
                                    <div class="course-rating">
                                        <div class="rating-stars">
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star star-icon"></i>
                                            <i class="fa-solid fa-star-half-alt star-icon"></i>
                                        </div>
                                        <span>(30)</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">

                                        <span class="course-original-price"><del>NT$14,500</del></span>
                                        <span class="course-price">NT$107,999</span>

                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-01-14-at-18.11.37@2x-qzzo3tyvtm12nskj930g9okjboknaoffoozndi3uzc.png" alt="JavaScript course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">AMA 是什麼？鏈習生公開群 3 大 AMA 賦能大揭秘！</h3>
                                    <div class="course-rating">
                                        <span class="text-secondary"><i class="fa-solid fa-eye"></i> 1,235 人觀看</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">
                                        <span class="course-price">$ 免費</span>
                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2024-11-29-at-11.24.42@2x-qxr3vkgw1kzk19ed6jc7n8simtm763uwjrngqra3ym.jpg" alt="JavaScript course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">比特幣投資 33 個質疑與擔憂，網友提問逐一回應</h3>
                                    <div class="course-rating">
                                        <span class="text-secondary"><i class="fa-solid fa-eye"></i> 1,235 人觀看</span>
                                    </div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-divider"></div>
                                    <div class="course-price-wrapper">
                                        <span class="course-price">$ 免費</span>
                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 分頁點 -->
                <div class="swiper-pagination swiper-pagination-1"></div>
            </div>
        </div>
    </section>

    <!-- 關於我們、熱門文章 -->
    <div style=" background-color: rgba(231, 233, 235, 0.5);">
        <section class="instructors-section pt-5" id="course" style="margin-left: auto; margin-right: auto;">
            <div class="container my-5">
                <div class="row">
                    <!-- 左側區塊：關於我們 -->
                    <div class="col-md-6">
                        <h3>關於我們</h3>
                        <div class="about-section">
                            <p>鏈習生專欄作家來自各個區塊鏈領域，包括 DeFi、NFT、Web3 開發等，為讀者提供最前線的加密貨幣趨勢與分析。</p>
                            <p>我們的作家不僅擁有豐富的產業經驗，還精通技術與市場趨勢，幫助投資者和開發者更快理解區塊鏈技術的發展動向。無論是智能合約的應用、去中心化金融（DeFi）策略，還是 NFT 和 Web3 的未來趨勢，這裡都能找到專業的見解。</p>
                            <p>我們致力於提供易懂且具有實用價值的內容，讓區塊鏈知識不再艱澀難懂。探索我們的專欄，學習來自業界專家的洞察與技巧！</p>
                            <p>我們致力於提供易懂且具有實用價值的內容，讓區塊鏈知識不再艱澀難懂。探索我們的專欄，學習來自業界專家的洞察與技巧！</p>
                        </div>

                    </div>

                    <!-- 右側區塊：熱門文章 -->
                    <div class="col-md-6">
                        <h3>熱門文章</h3>
                        <div class="popular-articles">
                            <a href="#" class="article-card">
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-02-13-at-00.05.26@2x-r1fdewlut9nthd2309cn7oijeb8kubv4ywwuma1v2c.png" alt="比特幣 ETF" class="article-image">
                                <div class="article-content">
                                    <p class="article-title">Pi 幣怎麼賣？完成 Pi 幣提領 KYC 等 9 道關卡，手把手圖文實際流程一次看</p>
                                    <!-- <p class="article-description">Pi 幣怎麼賣？完成 Pi 幣提領 KYC 等 9 道關卡，手把手圖文實際流程一次看</p> -->
                                    <div class="article-meta">
                                        <i class="fas fa-user"></i> 由 Jacob Jones
                                        <i class="far fa-calendar-alt" style="margin-left: 10px;"></i> 2024-02-14
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="article-card">
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2025-02-10-at-18.04.09@2x-r1anphvs5scaatbcnxmlfvaaktqk0mxnc5araij7a0.png" alt="比特幣 ETF" class="article-image">
                                <div class="article-content">
                                    <p class="article-title">合約網格是什麼？合約網格教學：做多、中性、做空策略、參數設定、風險、常見問題一次看</p>

                                    <div class="article-meta">
                                        <i class="fas fa-user"></i> 由 Jacob Jones
                                        <i class="far fa-calendar-alt" style="margin-left: 10px;"></i> 2024-02-14
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="article-card">
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/0212-%E7%9B%A4%E5%8B%A2%E5%88%86%E6%9E%90-r1eb4z382jdls6kv5n3d0ealpqvuzrko6se9xl4gig.png" alt="比特幣 ETF" class="article-image">
                                <div class="article-content">
                                    <p class="article-title">幣圈盤勢分析 2025/02/12</p>
                                    <!-- <p class="article-description">了解 ETF 如何影響比特幣市場，機構投資者的進場影響...</p> -->
                                    <div class="article-meta">
                                        <i class="fas fa-user"></i> 由 Jacob Jones
                                        <i class="far fa-calendar-alt" style="margin-left: 10px;"></i> 2024-02-14
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="read-more">
                                    <span>查看更多</span> <i class="fas fa-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- 學員反饋 -->
    <section class="courses-section block ">
        <h2 class="courses-title"><span style="color: #144a99;">學員反饋</span></h2>

        <div class="swiper feedback-swiper mt-5" style="padding-bottom: 30px;width: 92%;">
            <div class="swiper-wrapper">
                <!-- 反饋卡片 1 -->
                <div class="swiper-slide">
                    <div class="feedback-card">
                        <div class="feedback-user">
                            <img src="./img/author1.jpg" alt="Sarah Williams" class="feedback-avatar">
                            <div class="feedback-user-info">
                                <h3 class="feedback-user-name">Sarah Williams</h3>
                                <p class="feedback-user-title">Blockchain Developer</p>
                            </div>
                        </div>
                        <div class="feedback-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <p class="feedback-text">
                            "這門課幫助我掌握了區塊鏈技術，現在我可以開發智能合約了！"
                        </p>
                    </div>
                </div>

                <!-- 反饋卡片 2 -->
                <div class="swiper-slide">
                    <div class="feedback-card">
                        <div class="feedback-user">
                            <img src="./img/author1.jpg" alt="Michael Brown" class="feedback-avatar">
                            <div class="feedback-user-info">
                                <h3 class="feedback-user-name">Michael Brown</h3>
                                <p class="feedback-user-title">Crypto Trader</p>
                            </div>
                        </div>
                        <div class="feedback-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="feedback-text">
                            "這是我學習 DeFi 最好的課程之一！深入淺出，適合新手！"
                        </p>
                    </div>
                </div>

                <!-- 反饋卡片 3 -->
                <div class="swiper-slide">
                    <div class="feedback-card">
                        <div class="feedback-user">
                            <img src="./img/author1.jpg" alt="Sophia White" class="feedback-avatar">
                            <div class="feedback-user-info">
                                <h3 class="feedback-user-name">Sophia White</h3>
                                <p class="feedback-user-title">NFT Investor</p>
                            </div>
                        </div>
                        <div class="feedback-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <p class="feedback-text">
                            "老師解釋得非常清楚，我學到了如何投資 NFT 並降低風險！"
                        </p>
                    </div>
                </div>

                <!-- 反饋卡片 1 -->
                <div class="swiper-slide">
                    <div class="feedback-card">
                        <div class="feedback-user">
                            <img src="./img/author1.jpg" alt="Sarah Williams" class="feedback-avatar">
                            <div class="feedback-user-info">
                                <h3 class="feedback-user-name">Sarah Williams</h3>
                                <p class="feedback-user-title">Blockchain Developer</p>
                            </div>
                        </div>
                        <div class="feedback-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <p class="feedback-text">
                            "這門課幫助我掌握了區塊鏈技術，現在我可以開發智能合約了！"
                        </p>
                    </div>
                </div>

                <!-- 反饋卡片 2 -->
                <div class="swiper-slide">
                    <div class="feedback-card">
                        <div class="feedback-user">
                            <img src="./img/author1.jpg" alt="Michael Brown" class="feedback-avatar">
                            <div class="feedback-user-info">
                                <h3 class="feedback-user-name">Michael Brown</h3>
                                <p class="feedback-user-title">Crypto Trader</p>
                            </div>
                        </div>
                        <div class="feedback-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="feedback-text">
                            "這是我學習 DeFi 最好的課程之一！深入淺出，適合新手！"
                        </p>
                    </div>
                </div>

                <!-- 反饋卡片 3 -->
                <div class="swiper-slide">
                    <div class="feedback-card">
                        <div class="feedback-user">
                            <img src="./img/author1.jpg" alt="Sophia White" class="feedback-avatar">
                            <div class="feedback-user-info">
                                <h3 class="feedback-user-name">Sophia White</h3>
                                <p class="feedback-user-title">NFT Investor</p>
                            </div>
                        </div>
                        <div class="feedback-rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <p class="feedback-text">
                            "老師解釋得非常清楚，我學到了如何投資 NFT 並降低風險！"
                        </p>
                    </div>
                </div>
            </div>

            <!-- Swiper 左右導航按鈕 -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- Swiper 分頁指示器 -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".feedback-swiper", {
                loop: true,
                slidesPerView: 1, // 一次顯示 3 張回饋
                spaceBetween: 0, // 卡片之間的間距
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    992: {
                        slidesPerView: 3
                    }, // 桌面版 3 張
                    768: {
                        slidesPerView: 2
                    }, // 平板 2 張
                    576: {
                        slidesPerView: 1
                    }, // 手機 1 張
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Swiper 1
            var swiper1 = new Swiper(".mySwiper1", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next-1",
                    prevEl: ".swiper-button-prev-1",
                },
                pagination: {
                    el: ".swiper-pagination-1",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                }
            });

            // Swiper 2
            var swiper2 = new Swiper(".mySwiper2", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next-2",
                    prevEl: ".swiper-button-prev-2",
                },
                pagination: {
                    el: ".swiper-pagination-2",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                }
            });

            // Swiper 3
            var swiper3 = new Swiper(".mySwiper3", {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next-3",
                    prevEl: ".swiper-button-prev-3",
                },
                pagination: {
                    el: ".swiper-pagination-3",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                }
            });
        });
    </script>


</body>
<footer class="mt-3">
    <?php include 'footer.php' ?>
</footer>

</html>