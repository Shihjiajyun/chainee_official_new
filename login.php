<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入/註冊頁面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="css/loading.css">
    <link rel="stylesheet" href="css/test2.css">
</head>

<body>
    <?php include './navbar.php'; ?>

    <!-- Loading 遮罩和動畫 -->
    <div id="loadingOverlay" style="display: none;">
        <div class="loading-animation">
            <div class="loading-circle"></div>
            <p class="loading-text">正在處理，請稍候...</p>
        </div>
    </div>

    <div class="container" id="login">
        <!-- Login Form -->
        <div class="form-box login">
            <form action="#">
                <h1>登入</h1>
                <div class="input-box">
                    <input type="email" placeholder="電子郵件" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="密碼" required>
                    <!-- <i class='bx bxs-lock-alt'></i> -->
                    <i class='bx bxs-show toggle-password'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">忘記密碼？</a>
                </div>
                <button type="submit" class="btn front">登入</button>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="form-box register">
            <form action="#">
                <h1>註冊</h1>
                <div class="input-box email-box">
                    <input type="email" placeholder="電子郵件" required>
                    <i class='bx bxs-envelope'></i>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="驗證碼" required>
                    <i class='bx bxs-check-shield'></i>
                </div>
                <button type="button" class="verify-btn btn">收取驗證碼</button>

                <div class="input-box">
                    <input type="password" placeholder="密碼" required>
                    <!-- <i class='bx bxs-lock-alt'></i> -->
                    <i class='bx bxs-show toggle-password'></i>
                </div>

                <div class="input-box">
                    <input type="password" placeholder="確認密碼" required>
                    <!-- <i class='bx bxs-lock-alt'></i> -->
                    <i class='bx bxs-show toggle-password'></i>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="推薦碼(選填)" id="referral">
                    <i class='bx bxs-user'></i>
                    <!-- <span class="tooltip">If you have a referral code, enter it here.</span> -->
                </div>

                <button type="submit" class="btn front">註冊</button>
            </form>
        </div>

        <!-- Toggle Panels -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>您好，歡迎回來！</h1>
                <p>還沒有帳號嗎？</p>
                <button class="btn register-btn">註冊</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>歡迎回來！</h1>
                <p>已經有帳號了嗎？</p>
                <button class="btn login-btn">登入</button>
            </div>
        </div>
    </div>

    <script>
        const container = document.querySelector('.container');
        const registerBtn = document.querySelector('.register-btn');
        const loginBtn = document.querySelector('.login-btn');

        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
        })

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/login.js"></script>
    <script>
        document.querySelectorAll(".toggle-password").forEach(icon => {
            icon.addEventListener("click", function() {
                let input = this.previousElementSibling; // 找到對應的 input 欄位
                if (input.type === "password") {
                    input.type = "text";
                    this.classList.replace("bxs-show", "bxs-hide"); // 切換為隱藏圖標
                } else {
                    input.type = "password";
                    this.classList.replace("bxs-hide", "bxs-show"); // 切換為顯示圖標
                }
            });
        });
    </script>

</body>
<footer>
    <?php include('./footer.php'); ?>
</footer>

</html>