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
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/loading.css">
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

    <div class="container-fluid">
        <div class="row">
            <!-- 左側英雄區塊 -->
            <div class="col-lg-6 p-0">
                <div class="hero-section p-5 d-flex flex-column justify-content-center">
                    <h1 class="display-4 fw-bold mb-3">精品大師線上課程平台</h1>
                    <p class="lead">專業講師 X 精實影音課程，你最聰明的學習選擇</p>
                </div>
            </div>

            <!-- 右側表單區塊 -->
            <div class="col-lg-6 auth-section">
                <div class="w-100 px-4 px-lg-5">
                    <!-- 登入表單 -->
                    <form id="loginForm">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="h3 fw-bold mb-0">登入</h2>
                            <a href="#" class="text-decoration-none" onclick="toggleForms(event)">還不是會員嗎？註冊</a>
                        </div>

                        <div class="mb-4">
                            <!-- 電子信箱輸入框 -->
                            <input type="email" name="email" class="form-control form-control-lg mb-3" placeholder="電子信箱" required>

                            <!-- 密碼輸入框 -->
                            <div class="position-relative">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="密碼" required>
                                <span class="password-toggle">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">記住我的帳號密碼</label>
                            </div>
                            <a href="#" class="text-decoration-none">忘記密碼</a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 mb-4">登入</button>
                    </form>

                    <!-- 註冊表單 -->
                    <form id="registerForm">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="h3 fw-bold mb-0">註冊</h2>
                            <a href="#" class="text-decoration-none" onclick="toggleForms(event)">已經有帳號了嗎？登入</a>
                        </div>

                        <div class="mb-4">
                            <!-- 電子信箱輸入框 -->
                            <div class="input-group mb-3">
                                <input type="email" id="emailInput" class="form-control form-control-lg" placeholder="電子信箱" required>
                                <button type="button" id="sendCodeBtn" class="btn btn-secondary">寄送驗證碼</button>
                            </div>

                            <!-- 驗證碼輸入框 -->
                            <div class="position-relative mb-3">
                                <input type="text" id="verificationCodeInput" class="form-control form-control-lg" placeholder="輸入驗證碼" required>
                            </div>

                            <!-- 密碼輸入框 -->
                            <div class="position-relative mb-3">
                                <input type="password" id="passwordInput" class="form-control form-control-lg" placeholder="密碼" required>
                            </div>

                            <!-- 再次輸入密碼 -->
                            <div class="position-relative mb-3">
                                <input type="password" id="confirmPasswordInput" class="form-control form-control-lg" placeholder="再次輸入密碼" required>
                            </div>

                            <!-- 推薦碼輸入框（選填） -->
                            <div class="position-relative">
                                <input type="text" id="referralCodeInput" class="form-control form-control-lg" placeholder="推薦碼">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 mb-4">立即註冊</button>
                    </form>


                    <!-- 社群登入區塊 -->
                    <div class="text-center">
                        <p class="text-muted mb-4" id="socialText">或使用快速登入</p>
                        <div class="d-flex justify-content-center">
                            <button class="social-login-btn">
                                <img src="https://www.google.com/favicon.ico" alt="Google">
                            </button>
                            <button class="social-login-btn">
                                <img src="https://www.facebook.com/favicon.ico" alt="Facebook">
                            </button>
                            <button class="social-login-btn">
                                <img src="https://github.com/favicon.ico" alt="GitHub">
                            </button>
                        </div>
                        <p class="mt-4 text-muted small">
                            註冊即表示同意 <a href="#" class="text-decoration-none">使用者條款</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/login.js"></script>

</body>
<footer>
    <?php include('./footer.php'); ?>
</footer>

</html>