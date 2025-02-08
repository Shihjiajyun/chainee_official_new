<?php
require 'php/db.php'; // 連接資料庫

// 取得文章 ID
$article_id = isset($_GET['article_id']) ? $mysqli->real_escape_string($_GET['article_id']) : '';

if (!$article_id) {
    die("缺少 article_id 參數！");
}

// 取得文章資訊
$query = "SELECT title, preview_text, markdown_content, preview_image FROM subscriptions_articles WHERE article_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $article_id);
$stmt->execute();
$result = $stmt->get_result();
$article['markdown_content'] = str_replace("\r\n", "\n", $article['markdown_content']);

if ($result->num_rows == 0) {
    die("文章未找到！");
}

$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯文章</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Toast UI Editor -->
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css">
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

    <style>
        .preview-img {
            width: 20%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container mt-4">
        <h1 class="text-center">編輯文章</h1>

        <form id="edit-article-form" action="php/update_subscriptions_article.php" method="POST"
            enctype="multipart/form-data">
            <input type="hidden" name="article_id" value="<?= htmlspecialchars($article_id) ?>">

            <!-- 文章標題 -->
            <div class="mb-3">
                <label class="form-label">文章標題</label>
                <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($article['title']) ?>"
                    required>
            </div>

            <!-- 預覽文字 -->
            <div class="mb-3">
                <label class="form-label">文章預覽文字</label>
                <textarea class="form-control" name="preview_text" rows="3"
                    required><?= htmlspecialchars($article['preview_text']) ?></textarea>
            </div>

            <!-- 文章主要圖片 -->
            <div class="mb-3">
                <label class="form-label">文章預覽圖片</label><br>
                <input type="file" class="form-control" name="preview_image" accept="image/*"
                    onchange="previewImage(event)">
                <img src="<?= htmlspecialchars($article['preview_image'] ?: 'https://via.placeholder.com/300x180') ?>"
                    class="preview-img" id="preview-image">

            </div>

            <!-- Markdown 編輯器 -->
            <div class="mb-3">
                <label class="form-label">文章內容 (Markdown)</label>
                <div id="editor-container"></div>
                <textarea name="markdown_content" id="markdown-content"
                    style="display:none;"><?= htmlspecialchars($article['markdown_content']) ?></textarea>
            </div>

            <!-- 提交按鈕 -->
            <button type="submit" class="btn btn-success">儲存變更</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // 初始化 Markdown 編輯器
        const editor = new toastui.Editor({
            el: document.getElementById("editor-container"),
            height: "400px",
            initialEditType: "markdown",
            previewStyle: "vertical",
            initialValue: `<?= addslashes($article['markdown_content']) ?>`
        });


        // 提交表單前更新隱藏的 Markdown 文本
        document.getElementById("edit-article-form").addEventListener("submit", function() {
            document.getElementById("markdown-content").value = editor.getMarkdown();
        });

        // 預覽上傳圖片
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById("preview-image").src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>
<footer class="mt-3">
    <?php include 'footer.php' ?>
</footer>

</html>