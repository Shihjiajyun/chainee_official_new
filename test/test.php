<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>學習主頁</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --brand-color: #144a99;
        }

        h3 {
            color: rgb(0, 0, 0);
            font-size: 32px;
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        h3::after {
            content: "";
            display: block;
            width: 20%;
            height: 4px;
            background-color: #144a99;
            margin-top: 5px;
        }


        h5 {
            font-size: 24px;
            font-weight: 700;
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
        }

        .profile-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 4px 10px 0px #0000001A;
        }

        .points-title {
            color: #144a99;
            font-size: 14px;
            font-weight: bold;
        }

        .points-value {
            font-size: 32px;
            font-weight: bold;
            color: #144a99;
            margin: 5px 0;
        }

        .points-description {
            font-size: 12px;
            color: #888;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-icon {
            font-size: 14px;
            margin-right: 5px;
            color: #888;
        }

        .sidebar {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }

        .course-card {
            border-radius: 10px;
            overflow: hidden;
        }

        .btn-primary {
            background-color: var(--brand-color);
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 8px;
        }

        .btn_keep {
            background-color: #FAA010;
            font-size: 16px;
            font-weight: 700;
            color: white;
            border: none;
            /* padding: 10px 20px; */
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
        }

        .btn_keep:hover {
            background-color: #e08c0d;
            /* 懸停時加深顏色 */
            transform: translateY(-2px);
            /* 按鈕稍微上浮 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* 增加陰影提升立體感 */
        }

        .btn_keep:active {
            transform: translateY(0);
            /* 點擊時恢復 */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* 陰影縮小 */
        }


        .btn-primary:hover {
            background-color: #0f3b73;
        }

        .btn-warning {
            background-color: #ffcc00;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 8px;
        }

        .btn-warning:hover {
            background-color: #e6b800;
        }

        .nav-tabs .nav-link.active {
            background-color: var(--brand-color);
            color: white;
            border: none;
        }

        .nav-tabs .nav-link {
            color: var(--brand-color);
        }

        .nav-tabs .nav-link:hover {
            background-color: #d1dbe8;
        }

        .sidebar {
            background: white;
            border-radius: 12px;
        }

        .sidebar a {
            text-decoration: none;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            transition: background 0.3s ease-in-out;
            color: #144a99;
        }

        .sidebar a:hover {
            background: #f0f4f9;
            color: #144a99;
        }

        /* 進度條區塊 */
        .progress-container {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }

        /* 進度條文字 */
        .progress-text {
            font-size: 12px;
            color: #888;
        }

        /* 進度條 */
        .progress {
            flex-grow: 1;
            height: 8px;
            background: #f1f1f1;
            border-radius: 10px;
            overflow: hidden;
        }

        /* 進度條填充 */
        .progress-bar {
            height: 100%;
            background: #ffa600;
            transition: width 0.3s ease-in-out;
        }

        /* 進度數字 */
        .progress-percentage {
            font-size: 12px;
            color: #888;
        }


        /* *********************已報名的講座****************************** */
        #registered .more-link {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            margin-left: 8px;
        }

        #registered .more-link:hover {
            text-decoration: underline;
        }

        #registered .lecture-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            min-height: 100%;
        }

        #registered .lecture-card img {
            width: 100%;
            height: auto;
        }

        #registered .card-body {
            padding: 15px;
        }

        #registered .date {
            font-size: 14px;
            color: gray;
        }

        #registered .card-title {
            font-size: 16px;
            font-weight: bold;
            margin: 5px 0;
        }

        #registered .author {
            font-size: 14px;
            color: gray;
        }

        #registered .btn {
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 5px;
        }

        #registered .ended {
            position: relative;
            opacity: 0.7;
        }

        #registered .ended .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
        }

        /* **********已報名的幾座_結束********** */

        /* **********訂閱專欄********** */

        #subscriptions .view-more {
            font-size: 14px;
            color: #144a99;
            text-decoration: none;
        }

        #subscriptions .subscription-section {
            background: white;
            border-radius: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            /* 灰色邊框 */
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            /* 陰影效果 */
        }

        #subscriptions .subscription-img {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 10px;
        }

        #subscriptions .subscription-content {
            flex-grow: 1;
        }

        #subscriptions .article-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        #subscriptions .article-card:hover {
            transform: translateY(-5px);
        }

        #subscriptions .article-img {
            width: 100%;
            /* height: 180px; */
            object-fit: cover;
        }

        #subscriptions .article-content {
            padding: 15px;
        }

        #subscriptions .article-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        #subscriptions .author-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        #subscriptions .author-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        #subscriptions .author-name {
            font-size: 14px;
            font-weight: bold;
        }

        #subscriptions .article-summary {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }


        /* **********訂閱專欄_結束********** */
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container mt-5">
        <div class="row">
            <!-- 左側欄 -->
            <div class="col-md-4">
                <!-- 頭貼顯示卡片 -->
                <div class="profile-card shadow-sm px-0 pt-0 pb-2">
                    <!-- 背景圖 -->
                    <div class="profile-cover" style="background: url('https://chainee.io/wp-content/uploads/2024/03/%E5%8F%B3%E4%B8%8A-1024x683.jpg') center/cover; height: 80px; border-radius: 10px 10px 0 0; position: relative;"></div>

                    <!-- 頭像 -->
                    <div class="profile-avatar" style="position: relative; margin-top: -40px; text-align: center;">
                        <img src="./img/logo2.png" class="rounded-circle border border-white" alt="User Avatar" width="80" height="80">
                    </div>

                    <!-- 暱稱與Email -->
                    <h5 class="text-primary mt-2">你的暱稱123</h5>
                    <p class="text-muted">12345@gmail.com</p>

                    <!-- 按鈕 -->
                    <button class="btn btn-primary">
                        編輯個人專區 <i class="aw-pencil"></i>
                    </button>
                </div>

                <!-- 積分卡片 -->
                <div class="profile-card mt-3">
                    <div class="points-title">擁有積分</div>
                    <div class="points-value">9,999,999</div>
                    <div class="points-description">
                        <i class="fa-solid fa-circle-info info-icon"></i> 積分可以做什麼？
                    </div>
                </div>

                <!-- 左側導覽列 -->
                <div class="profile-card sidebar mt-3">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center fw-bold">
                                <i class="fa-solid fa-user me-2"></i> 個人頁面
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center fw-bold">
                                <i class="fa-solid fa-user-plus me-2"></i> 好友推薦
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center fw-bold">
                                <i class="fa-solid fa-star me-2"></i> 積分任務
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex align-items-center fw-bold">
                                <i class="fa-solid fa-file-invoice me-2"></i> 訂單記錄
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- 右側內容區 -->
            <div class="col-md-8">
                <h3 class="mb-3">學習主頁</h3>
                <ul class="nav nav-tabs" id="courseTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#purchased">已購課程</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#registered">已報名講座</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#subscriptions">訂閱專欄</a>
                    </li>
                </ul>

                <div class="tab-content mt-3">
                    <!-- 已購課程 -->
                    <div class="tab-pane fade show active" id="purchased">
                        <h5 class="mt-4">繼續學習</h5>
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card course-card shadow-sm">
                                    <!-- 課程圖片 -->
                                    <img src="./img/lesson.jpg" class="card-img-top" alt="課程圖片">

                                    <div class="card-body">
                                        <!-- 課程標題 -->
                                        <h6 class="card-title">新手折扣包 《投資加密貨幣，懂這些就夠了！》 — 二三四五六七八九十一...</h6>

                                        <!-- 進度條 -->
                                        <div class="progress-container">
                                            <div class="progress-text">課程進度</div>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="progress-percentage">10%</span>
                                        </div>

                                        <!-- 按鈕 -->
                                        <button class="btn btn_keep mt-3">繼續上課</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card course-card shadow-sm">
                                    <!-- 課程圖片 -->
                                    <img src="./img/lesson.jpg" class="card-img-top" alt="課程圖片">

                                    <div class="card-body">
                                        <!-- 課程標題 -->
                                        <h6 class="card-title">新手折扣包 《投資加密貨幣，懂這些就夠了！》 — 二三四五六七八九十一...</h6>

                                        <!-- 進度條 -->
                                        <div class="progress-container">
                                            <div class="progress-text">課程進度</div>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="progress-percentage">10%</span>
                                        </div>

                                        <!-- 按鈕 -->
                                        <button class="btn btn_keep mt-3">繼續上課</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card course-card shadow-sm">
                                    <!-- 課程圖片 -->
                                    <img src="./img/lesson.jpg" class="card-img-top" alt="課程圖片">

                                    <div class="card-body">
                                        <!-- 課程標題 -->
                                        <h6 class="card-title">新手折扣包 《投資加密貨幣，懂這些就夠了！》 — 二三四五六七八九十一...</h6>

                                        <!-- 進度條 -->
                                        <div class="progress-container">
                                            <div class="progress-text">課程進度</div>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="progress-percentage">10%</span>
                                        </div>

                                        <!-- 按鈕 -->
                                        <button class="btn btn_keep mt-3">繼續上課</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card course-card shadow-sm">
                                    <!-- 課程圖片 -->
                                    <img src="./img/lesson.jpg" class="card-img-top" alt="課程圖片">

                                    <div class="card-body">
                                        <!-- 課程標題 -->
                                        <h6 class="card-title">新手折扣包 《投資加密貨幣，懂這些就夠了！》 — 二三四五六七八九十一...</h6>

                                        <!-- 進度條 -->
                                        <div class="progress-container">
                                            <div class="progress-text">課程進度</div>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="progress-percentage">10%</span>
                                        </div>

                                        <!-- 按鈕 -->
                                        <button class="btn btn_keep mt-3">繼續上課</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-4">我的課程</h5>
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card course-card shadow-sm">
                                    <img src="./img/lesson2.jpg" class="card-img-top" alt="課程圖片">
                                    <div class="card-body">
                                        <h6 class="card-title">認知升級篇 | 投資加密貨幣，懂這些就夠了！</h6>
                                        <p class="card-text">75h | 1361學員</p>
                                        <button class="btn btn-primary">立即學習</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 已報名課堂 -->
                    <div class="tab-pane fade" id="registered">
                        <h5 class="mt-4">已報名講座</h5>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card lecture-card">
                                        <img src="./img/download.png" class="card-img-top" alt="講座圖片">
                                        <div class="card-body">
                                            <p class="date">2025-02-27 (一) 晚上7點</p>
                                            <h5 class="card-title">線上直播（給上班族的，帶圖繪健投資實戰）</h5>
                                            <p class="author">by MO哥</p>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-primary">已報名</button>
                                                <button class="btn btn-outline-danger">取消報名</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card lecture-card">
                                        <img src="https://chainee.io/wp-content/uploads/2024/03/%E5%B7%A6%E4%B8%8A-1024x683.jpg" class="card-img-top" alt="講座圖片">
                                        <div class="card-body">
                                            <p class="date">2025-6-18(三)</p>
                                            <h5 class="card-title">解密圖像故事力 | 精準定位脈圖趨勢作</h5>
                                            <p class="author">by MO哥</p>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-secondary" disabled>已額滿</button>
                                                <button class="btn btn-outline-danger">取消報名</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <h5 class="mt-4">已結束的講座</h5>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card lecture-card ended">
                                        <img src="https://chainee.io/wp-content/uploads/2024/04/DSC00821-1024x683.jpg" class="card-img-top" alt="講座圖片">
                                        <div class="overlay">
                                            <span>已結束</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">解密圖像故事力 | 精準定位脈圖趨勢作</h5>
                                            <p class="author">by MO哥</p>
                                            <button class="btn btn-secondary" disabled>已結束</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 訂閱專欄 -->
                    <div class="tab-pane fade" id="subscriptions">
                        <h5 class="mt-4">我的訂閱專欄</h5>
                        <div class="subscription-section mb-4">
                            <div class="d-flex align-items-start">
                                <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2024-08-16-at-08.43.57@2x-qxbzd0jmn0kih579bq4eydovmq3v9g2vs4xacq6kp6.png" class="subscription-img">
                                <div class="subscription-content">
                                    <h6 class="article-title">幣安超級賺幣 Super Earn 是什麼？怎麼玩？</h6>
                                    <p class="text-muted small">上次更新日期：2025-2-11</p>
                                    <button class="btn btn-outline-danger btn-sm">方案詳細內容</button>
                                    <button class="btn btn-outline-secondary btn-sm">取消訂閱</button>
                                </div>
                            </div>
                        </div>

                        <div class="latest-articles">
                            <h5 class="section-title">
                                最新文章 <a href="#" class="view-more">最近一個月的文章 ></a>
                            </h5>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="article-card">
                                        <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/CleanShot-2024-12-17-at-15.36.00@2x-qymqqbwc9l79q0er7h6z0ckwkjxr6s3ncsrdb60a6c.png" class="article-img">
                                        <div class="article-content">
                                            <h6 class="article-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h6>
                                            <div class="author-info">
                                                <img src="./img/logo2.png" class="author-img" alt="作者頭像">
                                                <span class="author-name">王小明</span>
                                            </div>
                                            <p class="article-summary">
                                                這篇文章將帶你了解不同類型的加密貨幣投資人，以及適合的投資策略...
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="article-card">
                                        <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/fraud9-scaled-1-qquwx00dwmnn8kezaunf7nvxfbr9rjmzxo5x45n9o6.jpg" class="article-img">
                                        <div class="article-content">
                                            <h6 class="article-title">2025 虛擬貨幣詐騙 7 大手法破解！被虛擬貨幣詐騙錢拿的回來嗎？</h6>
                                            <div class="author-info">
                                                <img src="./img/logo2.png" class="author-img" alt="作者頭像">
                                                <span class="author-name">張小白</span>
                                            </div>
                                            <p class="article-summary">
                                                近期詐騙手法層出不窮，本文整理 7 種最常見的虛擬貨幣詐騙方式...
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="article-card">
                                        <img src="https://chainee.io/wp-content/uploads/elementor/thumbs/BNGP4-scaled-1-qquugihcj3iwa2y503orzhqs8hwc5bco3p9dpeuhfa.jpg" class="article-img">
                                        <div class="article-content">
                                            <h6 class="article-title">2025 幣安詐騙 6 大手法、報案流程一次看！</h6>
                                            <div class="author-info">
                                                <img src="./img/logo2.png" class="author-img" alt="作者頭像">
                                                <span class="author-name">李小華</span>
                                            </div>
                                            <p class="article-summary">
                                                幣安詐騙事件頻傳，想知道如何預防與處理？這篇文章教你一步步應對...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="mt-5">
    <?php include 'footer.php' ?>
</footer>

</html>