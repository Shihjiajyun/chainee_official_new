<?php
session_start();
require 'php/db.php'; // 引入資料庫連接

// 從外部檔案讀取允許的 user_id
$allowed_users = file('./allowed_users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 檢查目前用戶是否登入，以及是否在允許列表中
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_id'], $allowed_users)) {
    // 如果用戶未登入或不在允許列表中，跳轉到登入頁面
    header('Location: login.php');
    exit();
}

$query = "
    SELECT id,discounted_price,instructor, course_name, course_price, course_image, course_description, start_date, duration, units, course_summary
    FROM courses
";
$result = $mysqli->query($query);

// 確保有課程數據
$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row; // 將每個課程資料存入數組
    }
}

// 如果需要進一步處理某些字段的默認值
foreach ($courses as &$course) {
    $course['course_image'] = $course['course_image'] ?: 'https://via.placeholder.com/300x200'; // 默認圖片
    $course['course_description'] = $course['course_description'] ?? '無描述';
    $course['course_summary'] = $course['course_summary'] ?? '無摘要';
}
unset($course); // 解引用，避免後續意外修改
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課程資訊</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<style>
    .main {
        padding: 3rem 0;
    }

    .section-title {
        font-size: 1.5rem;
        margin-bottom: 2rem;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .card-link {
        text-decoration: none;
        /* 去掉下劃線 */
        color: inherit;
        /* 保持文字顏色 */
        display: block;
        /* 確保整個卡片範圍可點擊 */
    }

    .card {
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
    }

    .card-image {
        position: relative;
        height: 200px;
        background: #f5f5f5;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease, filter 0.3s ease;
        /* 添加平滑過渡效果 */
    }

    .card-image:hover img {
        transform: scale(1.1);
        /* 放大圖片 */
        filter: brightness(1.1);
        /* 增加亮度，可選 */
    }

    .card-image .btn-primary {
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        background: #0066ff;
        color: white;
    }

    .card-content {
        padding: 1rem;
    }

    .card-title {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .card-author {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .card-price {
        color: #0066ff;
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-meta {
        display: flex;
        gap: 1rem;
        color: #666;
        font-size: 0.8rem;
    }
</style>

<body>
    <?php include 'navbar.php' ?>

    <?php if (isset($_GET['success']) && $_GET['success'] === 'created'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            課程已成功新增！
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeSuccessParam()"></button>
        </div>
    <?php endif; ?>

    <main class="main container mt-5">
        <div class="container">
            <div class="grid">
                <?php if (!empty($courses)) : ?>
                    <?php foreach ($courses as $course) : ?>
                        <div class="card">
                            <a href="admin_course.php?id=<?php echo htmlspecialchars($course['id']); ?>" class="card-link">
                                <div class="card-image">
                                    <img src="<?php echo htmlspecialchars($course['course_image'] ?: './img/placeholder.jpg'); ?>" alt="課程縮圖">
                                </div>
                                <div class="card-content">
                                    <div class="mt-4">
                                        <a href="admin_course.php?id=<?php echo htmlspecialchars($course['id']); ?>" class="btn btn-primary">編輯課程</a>
                                    </div>
                                    <h3 class="card-title mt-3"><?php echo htmlspecialchars($course['course_name']); ?></h3>

                                    <!-- 講師名稱 -->
                                    <p class="card-instructor text-secondary mt-1">講師：<?php echo htmlspecialchars($course['instructor']); ?></p>

                                    <!-- 價格對比 -->
                                    <?php if (!empty($course['discounted_price']) && $course['discounted_price'] < $course['course_price']) : ?>
                                        <div class="card-price-group">
                                            <p class="card-price text-danger font-weight-bold">
                                                折扣價：NT$ <?php echo htmlspecialchars(number_format($course['discounted_price'])); ?>
                                            </p>
                                            <p class="card-price text-muted text-decoration-line-through">
                                                原價：NT$ <?php echo htmlspecialchars(number_format($course['course_price'])); ?>
                                            </p>
                                        </div>
                                    <?php else : ?>
                                        <p class="card-price">NT$ <?php echo htmlspecialchars(number_format($course['course_price'])); ?></p>
                                    <?php endif; ?>

                                    <p class="card-description">
                                        <?php echo htmlspecialchars(mb_strimwidth($course['course_description'], 0, 100, '...')); ?>
                                    </p>
                                    <div class="card-meta">
                                        <span><?php echo htmlspecialchars($course['duration']); ?> 小時</span>
                                        <span>17504 人</span> <!-- 示例數據 -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                <?php else : ?>
                    <p>目前沒有可用課程。</p>
                <?php endif; ?>
            </div>
            <a class="btn btn-warning mt-3" href="admin_course.php?id=0 ">新增課程</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function removeSuccessParam() {
            // 获取当前的 URL
            const url = new URL(window.location.href);

            // 删除 success 参数
            url.searchParams.delete('success');
            url.searchParams.delete('error');

            // 更新地址栏中的 URL (不会刷新页面)
            window.history.replaceState({}, document.title, url.toString());
        }
    </script>
</body>
<footer class="mt-3">
    <?php include 'footer.php' ?>
</footer>

</html>