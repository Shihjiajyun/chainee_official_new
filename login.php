<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入/註冊頁面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('./img/login_logo.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            min-height: 100vh;
        }

        .auth-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-color: white;
        }

        .social-login-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dee2e6;
            background: white;
            margin: 0 8px;
        }

        .social-login-btn img {
            width: 24px;
            height: 24px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }

        #registerForm {
            display: none;
        }
    </style>
</head>

<body>
    <?php include './navbar.php'; ?>
    
    <div class="container-fluid">
        <div class="row">
            <!-- 左側英雄區塊 -->
            <div class="col-lg-6 p-0">
                <div class="hero-section p-5 d-flex flex-column justify-content-end">
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
                            <div class="d-flex justify-content-between mb-2">
                                <span>電子信箱</span>
                            </div>
                            <input type="email" class="form-control form-control-lg mb-3" placeholder="電子信箱">

                            <div class="position-relative">
                                <input type="password" class="form-control form-control-lg" placeholder="密碼">
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
                            <div class="d-flex justify-content-between mb-2">
                                <span>電子信箱</span>
                                <span>手機號碼</span>
                            </div>
                            <input type="email" class="form-control form-control-lg mb-3" placeholder="電子信箱">

                            <div class="position-relative mb-3">
                                <input type="password" class="form-control form-control-lg" placeholder="密碼">
                                <span class="password-toggle">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>

                            <div class="position-relative">
                                <input type="password" class="form-control form-control-lg" placeholder="再次輸入密碼">
                                <span class="password-toggle">
                                    <i class="bi bi-eye"></i>
                                </span>
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
    <script>
        function toggleForms(e) {
            e.preventDefault();
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const socialText = document.getElementById('socialText');

            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                socialText.textContent = '或使用快速登入';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                socialText.textContent = '或使用快速註冊';
            }
        }
    </script>
</body>
<footer>
    <?php include('./footer.php'); ?>
</footer>

</html>