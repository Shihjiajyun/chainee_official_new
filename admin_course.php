<?php
session_start();

// 從外部檔案讀取允許的 user_id
$allowed_users = file('./allowed_users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 檢查目前用戶是否登入，以及是否在允許列表中
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_id'], $allowed_users)) {
    // 如果用戶未登入或不在允許列表中，跳轉到登入頁面
    header('Location: login.php');
    exit();
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
            <div class="mb-3">
                <label for="course_name" class="form-label">課程名稱</label>
                <input type="text" class="form-control" id="course_name" name="course_name" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="course_price" class="form-label">課程價格</label>
                <input type="number" class="form-control" id="course_price" name="course_price" step="0.01" min="0" required>
            </div>

            <div class="mb-3">
                <label for="course_image" class="form-label">課程圖片</label>
                <input type="file" class="form-control" id="course_image" name="course_image" accept="image/*" required>
                <!-- 預覽區域 -->
                <div class="mt-3">
                    <img id="preview_image" src="#" alt="課程圖片預覽" style="max-width: 100%; display: none; border: 1px solid #ddd; padding: 5px; border-radius: 5px;" />
                </div>
            </div>

            <div class="mb-3">
                <label for="course_description" class="form-label">課程描述</label>
                <textarea class="form-control" id="course_description" name="course_description" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">開始日期時間</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">課程時長（小時）</label>
                <input type="number" class="form-control" id="duration" name="duration" min="1" required>
            </div>

            <div class="mb-3">
                <label for="units" class="form-label">課程單元數量</label>
                <input type="number" class="form-control" id="units" name="units" min="1" required>
            </div>

            <div class="mb-3">
                <label for="course_summary" class="form-label">課程摘要</label>
                <textarea class="form-control" id="course_summary" name="course_summary" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">儲存變更</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('course_image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview_image');

            if (file) {
                // 檢查文件是否為圖片
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
    </script>

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