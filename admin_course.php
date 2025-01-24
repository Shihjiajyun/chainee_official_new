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

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : 0;

// 初始化字段数据
if ($id === 0) {
    // 创建新课程，所有字段为空
    $course = [
        'course_name' => '',
        'course_price' => '',
        'course_image' => '',
        'course_description' => '',
        'start_date' => '',
        'duration' => '',
        'units' => '',
        'course_summary' => ''
    ];
} else {
    // 编辑现有课程，查询数据库
    $query = "SELECT course_name,instructor, discounted_price, course_price, course_image, course_description, start_date, duration, units, course_summary, course_intro_image FROM courses WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
    } else {
        die('找不到該課程資料');
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯課程資訊</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php' ?>

    <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            資料已成功更新！
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeSuccessParam()"></button>
        </div>
    <?php endif; ?>

    <div class="container mt-5">
        <h1 class="mb-4">編輯課程資訊</h1>
        <form action="php/upload_course.php" method="POST" enctype="multipart/form-data">
            <!-- 隱藏欄位，用於提交課程 ID -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="mb-3">
                <label for="course_name" class="form-label">課程名稱</label>
                <input type="text" class="form-control" id="course_name" name="course_name" maxlength="255" value="<?php echo htmlspecialchars($course['course_name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="course_instructor" class="form-label">講師名稱</label>
                <input type="text" class="form-control" id="course_instructor" name="course_instructor" maxlength="255" value="<?php echo isset($course['instructor']) ? htmlspecialchars($course['instructor']) : ''; ?>" required>
            </div>

            <div class="mb-3">
                <label for="course_price" class="form-label">課程價格(原價)</label>
                <input type="number" class="form-control" id="course_price" name="course_price" step="0.01" min="0" value="<?php echo htmlspecialchars($course['course_price']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="discounted_price" class="form-label">打折後的價格</label>
                <input type="number" class="form-control" id="discounted_price" name="discounted_price" step="0.01" min="0" value="<?php echo isset($course['discounted_price']) ? htmlspecialchars($course['discounted_price']) : ''; ?>" required>
            </div>


            <div class="mb-3">
                <label for="course_image" class="form-label">課程圖片</label>
                <input type="file" class="form-control" id="course_image" name="course_image" accept="image/*" onchange="previewImage(event)">
                <!-- 預覽區域 -->
                <div class="mt-3">
                    <img id="preview_image" src="<?php echo htmlspecialchars($course['course_image']); ?>" alt="課程圖片預覽" style="max-width: 100%; border: 1px solid #ddd; padding: 5px; border-radius: 5px;" />
                </div>
            </div>

            <div class="mb-3">
                <label for="course_description" class="form-label">課程描述(詳細介紹，只會出現在課程介紹頁面)</label>
                <textarea class="form-control" id="course_description" name="course_description" rows="4"><?php echo htmlspecialchars($course['course_description']); ?></textarea>
            </div>


            <div class="mb-3">
                <label for="course_summary" class="form-label">課程摘要(簡短介紹，會出現在課程卡片上)</label>
                <textarea class="form-control" id="course_summary" name="course_summary" rows="3"><?php echo htmlspecialchars($course['course_summary']); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="course_intro_image" class="form-label">課程簡介長圖</label>
                <input type="file" class="form-control" id="course_intro_image" name="course_intro_image" accept="image/*" onchange="previewIntroImage(event)">
                <!-- 預覽區域 -->
                <div class="mt-3">
                    <img id="preview_intro_image" src="<?php echo isset($course['course_intro_image']) ? htmlspecialchars($course['course_intro_image']) : ''; ?>" alt="課程簡介長圖預覽" style="max-width: 100%; border: 1px solid #ddd; padding: 5px; border-radius: 5px;" />
                </div>
            </div>


            <div class="mb-3">
                <label for="start_date" class="form-label">開始日期時間</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($course['start_date']))); ?>" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">課程時長（小時）</label>
                <input type="number" class="form-control" id="duration" name="duration" min="1" value="<?php echo htmlspecialchars($course['duration']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="units" class="form-label">課程單元數量</label>
                <input type="number" class="form-control" id="units" name="units" min="1" value="<?php echo htmlspecialchars($course['units']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">儲存變更</button>
            <a class="btn btn-secondary" href="./admin_courses.php">返回</a>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- 預覽圖片 -->
    <script>
        function handleImagePreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result; // 設置預覽圖片的來源
                        preview.style.display = 'block'; // 顯示預覽區域
                    };
                    reader.readAsDataURL(file); // 讀取圖片文件
                } else {
                    preview.src = '#';
                    preview.style.display = 'none'; // 隱藏預覽區域
                }
            });
        }

        // 初始化預覽功能
        handleImagePreview('course_image', 'preview_image');
        handleImagePreview('course_intro_image', 'preview_intro_image');
    </script>

    <!-- 刪除網址 -->
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
<footer class="mt-5">
    <?php include 'footer.php' ?>
</footer>

</html>