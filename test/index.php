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
        font-weight: bold;
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
    }

    .course-action {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 20px;
        color: #6c7dfb;
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
        border: 2px solid #3461fd;
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
        color: #3461fd;
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
        background: #3461fd;
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

    .swiper-button-next,
    .swiper-button-prev {
        color: #3461fd;
        /* 讓按鈕顏色與標題一致 */
    }

    .swiper-pagination-bullet {
        background: #3461fd;
    }

    .courses-section .swiper-controls {
        display: flex;
        gap: 20px;
        margin-top: 60px;
        margin-left: 60px;
    }

    .courses-section .swiper-button-prev,
    .courses-section .swiper-button-next {
        position: static !important;
        /* 取消 Swiper 預設的絕對定位 */
        width: 40px;
        height: 40px;
        background-color: #3461fd;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .courses-section .swiper-button-prev:hover,
    .courses-section .swiper-button-next:hover {
        background-color: #294bce;
    }
</style>

<body>
    <?php include 'navbar.php' ?>


    <div class="hero-section">
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/qvdGZHDo4mU?autoplay=1&mute=1&loop=1&playlist=qvdGZHDo4mU" frameborder="0" allowfullscreen></iframe>
        </div>


        <div class="gradient-overlay"></div>

        <div class="hero-content">
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
    <section class="courses-section" style="margin-top: 50px;">
        <h2 class="courses-title"><span style="color: #3461fd;">幣圈初心者</span></h2>
        <p class="courses-description">
            剛踏入幣圈的初心者看過來
            <a href="introduce.php?category=beginner" style="text-decoration: underline; color:rgb(148, 150, 156); margin-left: 10px;">查看更多</a>
        </p>
        <div class="swiper-controls">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="container mb-5">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="./img/lesson5.jpg" alt="HTML course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">投資獲利篇，投資加密貨幣懂這些就夠了</h3>
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
                                        <span class="course-price">$ 500</span>
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
                                        <img src="./img/lesson4.jpg" alt="CSS course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">區塊鏈技術入門，從基礎到實戰</h3>
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
                                        <span class="course-price">$ 600</span>
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
                                        <img src="./img/lesson5.jpg" alt="JavaScript course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">智能合約開發：從零開始打造去中心化應用</h3>
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
                                        <img src="./img/lesson4.jpg" alt="CSS course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">區塊鏈技術入門，從基礎到實戰</h3>
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
                                        <span class="course-price">$ 600</span>
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
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- 幣圈見習家 -->
    <div style="width:100vw;background-color: rgba(231, 233, 235, 0.5);">
        <section class="courses-section pt-5">
            <h2 class="courses-title"><span style="color: #3461fd;">幣圈見習家</span></h2>
            <p class="courses-description">
                踏入幣圈一段時間的的見習家看過來
            </p>

            <a href="introduce.php?category=intermediate" class="btn-custom mt-2">立即查看</a>

            <div class="container my-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="./img/lesson3.jpg" alt="HTML course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">投資獲利篇，投資加密貨幣懂這些就夠了</h3>
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
                                        <span class="course-price">$ 500</span>
                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="./img/lesson4.jpg" alt="CSS course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">區塊鏈技術入門，從基礎到實戰</h3>
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
                                        <span class="course-price">$ 600</span>
                                        <button class="course-action" aria-label="Add to cart">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="./img/lesson5.jpg" alt="JavaScript course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">智能合約開發：從零開始打造去中心化應用</h3>
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

                    <div class="col-md-6 col-lg-3">
                        <div class="course-card">
                            <div class="course-content">
                                <div class="course-inner">
                                    <div class="course-image">
                                        <img src="./img/lesson4.jpg" alt="Python course" class="course-img">
                                        <div class="course-tag">初心者</div>
                                    </div>
                                    <h3 class="course-title">破解牛市密碼：2025 投資幣圈三大黃金準則</h3>
                                    <div class="course-rating">
                                        <span class="text-secondary"><i class="fa-solid fa-calendar-days"></i> 2025-02-15（六）下午 2 點</span>
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
            </div>

        </section>
    </div>

    <!-- 幣圈實戰冒險者 -->
    <section class="courses-section">
        <h2 class="courses-title"><span style="color: #3461fd;">幣圈實戰冒險者</span></h2>
        <p class="courses-description">
            幣圈實戰冒險者看過來
        </p>
        <a href="introduce.php?category=advanced" class="btn-custom mt-2">立即查看</a>

        <div class="container my-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="course-card">
                        <div class="course-content">
                            <div class="course-inner">
                                <div class="course-image">
                                    <img src="./img/lesson3.jpg" alt="HTML course" class="course-img">
                                    <div class="course-tag">初心者</div>
                                </div>
                                <h3 class="course-title">投資獲利篇，投資加密貨幣懂這些就夠了</h3>
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
                                    <span class="course-price">$ 500</span>
                                    <button class="course-action" aria-label="Add to cart">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="course-card">
                        <div class="course-content">
                            <div class="course-inner">
                                <div class="course-image">
                                    <img src="./img/lesson4.jpg" alt="CSS course" class="course-img">
                                    <div class="course-tag">初心者</div>
                                </div>
                                <h3 class="course-title">區塊鏈技術入門，從基礎到實戰</h3>
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
                                    <span class="course-price">$ 600</span>
                                    <button class="course-action" aria-label="Add to cart">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="course-card">
                        <div class="course-content">
                            <div class="course-inner">
                                <div class="course-image">
                                    <img src="./img/lesson5.jpg" alt="JavaScript course" class="course-img">
                                    <div class="course-tag">初心者</div>
                                </div>
                                <h3 class="course-title">智能合約開發：從零開始打造去中心化應用</h3>
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

                <div class="col-md-6 col-lg-3">
                    <div class="course-card">
                        <div class="course-content">
                            <div class="course-inner">
                                <div class="course-image">
                                    <img src="./img/lesson4.jpg" alt="Python course" class="course-img">
                                    <div class="course-tag">初心者</div>
                                </div>
                                <h3 class="course-title">破解牛市密碼：2025 投資幣圈三大黃金準則</h3>
                                <div class="course-rating">
                                    <span class="text-secondary"><i class="fa-solid fa-calendar-days"></i> 2025-02-15（六）下午 2 點</span>
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
        </div>


    </section>

    <!-- 專欄作家 -->
    <div style="width:100vw;background-color: rgba(231, 233, 235, 0.5);">
        <section class="instructors-section pt-5" style="margin-left: auto;margin-right: auto;">
            <h2 class="instructors-title"><span style="color: #3461fd;">專欄作家</span></h2>
            <p class="instructors-description">
                您可以在鏈習生網站自由的探索每一位專業幣圈作家文章
            </p>

            <div class="container my-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="instructor-card">
                            <div class="instructor-content">
                                <img src="./img/author1.jpg" alt="Jacob Jones" class="instructor-image">
                                <div class="instructor-info">
                                    <h3 class="instructor-name">Jacob Jones</h3>
                                    <p class="instructor-specialty">UI-UX Design Expert</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="instructor-card">
                            <div class="instructor-content">
                                <img src="./img/author2.jpg" alt="Emily Smith" class="instructor-image">
                                <div class="instructor-info">
                                    <h3 class="instructor-name">Emily Smith</h3>
                                    <p class="instructor-specialty">Blockchain Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="instructor-card">
                            <div class="instructor-content">
                                <img src="./img/author3.jpg" alt="Michael Brown" class="instructor-image">
                                <div class="instructor-info">
                                    <h3 class="instructor-name">Michael Brown</h3>
                                    <p class="instructor-specialty">DeFi & Crypto Analyst</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="instructor-card">
                            <div class="instructor-content">
                                <img src="./img/author4.jpg" alt="Sophia White" class="instructor-image">
                                <div class="instructor-info">
                                    <h3 class="instructor-name">Sophia White</h3>
                                    <p class="instructor-specialty">NFT & Web3 Strategist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <!-- 學員反饋 -->
    <section class="courses-section block ">
        <h2 class="courses-title"><span style="color: #3461fd;">學員反饋</span></h2>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".feedback-swiper", {
                loop: true,
                slidesPerView: 3, // 一次顯示 3 張回饋
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
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1, // 每次顯示 1 個
                spaceBetween: 20, // 卡片間距
                loop: true, // 無限循環滑動
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2, // 平板顯示 2 個
                    },
                    1024: {
                        slidesPerView: 3, // 桌機顯示 3 個
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