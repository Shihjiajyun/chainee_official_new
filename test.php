<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markdown 編輯器</title>

    <!-- Toast UI Editor 相關資源 -->
    <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css">
    <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        #editor-container {
            width: 80%;
            height: 80vh;
            border: 1px solid #ddd;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="editor-container"></div>
    <button id="save-btn">儲存內容</button>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editor = new toastui.Editor({
                el: document.getElementById("editor-container"),
                height: "600px",
                initialEditType: "markdown",
                previewStyle: "vertical"
            });

            document.getElementById("save-btn").addEventListener("click", function() {
                const markdown = editor.getMarkdown();
                const html = editor.getHTML();
                const articleId = "example-123"; // 替換為實際文章 ID

                fetch("php/save_article.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            article_id: articleId,
                            markdown_content: markdown,
                            html_content: html
                        })
                    })
                    .then(response => response.json())
                    .then(data => alert(data.message))
                    .catch(error => console.error("錯誤:", error));
            });
        });
    </script>

</body>

</html>