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
    // 创建新主題，所有字段为空
    $topic = [
        'title' => '',
        'creator' => '',
        'description' => '',
        'main_visual' => '',
        'outline' => '',
        'long_image' => '',
        'last_updated' => ''
    ];
} else {
    // 編輯現有主題，查詢資料庫
    $query = "SELECT title, creator, description, main_visual, outline, long_image, last_updated, price FROM subscription WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $topic = $result->fetch_assoc();
    } else {
        die('找不到該主題資料');
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯訂閱專欄簡介</title>
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
        <h1 class="mb-4">編輯主題資訊</h1>
        <form action="php/upload_subscription.php" method="POST" enctype="multipart/form-data">
            <!-- 隱藏欄位，用於提交主題 ID -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <!-- 主題名稱 -->
            <div class="mb-3">
                <label for="title" class="form-label">主題名稱</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="255" value="<?php echo htmlspecialchars($topic['title']); ?>" required>
            </div>

            <!-- 價格 -->
            <div class="mb-3">
                <label for="price" class="form-label">價格 (NT$)</label>
                <input type="number" class="form-control" id="price" name="price" step="1" min="0"
                    value="<?php echo isset($topic['price']) ? htmlspecialchars($topic['price']) : '0'; ?>" required>
            </div>

            <!-- 創作者 -->
            <div class="mb-3">
                <label for="creator" class="form-label">創作者</label>
                <input type="text" class="form-control" id="creator" name="creator" maxlength="255" value="<?php echo htmlspecialchars($topic['creator']); ?>" required>
            </div>

            <!-- 主題圖片 -->
            <div class="mb-3">
                <label for="main_visual" class="form-label">主題封面圖</label>
                <input type="file" class="form-control" id="main_visual" name="main_visual" accept="image/*" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="preview_image" src="<?php echo htmlspecialchars($topic['main_visual'] ?: './img/placeholder.jpg'); ?>" alt="主題封面預覽" style="max-width: 100%; border: 1px solid #ddd; padding: 5px; border-radius: 5px;" />
                </div>
            </div>

            <!-- 主題描述 -->
            <div class="mb-3">
                <label for="description" class="form-label">主題描述</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?php echo htmlspecialchars($topic['description']); ?></textarea>
            </div>

            <!-- 主題大綱 -->
            <div class="mb-3">
                <label for="outline" class="form-label">主題大綱</label>
                <textarea class="form-control" id="outline" name="outline" rows="3"><?php echo htmlspecialchars($topic['outline']); ?></textarea>
            </div>

            <!-- 長圖 -->
            <div class="mb-3">
                <label for="long_image" class="form-label">主題長圖</label>
                <input type="file" class="form-control" id="long_image" name="long_image" accept="image/*" onchange="previewIntroImage(event)">
                <div class="mt-3">
                    <img id="preview_intro_image" src="<?php echo htmlspecialchars($topic['long_image'] ?: './img/placeholder.jpg'); ?>" alt="主題長圖預覽" style="max-width: 100%; border: 1px solid #ddd; padding: 5px; border-radius: 5px;" />
                </div>
            </div>

            <!-- 最後更新時間 -->
            <div class="mb-3">
                <label class="form-label">最後更新時間</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars(date('Y-m-d H:i:s', strtotime($topic['last_updated']))); ?>" readonly>
            </div>

            <button type="submit" class="btn btn-primary">儲存變更</button>
            <a class="btn btn-secondary" href="./admin_topics.php">返回</a>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- 預覽圖片 -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview_image').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewIntroImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview_intro_image').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
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