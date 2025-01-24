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
    SELECT id, course_name, course_price, course_image, course_description, start_date, duration, units, course_summary
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

<body>
    <?php include 'navbar.php' ?>
    <div class="container mt-5">
        <h1 class="mb-4">課程資訊</h1>
        <?php if (!empty($courses)) : ?>
            <?php foreach ($courses as $course) : ?>
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo htmlspecialchars($course['course_image']); ?>" class="img-fluid rounded-start" alt="課程圖片">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlspecialchars($course['course_name']); ?></h2>
                                <p class="card-text"><strong>價格：</strong> NT$ <?php echo htmlspecialchars(number_format($course['course_price'], 2)); ?></p>
                                <p class="card-text"><strong>開始日期：</strong> <?php echo htmlspecialchars($course['start_date']); ?></p>
                                <p class="card-text"><strong>課程時長：</strong> <?php echo htmlspecialchars($course['duration']); ?> 天</p>
                                <p class="card-text"><strong>課程單元：</strong> <?php echo htmlspecialchars($course['units']); ?> 個單元</p>
                                <p class="card-text"><strong>課程摘要：</strong></p>
                                <p class="card-text"><?php echo nl2br(htmlspecialchars($course['course_summary'])); ?></p>

                                <h3 class="mt-4">課程描述</h3>
                                <p class="card-text"><?php echo nl2br(htmlspecialchars($course['course_description'])); ?></p>

                                <div class="mt-4">
                                    <a href="admin_course.php?id=<?php echo htmlspecialchars($course['id']); ?>" class="btn btn-primary">編輯課程</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>目前沒有課程資訊。</p>
        <?php endif; ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="mt-3">
    <?php include 'footer.php' ?>
</footer>

</html>