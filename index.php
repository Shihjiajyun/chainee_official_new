<?php
session_start();
require 'php/db.php';


$query = "
    SELECT id, course_name, course_price, course_image, course_description, duration, discounted_price, instructor
    FROM courses
";
$result = $mysqli->query($query);

// 檢查是否有課程數據
$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row; // 將每個課程存入數組
    }
}
?>

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>
    <?php include './tools/chat.php' ?>

    <!-- 導覽列 -->
    <?php include './navbar.php'; ?>

    <!-- 主視覺2 -->
    <?php include './tools/main2.php'; ?>

    <!-- 幣圈初心者 -->
    <main class="main">
        <div class="container">
            <h1 class="section-title blue-underline">幣圈初心者</h1>
            <ul class="nav nav-pills" id="choose">
                <li class="nav-item">
                    <a class="nav-link active" href="#">全部課程</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">加密貨幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">比特幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">以太幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">虛擬貨幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">迷因幣</a>
                </li>
            </ul>
            <div class="grid">
                <?php if (!empty($courses)) : ?>
                    <?php foreach ($courses as $course) : ?>
                        <div class="course-card">
                            <a href="course.php?id=<?php echo htmlspecialchars($course['id']); ?>" class="card-link">
                                <div class="card-image">
                                    <img src="<?php echo htmlspecialchars($course['course_image'] ?: './img/placeholder.jpg'); ?>" alt="課程縮圖">
                                </div>
                                <div class="course-info p-3">

                                    <div class="d-flex align-items-center">
                                        <span class="badge-new me-auto">新手</span>
                                        <!-- 課程時間 & 瀏覽數 -->
                                        <div class="d-flex align-items-center watch_small text-muted">
                                            <img src="./img/schedule.png" alt="課程時間" class="icon-img">
                                            <span class="ms-1"><?php echo htmlspecialchars($course['duration']); ?> 小時</span>
                                            <img src="./img/watch.png" alt="觀看數" class="icon-img ms-3">
                                            <span class="ms-1">17504</span> <!-- 示例觀看數 -->
                                        </div>
                                    </div>

                                    <h5 class="fw-bold" style="margin-top:8px"><?php echo htmlspecialchars($course['course_name']); ?></h5>

                                    <!-- 講師名稱 -->
                                    <p class="text-secondary" style="margin-top:8px;margin-bottom:0px">by：<?php echo htmlspecialchars($course['instructor']); ?></p>

                                    <!-- 課程描述 -->
                                    <!-- <p class="course-description text-muted mt-2">
                                        <?php echo htmlspecialchars(mb_strimwidth($course['course_description'], 0, 100, '...')); ?>
                                    </p> -->

                                    <!-- 價格顯示 -->
                                    <div class="d-flex align-items-center" style="margin-top:8px">
                                        <?php if (!empty($course['discounted_price']) && $course['discounted_price'] < $course['course_price']) : ?>
                                            <span class="price">NT$<?php echo htmlspecialchars(number_format($course['discounted_price'])); ?></span>
                                            <span class="original-price">NT$<?php echo htmlspecialchars(number_format($course['course_price'])); ?></span>
                                        <?php else : ?>
                                            <span class="price2">NT$<?php echo htmlspecialchars(number_format($course['course_price'])); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>目前沒有可用課程。</p>
                <?php endif; ?>
            </div>

        </div>
    </main>

    <!-- 幣圈見習家 -->
    <main class="main p-0">
        <div class="container">
            <h1 class="section-title blue-underline">幣圈見習家</h1>
            <ul class="nav nav-pills" id="choose">
                <li class="nav-item">
                    <a class="nav-link active" href="#">全部課程</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">加密貨幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">比特幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">以太幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">虛擬貨幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">迷因幣</a>
                </li>
            </ul>
            <div class="grid">
                <?php if (!empty($courses)) : ?>
                    <?php foreach ($courses as $course) : ?>
                        <div class="course-card">
                            <a href="course.php?id=<?php echo htmlspecialchars($course['id']); ?>" class="card-link">
                                <div class="card-image">
                                    <img src="<?php echo htmlspecialchars($course['course_image'] ?: './img/placeholder.jpg'); ?>" alt="課程縮圖">
                                </div>
                                <div class="course-info p-3">

                                    <div class="d-flex align-items-center">
                                        <span class="badge-new me-auto">新手</span>
                                        <!-- 課程時間 & 瀏覽數 -->
                                        <div class="d-flex align-items-center watch_small text-muted">
                                            <img src="./img/schedule.png" alt="課程時間" class="icon-img">
                                            <span class="ms-1"><?php echo htmlspecialchars($course['duration']); ?> 小時</span>
                                            <img src="./img/watch.png" alt="觀看數" class="icon-img ms-3">
                                            <span class="ms-1">17504</span> <!-- 示例觀看數 -->
                                        </div>
                                    </div>

                                    <h5 class="fw-bold" style="margin-top:8px"><?php echo htmlspecialchars($course['course_name']); ?></h5>

                                    <!-- 講師名稱 -->
                                    <p class="text-secondary" style="margin-top:8px;margin-bottom:0px">by：<?php echo htmlspecialchars($course['instructor']); ?></p>

                                    <!-- 課程描述 -->
                                    <!-- <p class="course-description text-muted mt-2">
                                        <?php echo htmlspecialchars(mb_strimwidth($course['course_description'], 0, 100, '...')); ?>
                                    </p> -->

                                    <!-- 價格顯示 -->
                                    <div class="d-flex align-items-center" style="margin-top:8px">
                                        <?php if (!empty($course['discounted_price']) && $course['discounted_price'] < $course['course_price']) : ?>
                                            <span class="price">NT$<?php echo htmlspecialchars(number_format($course['discounted_price'])); ?></span>
                                            <span class="original-price">NT$<?php echo htmlspecialchars(number_format($course['course_price'])); ?></span>
                                        <?php else : ?>
                                            <span class="price2">NT$<?php echo htmlspecialchars(number_format($course['course_price'])); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>目前沒有可用課程。</p>
                <?php endif; ?>
            </div>

        </div>
    </main>

    <!-- 幣圈實戰冒險者 -->
    <main class="main">
        <div class="container">
            <h1 class="section-title blue-underline">幣圈實戰冒險者</h1>
            <ul class="nav nav-pills" id="choose">
                <li class="nav-item">
                    <a class="nav-link active" href="#">全部課程</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">加密貨幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">比特幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">以太幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">虛擬貨幣</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">迷因幣</a>
                </li>
            </ul>
            <div class="grid">
                <?php if (!empty($courses)) : ?>
                    <?php foreach ($courses as $course) : ?>
                        <div class="course-card">
                            <a href="course.php?id=<?php echo htmlspecialchars($course['id']); ?>" class="card-link">
                                <div class="card-image">
                                    <img src="<?php echo htmlspecialchars($course['course_image'] ?: './img/placeholder.jpg'); ?>" alt="課程縮圖">
                                </div>
                                <div class="course-info p-3">

                                    <div class="d-flex align-items-center">
                                        <span class="badge-new me-auto">新手</span>
                                        <!-- 課程時間 & 瀏覽數 -->
                                        <div class="d-flex align-items-center watch_small text-muted">
                                            <img src="./img/schedule.png" alt="課程時間" class="icon-img">
                                            <span class="ms-1"><?php echo htmlspecialchars($course['duration']); ?> 小時</span>
                                            <img src="./img/watch.png" alt="觀看數" class="icon-img ms-3">
                                            <span class="ms-1">17504</span> <!-- 示例觀看數 -->
                                        </div>
                                    </div>

                                    <h5 class="fw-bold" style="margin-top:8px"><?php echo htmlspecialchars($course['course_name']); ?></h5>

                                    <!-- 講師名稱 -->
                                    <p class="text-secondary" style="margin-top:8px;margin-bottom:0px">by：<?php echo htmlspecialchars($course['instructor']); ?></p>

                                    <!-- 課程描述 -->
                                    <!-- <p class="course-description text-muted mt-2">
                                        <?php echo htmlspecialchars(mb_strimwidth($course['course_description'], 0, 100, '...')); ?>
                                    </p> -->

                                    <!-- 價格顯示 -->
                                    <div class="d-flex align-items-center" style="margin-top:8px">
                                        <?php if (!empty($course['discounted_price']) && $course['discounted_price'] < $course['course_price']) : ?>
                                            <span class="price">NT$<?php echo htmlspecialchars(number_format($course['discounted_price'])); ?></span>
                                            <span class="original-price">NT$<?php echo htmlspecialchars(number_format($course['course_price'])); ?></span>
                                        <?php else : ?>
                                            <span class="price2">NT$<?php echo htmlspecialchars(number_format($course['course_price'])); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>目前沒有可用課程。</p>
                <?php endif; ?>
            </div>

        </div>
    </main>

    <!-- 專欄作家 -->
    <div class="container">
        <div class="row">
            <!-- 專欄作家 -->
            <div class="col-lg-6 mb-5">
                <h2 class="mb-4 blue-underline">專欄作家</h2>

                <!-- Swiper 主容器 -->
                <div class="swiper-container">
                    <!-- Swiper 主容器 -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="./img/author.png" alt="Avatar">
                                <p class="author-name text-center">作者 1</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/author.png" alt="Avatar">
                                <p class="author-name text-center">作者 2</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/author.png" alt="Avatar">
                                <p class="author-name text-center">作者 3</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/author.png" alt="Avatar">
                                <p class="author-name text-center">作者 4</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/author.png" alt="Avatar">
                                <p class="author-name text-center">作者 5</p>
                            </div>
                            <div class="swiper-slide">
                                <img src="./img/author.png" alt="Avatar">
                                <p class="author-name text-center">作者 6</p>
                            </div>
                        </div>
                    </div>

                    <!-- 自訂左右切換按鈕 -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-prev custom-prev"></div>
                        <div class="swiper-button-next custom-next"></div>
                    </div>
                </div>

                <?php
                $recommendedArticles = [
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => '鏈習生',
                        'author' => '鏈習生'
                    ],
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => '鏈習生',
                        'author' => 'RE:LAB'
                    ],
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => '鏈習生',
                        'author' => '鏈習生'
                    ],
                    [
                        'image' => './img/lesson1.jpg',
                        'title' => '鏈習生',
                        'author' => '鏈習生'
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
                        'title' => '鏈習生',
                        'author' => '鏈習生'
                    ],
                    [
                        'date' => '2022/05/18',
                        'category' => '文章',
                        'title' => '鏈習生',
                        'author' => '鏈習生'
                    ],
                    [
                        'date' => '2022/05/17',
                        'category' => '文章',
                        'title' => '鏈習生',
                        'author' => '鏈習生'
                    ],
                    [
                        'date' => '2022/05/16',
                        'category' => '文章',
                        'title' => '鏈習生',
                        'author' => '鏈習生'
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
                    <p class="mb-3">鏈習生</p>
                    <ul class="list-unstyled">
                        <li>學習是一趟沒有終點的飛行</li>
                        <li>建立知鏈習生，跨越時空和地域的限制</li>
                        <li>直接向各領域的頂尖大師學習</li>
                        <li>探索知識並拓展更多的興趣</li>
                        <li>透過有感的學習，造就生活的改變</li>
                        <li>接近更理想的自己</li>
                    </ul>
                    <p class="mt-4">鏈習生線上課｜各領域大師開課首選<br><strong>Your smart learning choice</strong></p>
                    <a href="#" class="btn btn-dark mt-3">了解更多</a>
                </div>

                <!-- 右邊圖片區塊 -->
                <div class="col-md-6 text-center mt-2">
                    <img src="./img/login_logo.jpg" alt="衛星圖像" class="rounded" style="height: 40%;max-height:400px">
                </div>
            </div>
        </div>
    </section>

    <!-- 學員推薦 -->
    <?php include('./tools/students_back.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            /* 一次顯示4張 */
            spaceBetween: 20,
            /* 圖片間距 */
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            loop: true,
            /* 無限循環 */
        });
    </script>
</body>
<footer>
    <?php include('./footer.php'); ?>
</footer>

</html>