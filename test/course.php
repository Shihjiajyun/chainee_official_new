<?php
require __DIR__ . '/../php/db.php';

$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
$course = null;
$instructor = null;
$chapters = [];

if ($course_id > 0) {
    // 查詢課程基本信息
    $stmt = $mysqli->prepare("
        SELECT c.*, i.name as instructor_name, i.title as instructor_title, 
               i.experience, i.description as instructor_description, i.photo_url
        FROM courses c
        LEFT JOIN instructors i ON c.instructor = i.name
        WHERE c.id = ?
    ");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();

    if ($course) {
        $instructor = [
            'instructor_name' => $course['instructor_name'],
            'instructor_title' => $course['instructor_title'],
            'experience' => $course['experience'],
            'instructor_description' => $course['instructor_description'],
            'photo_url' => $course['photo_url']
        ];
    }
    $stmt->close();

    // 🔹 **查詢課程章節與單元**
    $stmt = $mysqli->prepare("
        SELECT ch.id AS chapter_id, ch.chapter_number, ch.title AS chapter_title, 
               u.unit_number, u.title AS unit_title
        FROM course_chapters ch
        LEFT JOIN course_units u ON ch.id = u.chapter_id
        WHERE ch.course_id = ?
        ORDER BY ch.chapter_number, u.unit_number
    ");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $chapter_id = $row['chapter_id'];

        // 🔹 **初始化章節陣列**
        if (!isset($chapters[$chapter_id])) {
            $chapters[$chapter_id] = [
                'title' => $row['chapter_title'],
                'units' => []
            ];
        }

        // 🔹 **如果有單元，加入陣列**
        if (!empty($row['unit_number']) && !empty($row['unit_title'])) {
            $chapters[$chapter_id]['units'][] = [
                'unit_number' => $row['unit_number'],
                'title' => $row['unit_title']
            ];
        }
    }

    $stmt->close();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course ? htmlspecialchars($course['course_name']) : "找不到課程"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/course.css">
</head>
<style>
    .course-info-item1 {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    /* ICON 樣式 */
    .course-info-icon1 {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-right: 15px;
        color: #fff;
    }

    /* 不同 ICON 的背景顏色 */
    .course-info-icon1 i {
        font-size: 22px;
    }

    /* 橘色圖示 */
    .course-info-icon1 {
        background-color: #ffb22d;
    }

    /* 藍色圖示 */
    .people-icon1 {
        background-color: #2572e4;
    }
</style>

<body>
    <?php if ($course): ?>
        <!-- 導覽列 -->
        <?php include 'navbar.php' ?>

        <!-- 回到頂部按鈕 -->
        <button id="scrollToTop" onclick="scrollToTop()">↑</button>

        <div class="course-container">
            <!-- 背景模糊 -->
            <div class="course-background"></div>

            <div class="container">
                <div class="row align-items-center">
                    <!-- 課程圖片區塊 -->
                    <div class="col-lg-6 col-12">
                        <div class="course-image">
                            <img src="<?php echo htmlspecialchars($course['course_image']); ?>" alt="課程封面">
                        </div>
                    </div>

                    <!-- 課程內容區塊 -->
                    <div class="col-lg-6 col-12">
                        <div class="course-content">
                            <h2 class="course-title">
                                <?php echo $course ? htmlspecialchars($course['course_name']) : "找不到課程"; ?>
                            </h2>
                            <h3>理論 x 策略 x 實戰</h3>
                            <div class="course-meta">
                                <span><i class="fas fa-user"></i> 18526 名學員</span>
                                <span><i class="fas fa-star"></i> 4.8 (11)</span>
                            </div>
                            <p class="course-description">
                                <?php echo $course ? htmlspecialchars($course['course_summary']) : "找不到課程"; ?>
                            </p>
                            <!-- <p class="course-description">
                            在華語加密貨幣教育圈，深耕多年的腦哥，將結合過去帶領上百萬學員的經驗，在 8 小時內，以化繁為簡的大白話，帶你從加密貨幣的趨勢，到懶人交易、長期實戰的基礎分析和風險認知，以各種面向了解加密貨幣投資。
                        </p> -->
                            <?php if (!empty($course['remarks'])): ?>
                                <p class="course-description-2">
                                    <?php echo $course ? htmlspecialchars($course['remarks']) : "找不到課程"; ?>
                                </p>
                            <?php else: ?>
                                <p class="course-description-2">
                                    <?php echo $course ? htmlspecialchars($course['remarks']) : ""; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4" id="introduce">
            <div class="row">
                <div class="col-lg-8 order-2 order-lg-1">

                    <!-- 固定導覽列 -->
                    <nav id="navTabsContainer" class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
                        <div class="container" style="margin-left: 0;">
                            <ul class="nav nav-tabs" id="navTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-content="info" href="#info">課程資訊</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-content="intro" href="#announcements">最新公告</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-content="intro" href="#intro">簡介</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-content="chapters" href="#chapters">課程大綱</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-content="comments" href="#instructor">講師介紹</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-content="qa" href="#qa">常見問題</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-content="reviews" href="#reviews">評價</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <!-- 內容區塊 -->
                    <div data-bs-spy="scroll" data-bs-target="#navTabsContainer" data-bs-offset="100" tabindex="0">
                        <div class="content-area">
                            <!-- 課程資訊 -->
                            <div class="content content-section pt-3" id="info">
                                <h5 class="mb-4">課程資訊</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="course-info-item">
                                            <div class="course-info-icon">
                                                <i class="far fa-calendar"></i>
                                            </div>
                                            <div>
                                                <div class="info-title">開課時間</div>
                                                <div class="info-text">
                                                    <?php echo $course ? htmlspecialchars($course['start_date']) : "找不到課程"; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course-info-item">
                                            <div class="course-info-icon">
                                                <i class="far fa-file-alt"></i>
                                            </div>
                                            <div>
                                                <div class="info-title">預計單元</div>
                                                <div class="info-text">
                                                    <?php echo $course ? htmlspecialchars($course['units']) : "找不到課程"; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course-info-item">
                                            <div class="course-info-icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div>
                                                <div class="info-title">課程學員</div>
                                                <div class="info-text">18526 人</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="course-info-item">
                                            <div class="course-info-icon">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div>
                                                <div class="info-title">預計時長</div>
                                                <div class="info-text">
                                                    <?php echo $course ? htmlspecialchars($course['duration']) : "找不到課程"; ?>小時
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course-info-item">
                                            <div class="course-info-icon">
                                                <i class="far fa-eye"></i>
                                            </div>
                                            <div>
                                                <div class="info-title">觀看期限</div>
                                                <div class="info-text">無限制</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- 課程說明 -->
                                <p class="mt-4">
                                    <?php echo nl2br(htmlspecialchars_decode($course['course_description'])); ?>
                                </p>

                                <!-- 影片區塊 -->
                                <?php if (!empty($course['video_url'])): ?>
                                    <div class="video-container mb-4">
                                        <iframe width="100%" height="315"
                                            src="<?php echo htmlspecialchars($course['video_url']); ?>"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                <?php endif; ?>

                            </div>

                            <!-- 最新公告 -->
                            <div class="content content-section" id="announcements">
                                <h5 class="mb-4">最新公告</h5>
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

                            <!-- 簡介 -->
                            <div class="content content-section" id="intro">
                                <h5 class="mb-4">簡介</h5>
                                <div class="container">
                                    <img src="<?php echo htmlspecialchars($course['course_intro_image']); ?>" alt="">
                                </div>
                            </div>

                            <!-- 課程大綱 -->
                            <div class="content content-section" id="chapters">
                                <h5 class="mb-4">課程大綱</h5>
                                <div class="accordion" id="chapterAccordion">
                                    <?php if (!empty($chapters)): ?>
                                        <?php foreach ($chapters as $chapter_id => $chapter): ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#chapter<?php echo $chapter_id; ?>">
                                                        <?php echo htmlspecialchars($chapter['title']); ?>
                                                    </button>
                                                </h2>
                                                <div id="chapter<?php echo $chapter_id; ?>" class="accordion-collapse collapse">
                                                    <div class="accordion-body">
                                                        <?php if (!empty($chapter['units'])): ?>
                                                            <ul>
                                                                <?php foreach ($chapter['units'] as $unit): ?>
                                                                    <li><?php echo htmlspecialchars($unit['unit_number'] . ' ' . $unit['title']); ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php else: ?>
                                                            <p>此章節尚無課程單元</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>尚無課程大綱</p>
                                    <?php endif; ?>
                                </div>


                            </div>

                            <!-- 講師介紹 -->
                            <div class="content content-section" id="instructor">
                                <h5 class="mb-4">講師介紹</h5>

                                <div class="row align-items-center">
                                    <?php if (
                                        filter_var($course['instructor'], FILTER_VALIDATE_URL) &&
                                        preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $course['instructor'])
                                    ): ?>
                                        <!-- 如果instructor欄位是圖片URL，顯示全寬圖片 -->
                                        <div class="col-12 text-center">
                                            <img src="<?php echo htmlspecialchars($course['instructor']); ?>" alt="講師介紹"
                                                class="img-fluid">
                                        </div>
                                    <?php else: ?>
                                        <!-- 原有的講師介紹版面 -->
                                        <div class="col-md-6 text-center">
                                            <?php if (!empty($instructor['photo_url'])): ?>
                                                <img src="<?php echo htmlspecialchars($instructor['photo_url']); ?>" alt="講師圖片"
                                                    class="instructor-img">
                                            <?php else: ?>
                                                <p>未提供講師圖片</p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="instructor-info">
                                                <h3 class="instructor-name">
                                                    <?php echo !empty($instructor['instructor_name']) ? htmlspecialchars($instructor['instructor_name']) : "未提供講師名稱"; ?>
                                                </h3>

                                                <p class="instructor-title">
                                                    <?php echo !empty($instructor['instructor_title']) ? htmlspecialchars($instructor['instructor_title']) : "未提供職稱"; ?>
                                                </p>

                                                <p class="instructor-description">
                                                    <?php echo !empty($instructor['experience']) ? nl2br(htmlspecialchars($instructor['experience'])) : "未提供經歷"; ?>
                                                </p>

                                                <ul class="instructor-highlights">
                                                    <?php
                                                    if (!empty($instructor['instructor_description'])) {
                                                        echo $instructor['instructor_description'];
                                                    } else {
                                                        echo "未提供詳細介紹";
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- 常見問題 -->
                            <div class="content content-section" id="qa">
                                <h5 class="mb-4">常見問題</h5>
                                <div class="accordion" id="faqAccordion">
                                    <!-- 問題 1 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#faq1" aria-expanded="true">
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
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq2">
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
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq3">
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
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq4">
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

                            <!-- 評價區 -->
                            <div class="content content-section" id="reviews">
                                <h5 class="mb-4">評價</h5>
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
                        </div>
                    </div>


                </div>

                <!-- 右側價格卡片 -->
                <div class="col-lg-4 order-1 order-lg-2" id="price">
                    <div class="price-card">
                        <!-- 課程圖片 -->
                        <div class="text-center mb-4">
                            <!-- 顯示課程圖片 -->
                            <img src="<?php echo htmlspecialchars($course['course_image']); ?>" alt="課程封面"
                                class="course-image img-fluid rounded mb-3">

                            <!-- 顯示價格 -->
                            <h3 class="price">
                                <span class="current-price">NT$
                                    <?php echo number_format($course['discounted_price']); ?></span>
                                <?php if (!empty($course['course_price']) && $course['course_price'] > 0): ?>
                                    <span class="original-price">NT$
                                        <?php echo number_format($course['course_price']); ?></span>
                                <?php endif; ?>
                            </h3>
                        </div>


                        <hr>

                        <!-- 活動折扣 -->
                        <div class="discount-container">
                            <div class="discount-label">活動折扣</div>
                            <div class="discount-text">2025/1/18 ~ 2025/02/20 限時 8 折優惠</div>
                        </div>

                        <hr>

                        <!-- 課程資訊 -->
                        <div class="payment-info-container">
                            <div class="payment-info-item">
                                <img src="./img/time_card.jpg" alt="觀看期限" class="payment-icon">
                                <div class="info-content">
                                    <span class="info-title payment-title">觀看期限</span>
                                    <span class="info-text">觀看次數無限制</span>
                                </div>
                            </div>

                            <div class="payment-info-item">
                                <img src="./img/card.jpg" alt="信用卡分期" class="payment-icon">
                                <div class="info-content">
                                    <span class="info-title payment-title">信用卡分期</span>
                                    <span class="info-text">分期（三期、六期）零利率方案 僅限：玉山、台新銀行信用卡</span>
                                </div>
                            </div>
                        </div>

                        <!-- 按鈕 -->
                        <div class="d-flex gap-2 mt-3">
                            <button class="buy-button">立即購買</button>
                            <!-- <button class="cart-button"><i class="fas fa-shopping-cart"></i></button> -->
                        </div>
                    </div>

                    <!-- 合購卡片 -->
                    <div class="bundle-card mt-4">
                        <h4 class="bundle-title">投資加密貨幣組合</h4>

                        <div class="bundle-items">
                            <div class="course-item">
                                <img src="https://chainee.io/wp-content/uploads/2025/02/%E5%85%8D%E8%B2%BB%E8%AC%9B%E5%BA%A7_1_0.jpg"
                                    alt="課程圖片" class="course-image">
                                <div class="course-info">
                                    <p class="course-name">認知升級篇 | 投資加密貨幣，懂這些就夠了</p>
                                    <p class="course-price">NT$ 799</p>
                                </div>
                            </div>

                            <div class="course-item">
                                <img src="https://chainee.io/wp-content/uploads/2025/02/%E5%85%8D%E8%B2%BB%E8%AC%9B%E5%BA%A7_3_0.jpg"
                                    alt="課程圖片" class="course-image">
                                <div class="course-info">
                                    <p class="course-name">投資獲利篇 | 投資加密貨幣，懂這些就夠了</p>
                                    <p class="course-price">NT$ 13,500</p>
                                </div>
                            </div>
                        </div>

                        <div class="bundle-footer">
                            <div class="bundle-price">
                                <span class="discount-price">NT$ 19,700</span>
                                <span class="original-price">NT$ 20,900</span>
                            </div>
                            <button class="add-to-cart">加入購物車</button>
                        </div>
                    </div>

                    <div class="bundle-card mt-4">
                        <h4 class="bundle-title">上班族想學投資</h4>

                        <div class="bundle-items">
                            <div class="course-item">
                                <img src="https://chainee.io/wp-content/uploads/2025/02/%E5%85%8D%E8%B2%BB%E8%AC%9B%E5%BA%A7_1_0.jpg"
                                    alt="課程圖片" class="course-image">
                                <div class="course-info">
                                    <p class="course-name">認知升級篇 | 投資加密貨幣，懂這些就夠了</p>
                                    <p class="course-price">NT$ 799</p>
                                </div>
                            </div>

                            <div class="course-item">
                                <img src="https://chainee.io/wp-content/uploads/2025/02/%E5%85%8D%E8%B2%BB%E8%AC%9B%E5%BA%A7_3_0.jpg"
                                    alt="課程圖片" class="course-image">
                                <div class="course-info">
                                    <p class="course-name">投資獲利篇 | 投資加密貨幣，懂這些就夠了</p>
                                    <p class="course-price">NT$ 13,500</p>
                                </div>
                            </div>
                        </div>

                        <div class="bundle-footer">
                            <div class="bundle-price">
                                <span class="discount-price">NT$ 19,700</span>
                                <span class="original-price">NT$ 20,900</span>
                            </div>
                            <button class="add-to-cart">加入購物車</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    <?php else: ?>
        <p>找不到該課程，請確認課程 ID 是否正確。</p>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const titles = document.querySelectorAll(".payment-title");
            let maxWidth = 0;

            // 找出最大的標題寬度
            titles.forEach(title => {
                let titleWidth = title.offsetWidth;
                if (titleWidth > maxWidth) {
                    maxWidth = titleWidth;
                }
            });

            // 設定所有標題為相同寬度
            titles.forEach(title => {
                title.style.width = maxWidth + "px";
            });
        });
    </script>

    <!-- 回到頂部邏輯 -->
    <script>
        const scrollBtn = document.getElementById("scrollToTop");

        // 監聽滾動事件，控制按鈕顯示
        window.addEventListener("scroll", function() {
            if (window.scrollY > 300) {
                scrollBtn.classList.add("show");
                scrollBtn.classList.remove("hide");
            } else {
                scrollBtn.classList.add("hide");
                setTimeout(() => scrollBtn.classList.remove("show"), 300);
            }
        });

        // 平滑滾動回頂部
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    </script>

</body>
<footer>
    <?php include './footer.php' ?>
</footer>

</html>