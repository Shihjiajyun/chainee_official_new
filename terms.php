<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>使用條款</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-image: url('./img/login_logo.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
            position: relative;
            color: white;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .breadcrumb {
            background: transparent;
            padding: 1rem;
        }

        .breadcrumb-item a {
            color: #adb5bd;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #fff;
        }

        .content-section {
            background: white;
            margin-top: -50px;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            border-right: 1px solid #eee;
        }
    </style>
</head>

<body class="bg-light">
    <?php include './tools/chat.php' ?>
    <?php include './navbar.php' ?>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-overlay">
            <h1 class="display-4">使用條款</h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container">
        <div class="row content-section p-4">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <nav class="nav flex-column">
                    <a class="nav-link" href="#" onclick="showContent('terms1')">用戶交易條款</a>
                    <a class="nav-link" href="#" onclick="showContent('terms2')">使用條款</a>
                    <a class="nav-link" href="#" onclick="showContent('terms3')">個資授權聲明</a>
                    <a class="nav-link" href="#" onclick="showContent('terms4')">隱私政策</a>
                    <a class="nav-link" href="#" onclick="showContent('terms5')">退費辦法</a>
                    <a class="nav-link" href="#" onclick="showContent('terms6')">其他條款</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div id="terms1" class="content">
                    <h2 class="mb-4">用戶交易條款</h2>
                    <p>這是用戶交易條款的內容。</p>
                </div>

                <div id="terms2" class="content d-none">
                    <h2 class="mb-4">使用條款</h2>
                    <p>這是使用條款的內容。</p>
                </div>

                <div id="terms3" class="content d-none">
                    <h2 class="mb-4">個資授權聲明</h2>
                    <p>這是個資授權聲明的內容。</p>
                </div>

                <div id="terms4" class="content d-none">
                    <h2 class="mb-4">隱私政策</h2>
                    <p>這是隱私政策的內容。</p>
                </div>

                <div id="terms5" class="content d-none">
                    <h2 class="mb-4">退費辦法</h2>
                    <p>這是退費辦法的內容。</p>
                </div>

                <div id="terms6" class="content d-none">
                    <h2 class="mb-4">其他條款</h2>
                    <p>這是其他條款的內容。</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showContent(id) {
            // 隱藏所有內容
            document.querySelectorAll('.content').forEach(content => {
                content.classList.add('d-none');
            });

            // 顯示選中的內容
            document.getElementById(id).classList.remove('d-none');
        }
    </script>
</body>


</html>