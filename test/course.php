<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/course.css">
</head>
<style>
    .course-container {
        display: flex;
        height: calc(100vh - 200px);
        position: relative;
    }

    .course-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg') no-repeat center/cover;
        z-index: -1;
    }

    .course-background::before {
        content: "";
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background: inherit;
        filter: blur(10px) brightness(50%);
        z-index: -1;
    }


    .course-image {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .course-image img {
        max-width: 80%;
        max-height: 100%;
        object-fit: contain;
    }

    .course-content {
        width: 50%;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
    }

    .course-title {
        font-size: 32px;
        font-weight: bold;
    }

    .course-content h3 {
        margin-top: 10px;
        font-size: 20px;
        font-weight: bold;
    }

    .course-subtitle {
        color: #85d8ff;
        margin-top: 10px;
        font-size: 24px;
    }

    .course-meta {
        margin: 15px 0;
        display: flex;
        align-items: center;
        font-size: 18px;
    }

    .course-meta span {
        margin-right: 15px;
        display: flex;
        align-items: center;
    }

    .course-meta i {
        margin-right: 5px;
    }

    .course-description {
        font-size: 16px;
        margin-top: 15px;
        color: #ddd;
    }

    .course-description-2 {
        font-size: 16px;
        margin-top: 15px;
        color: #FFD700;
    }

    .course-badge {
        background-color: #2E9E9E;
        border-radius: 10px;
        padding: 10px 0px;
        font-size: 16px;
        font-weight: bold;
        display: inline-block;
        color: white;
        margin-bottom: 10px;
        max-width: 80px;
        text-align: center;
    }

    #navTabs .nav-item {
        padding: 0;
    }

    .price-card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .price-card .course-image {
        width: 100%;
        /* 確保圖片填滿容器 */
        /* max-width: 300px; */
        /* 限制最大寬度 */
        border-radius: 10px;
        /* 圓角設計 */
    }

    .price {
        display: flex;
        justify-content: center;
        align-items: baseline;
        gap: 10px;
        font-size: 24px;
        font-weight: bold;
    }

    .current-price {
        color: #f57c00;
        /* 橙色價格 */
    }

    .original-price {
        text-decoration: line-through;
        color: #888;
        /* 灰色刪除價格 */
        font-size: 18px;
    }

    .benefits {
        display: flex;
        flex-direction: column;
        gap: 8px;
        text-align: left;
        margin: 10px 0;
    }

    .icon {
        font-size: 20px;
        color: #555;
        margin-right: 8px;
    }

    .buy-button {
        background: #f57c00;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .cart-button {
        background: transparent;
        border: 1px solid #f57c00;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<body>
    <!-- 導覽列 -->
    <?php include 'navbar.php' ?>

    <div class="course-container">
        <div class="course-background"></div>
        <div class="course-image">
            <img src="https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg" alt="課程封面">
        </div>
        <div class="course-content">
            <p class="course-badge">新手</p>
            <h2 class="course-title">腦哥 | 投資加密貨幣，懂這些就夠了！從新手到穩健獲利的全方位幣圈攻略</h2>
            <h3>理論x 策略 x 實戰</h3>
            <div class="course-meta">
                <span><i class="fas fa-user"></i> 18526 名學員</span>
                <span><i class="fas fa-star"></i> 4.8 (11)</span>
            </div>
            <p class="course-description">
                乘上未來金融趨勢，投資加密貨幣並賺取超越傳統股市的報酬，任何人都可以在合規、安全的環境下，用四大面向挑選短中長期投資的幣種，並透過理財工具輕鬆地完成自動化，創建穩健的被動收入。
            </p>
            <p class="course-description">
                在華語加密貨幣教育圈，深耕多年的腦哥，將結合過去帶領上百萬學員的經驗，在 8 小時內，以化繁為簡的大白話，帶你從加密貨幣的趨勢，到懶人交易、長期實戰的基礎分析和風險認知，以各種面向了解加密貨幣投資。
            </p>
            <p class="course-description-2">
                * 課程內含「認知升級篇」、「操作實務篇」、「投資獲利篇」、「名人專訪篇」，以及未來購買新篇章 3 折優惠資格
            </p>
        </div>
    </div>

    <div class="container py-4" id="introduce">
        <div class="row">
            <div class="col-lg-8">
                <!-- 公告區 -->
                <div class="announcement-bar d-flex justify-content-between mb-4">
                    <div>
                        <span class="me-3">最新公告</span>
                        <span class="me-3">• 2023 線上互動工作坊 行前通知</span>
                        <span>• 腦哥的區塊鏈入門必修課</span>
                    </div>
                    <a href="#" class="text-decoration-none">查看</a>
                </div>

                <!-- 標籤導航 -->
                <ul class="nav nav-tabs mb-4" id="navTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-content="info" href="#">課程資訊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="intro" href="#">簡介</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="chapters" href="#">課程大綱</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="comments" href="#">講師介紹</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="qa" href="#">常見問題</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-content="reviews" href="#">評價</a>
                    </li>
                </ul>

                <div class="content-area">
                    <!-- 課程資訊 -->
                    <div class="content active" id="info">
                        <h5 class="mb-4">課程資訊</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="course-info-item">
                                    <div class="course-info-icon">
                                        <i class="far fa-calendar"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted">開課時間</div>
                                        <div>2021/10/20 16:00</div>
                                    </div>
                                </div>
                                <div class="course-info-item">
                                    <div class="course-info-icon">
                                        <i class="far fa-file-alt"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted">預計單元</div>
                                        <div>44 個</div>
                                    </div>
                                </div>
                                <div class="course-info-item">
                                    <div class="course-info-icon">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted">課程學員</div>
                                        <div>18526 人</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="course-info-item">
                                    <div class="course-info-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted">預計時長</div>
                                        <div>11 小時 14 分</div>
                                    </div>
                                </div>
                                <div class="course-info-item">
                                    <div class="course-info-icon">
                                        <i class="far fa-eye"></i>
                                    </div>
                                    <div>
                                        <div class="text-muted">觀看期限</div>
                                        <div>無限制</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 課程說明 -->
                        <p class="mt-4">
                            乘上未來金融趨勢，投資加密貨幣並賺取超越傳統股市的報酬，任何人都可以在合規、安全的環境下，用四大面向挑選短中長期投資的幣種，並透過理財工具輕鬆地完成自動化，創建穩健的被動收入。
                        </p>
                        <p class="mt-4">
                            在華語加密貨幣教育圈，深耕多年的腦哥，將結合過去帶領上百萬學員的經驗，在 8 小時內，以化繁為簡的大白話，帶你從加密貨幣的趨勢，到懶人交易、長期實戰的基礎分析和風險認知，以各種面向了解加密貨幣投資。
                        </p>

                        <!-- 影片區塊 -->
                        <div class="video-container mb-4">
                            <iframe
                                width="100%"
                                height="315"
                                src="https://www.youtube.com/embed/UVVcx4BHwB4"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>

                    </div>

                    <div class="content" id="intro">
                        <div class="container">
                            <img src="https://chainee.io/wp-content/uploads/2024/05/row-1-column-1.jpg" alt="">
                            <img src="https://chainee.io/wp-content/uploads/2024/05/row-3-column-1.jpg" alt="">
                            <img src="https://chainee.io/wp-content/uploads/2024/05/row-5-column-1.jpg" alt="">
                        </div>
                    </div>

                    <!-- 章節 -->
                    <div class="content" id="chapters">
                        <div class="accordion" id="chapterAccordion">
                            <!-- 第一章 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter1" aria-expanded="true">
                                        Chapter 1. 總論：漫談簡報
                                        <span class="chapter-info">共 4 個單元 | 42 分</span>
                                    </button>
                                </h2>
                                <div id="chapter1" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>1-1 簡報的起源與發展</li>
                                            <li>1-2 簡報的核心目的</li>
                                            <li>1-3 如何讓簡報更有影響力？</li>
                                            <li>1-4 實戰案例分享</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- 第二章 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chapter2">
                                        Chapter 2. Strategy：擬定簡報策略
                                        <span class="chapter-info">共 5 個單元 | 1 小時 21 分</span>
                                    </button>
                                </h2>
                                <div id="chapter2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>2-1 如何擬定簡報策略？關鍵四問 3WIH！</li>
                                            <li>2-2 Who are they? 不打沒把握的仗：了解聽眾，做好情蒐！</li>
                                            <li>2-3 How to impress? 讓對方認真聽：根據情資，擬定戰術打動對方！</li>
                                            <li>2-4 Why me? 策略的最根本關鍵：思索自己能提供什麼價值？</li>
                                            <li>2-5 What to get? 釐清最終目的，預先布局，才會發生！</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- 第三章 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chapter3">
                                        Chapter 3. Design：做好簡報設計
                                        <span class="chapter-info">共 10 個單元 | 2 小時 41 分</span>
                                    </button>
                                </h2>
                                <div id="chapter3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>3-1 簡報設計的基本原則</li>
                                            <li>3-2 圖片和文字的搭配技巧</li>
                                            <li>3-3 版面配置的設計概念</li>
                                            <li>3-4 顏色如何影響觀眾的感受？</li>
                                            <li>3-5 使用圖表提升視覺溝通效率</li>
                                            <!-- 其他單元... -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 常見問題 -->
                    <div class="content" id="qa">
                        <div class="accordion" id="faqAccordion">
                            <!-- 問題 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                                        Q1: 如何註冊帳號？
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show">
                                    <div class="accordion-body">
                                        註冊帳號很簡單，只需點擊首頁右上角的「註冊」按鈕，填寫個人資料，並完成驗證即可。
                                    </div>
                                </div>
                            </div>

                            <!-- 問題 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Q2: 如何重設密碼？
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        如果忘記密碼，請點擊「忘記密碼」連結，輸入註冊時使用的電子郵件地址，我們將發送重設密碼的連結到您的信箱。
                                    </div>
                                </div>
                            </div>

                            <!-- 問題 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Q3: 支援哪些付款方式？
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        我們支援信用卡、支付寶、微信支付以及銀行轉帳等多種付款方式，詳情請參考我們的付款頁面。
                                    </div>
                                </div>
                            </div>

                            <!-- 問題 4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        Q4: 如何聯繫客服？
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        您可以通過我們的「聯繫我們」頁面提交問題，或直接發送電子郵件至 support@example.com，我們的客服團隊將在24小時內回覆您。
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 留言區 -->
                    <div class="content" id="comments">
                        <div class="comment-section">
                            <!-- 提示登入 -->
                            <div class="login-prompt">
                                <a href="#" class="login-link">登入</a> 後才可留言發問喔！
                            </div>

                            <!-- 留言清單 -->
                            <div class="comment-list">
                                <!-- 留言 1 -->
                                <div class="comment">
                                    <div class="comment-header">
                                        <img src="./img/login_logo.jpg" alt="XXX" class="user-avatar">
                                        <div class="user-info">
                                            <span class="user-name">XXX</span>
                                            <span class="comment-date">2024/12/27 18:20:47</span>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        社會人士可以參加嗎？
                                    </div>
                                </div>

                                <!-- 留言 2 -->
                                <div class="comment">
                                    <div class="comment-header">
                                        <img src="./img/login_logo.jpg" alt="XXX" class="user-avatar">
                                        <div class="user-info">
                                            <span class="user-name">XXX</span>
                                            <span class="comment-date">2024/09/05 11:57:11</span>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        請問2024有線上互動坊的規劃嗎？
                                    </div>
                                </div>

                                <!-- 留言 3 -->
                                <div class="comment">
                                    <div class="comment-header">
                                        <img src="./img/login_logo.jpg" alt="XXX" class="user-avatar">
                                        <div class="user-info">
                                            <span class="user-name">XXX</span>
                                            <span class="comment-date">2023/03/25 23:58:33</span>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        是否能分享更多相關的課程內容？
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 評價區 -->
                    <div class="content" id="reviews">
                        <div class="review-section">
                            <!-- 評價 1 -->
                            <div class="review">
                                <div class="review-header">
                                    <img src="./img/login_logo.jpg" alt="用戶頭像" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">XXX</span>
                                        <span class="review-date">2021/12/21 10:00:14</span>
                                        <div class="user-rating">
                                            ★★★★★
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    因為工作關係選擇了葉老師的線上課程，學到很多簡報的技巧也改變了以前的我看待簡報能力的不足所在，收穫很多，也因為是線上課程彌補了工作行程上無法配合固定時段固定地點上課的缺憾。總而言之，葉老師的線上簡報課程真的太棒了。辛苦葉老師以及知識衛星的製作團隊！
                                </div>
                            </div>

                            <!-- 評價 2 -->
                            <div class="review">
                                <div class="review-header">
                                    <img src="./img/login_logo.jpg" alt="用戶頭像" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">XXX</span>
                                        <span class="review-date">2021/11/24 18:30:22</span>
                                        <div class="user-rating">
                                            ★★★★★
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    以為今年感恩節假期我應該一如往常的廢到天荒地老，但自從我打開了內成老師的簡報課後，居然迫不及待地讓我兩天就如同追魚缸遊戲一樣欲罷不能的追完了，而且還收穫滿滿！
                                    <br><br>
                                    原本只想說就是教教如何做簡報技巧提升自己，但沒想到整套課根本實做簡報、溝通、做人談判的最大重點：同理心和換位思考。
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- 公告區 -->
                    <div class="content" id="announcements">
                        <div class="announcement-section">
                            <!-- 公告 1 -->
                            <div class="announcement">
                                <div class="announcement-header">
                                    <span class="announcement-lock">🔒</span>
                                    <span class="announcement-type">會員限定</span>
                                </div>
                                <div class="announcement-body">
                                    <span class="announcement-icon">📍</span>
                                    <span class="announcement-title">2023 區塊鏈應用工作坊 行前通知</span>
                                    <span class="announcement-separator">|</span>
                                    <span class="announcement-instructor">腦哥的區塊鏈進階課程</span>
                                </div>
                                <div class="announcement-footer">
                                    <span class="announcement-date">2023/12/01 15:30</span>
                                </div>
                            </div>

                            <!-- 公告 2 -->
                            <div class="announcement">
                                <div class="announcement-header">
                                    <span class="announcement-lock">🔒</span>
                                    <span class="announcement-type">會員限定</span>
                                </div>
                                <div class="announcement-body">
                                    <span class="announcement-icon">📍</span>
                                    <span class="announcement-title">2023 智能合約基礎班 開始報名</span>
                                    <span class="announcement-separator">|</span>
                                    <span class="announcement-instructor">腦哥的區塊鏈進階課程</span>
                                </div>
                                <div class="announcement-footer">
                                    <span class="announcement-date">2023/11/20 10:00</span>
                                </div>
                            </div>

                            <!-- 公告 3 -->
                            <div class="announcement">
                                <div class="announcement-header">
                                    <span class="announcement-lock">🔒</span>
                                    <span class="announcement-type">會員限定</span>
                                </div>
                                <div class="announcement-body">
                                    <span class="announcement-icon">📍</span>
                                    <span class="announcement-title">2022 Web3 基礎培訓 行前通知</span>
                                    <span class="announcement-separator">|</span>
                                    <span class="announcement-instructor">腦哥的區塊鏈進階課程</span>
                                </div>
                                <div class="announcement-footer">
                                    <span class="announcement-date">2022/12/15 09:00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- 價格卡片 -->
            <div class="col-lg-4" id="price">
                <div class="price-card">
                    <!-- 課程圖片 -->
                    <div class="text-center mb-4">
                        <img src="https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg"
                            alt="課程封面"
                            class="course-image img-fluid rounded mb-3">
                        <h3 class="price">
                            <span class="current-price">NT$ 12,000</span>
                            <span class="original-price">NT$14,500</span>
                        </h3>
                    </div>

                    <!-- 課程資訊 -->
                    <div class="benefits">
                        <p><i class="fas fa-eye icon"></i> 觀看次數無限制</p>
                        <p><i class="fas fa-credit-card icon"></i> 分期 (三期、六期) 零利率方案僅限：玉山、台新銀行信用卡</p>
                    </div>

                    <!-- 按鈕 -->
                    <div class="d-flex gap-2">
                        <button class="buy-button">立即購買</button>
                        <button class="cart-button"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">

                <!-- 內容區塊 -->


            </div>

            <!-- 側邊欄 -->
            <div class="col-lg-4">
                <!-- 合購優惠區塊 -->
                <div class="bundle-section mb-4">
                    <div class="bundle-header">
                        <h5 class="text-center mb-0">合購優惠</h5>
                    </div>

                    <h6 class="mb-3">投資加密或閉</h6>

                    <div class="course-card">
                        <img src="./img/lesson2.jpg" alt="課程縮圖">
                        <div class="ms-3">
                            <h6 class="mb-2">認知升級篇 | 投資加密貨幣懂這些就夠了</h6>
                            <div class="original-price">NT$ 8,900</div>
                        </div>
                    </div>

                    <div class="course-card">
                        <img src="./img/lesson.jpg" alt="課程縮圖">
                        <div class="ms-3">
                            <h6 class="mb-2">投資獲利篇 | 投資加密貨幣懂這些就夠了</h6>
                            <div class="original-price">NT$ 12,000</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <div class="original-price">NT$ 20,900</div>
                            <div class="price">NT$ 19,700</div>
                        </div>
                        <button class="add-to-cart">加入購物車</button>
                    </div>
                </div>

                <!-- 其他合購區塊 -->
                <div class="bundle-section mb-4">
                    <div class="bundle-header">
                        <h5 class="text-center mb-0">上班族想學習投資</h5>
                    </div>

                    <div class="course-card">
                        <img src="./img/lesson1.jpg" alt="課程縮圖">
                        <div class="ms-3">
                            <h6 class="mb-2">投資獲利篇 | 投資加密貨幣懂這些就夠了</h6>
                            <div class="original-price">NT$ 12,000</div>
                        </div>
                    </div>

                    <div class="course-card">
                        <img src="./img/lesson1.jpg" alt="課程縮圖">
                        <div class="ms-3">
                            <h6 class="mb-2">投資獲利篇 | 投資加密貨幣懂這些就夠了</h6>
                            <div class="original-price">NT$ 12,000</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <div class="original-price">NT$ 24,000</div>
                            <div class="price">NT$ 23,300</div>
                        </div>
                        <button class="add-to-cart">加入購物車</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 切換內容 -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.nav-link');
            const contents = document.querySelectorAll('.content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));

                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Hide all content
                    contents.forEach(content => content.classList.remove('active'));

                    // Show corresponding content
                    const targetId = this.getAttribute('data-content');
                    const targetContent = document.getElementById(targetId);
                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });
        });
    </script>

</body>
<footer>
    <?php include './footer.php' ?>
</footer>

</html>