<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章內容</title>

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

        #article-container {
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div id="article-container">
        <h2>文章內容</h2>
        <div id="article-content">載入中...</div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const articleId = new URLSearchParams(window.location.search).get("article_id");
            if (!articleId) {
                document.getElementById("article-content").innerHTML = "<p>請提供有效的文章 ID</p>";
                return;
            }

            fetch(`php/fetch_article.php?article_id=${articleId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.html_content) {
                        document.getElementById("article-content").innerHTML = data.html_content;
                    } else {
                        document.getElementById("article-content").innerHTML = `<p>${data.message}</p>`;
                    }
                })
                .catch(error => {
                    console.error("錯誤:", error);
                    document.getElementById("article-content").innerHTML = "<p>載入文章失敗</p>";
                });
        });
    </script>

</body>
</html>
