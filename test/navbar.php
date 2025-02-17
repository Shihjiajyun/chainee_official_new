<style>
    /* 設定導覽列背景顏色 */
    .navbar {
        background-color:rgb(56, 107, 185);
        padding: 12px 0px;
    }

    .navbar .container {
        padding: 0%;
        margin-left: 60px !important;
    }

    /* LOGO 調整 */
    .navbar-brand img {
        height: 80px;
    }

    /* 導覽列連結樣式 */
    .navbar-nav .nav-link {
        font-size: 18px;
        font-weight: 900;
        color: white !important;
        padding: 14px 24px;
        /* 增加間距 */
        transition: 0.3s;
    }

    /* 滑鼠懸停變色 */
    .navbar-nav .nav-link:hover {
        color: #ffc107 !important;
    }

    /* 下拉選單樣式 */
    .dropdown-menu {
        background-color: white;
        border-radius: 8px;
        border: none;
    }

    .dropdown-item {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        padding: 10px 15px;
        transition: 0.3s;
    }

    .dropdown-item:hover {
        background-color: #f3f3f3;
        color: #2572e4;
    }

    /* 登入/註冊按鈕樣式 */
    .login-btn {
        font-size: 18px;
        font-weight: 900;
        color: white !important;
        background: none;
        border: 2px solid white;
        padding: 8px 16px;
        border-radius: 30px;
        transition: 0.3s;
        margin-left: auto;
    }

    /* 登入/註冊按鈕懸停效果 */
    .login-btn:hover {
        background: white;
        color: #2572e4 !important;
    }

    /* 漢堡選單按鈕（手機版） */
    .navbar-toggler {
        border: none;
        color: white;
    }

    .navbar-toggler-icon {
        filter: invert(1);
    }

    /* RWD 調整 */
    @media (max-width: 991px) {
        .navbar-collapse {
            background-color: #2572e4;
            padding: 10px;
            text-align: center;
        }

        .navbar-nav {
            width: 100%;
        }

        .nav-item {
            padding: 8px 0;
        }

        .login-btn {
            width: 100%;
        }
    }

    .navbar-toggler-icon {
        filter: invert(1) brightness(200%);
        width: 30px;
        height: 30px;
    }

    .navbar-toggler {
        border: none;
        padding: 10px;
    }

    /* 讓 .dropdown 在 hover 時展開 */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        /* 防止位移 */
    }

    /* 預設下拉選單隱藏 */
    .dropdown-menu {
        display: block;
        /* Bootstrap 需要手動控制 */
        opacity: 0;
        visibility: hidden;
        position: absolute;
        /* 讓選單浮動 */
        top: 100%;
        left: 0;
        transform: translateY(10px);
        /* 增加滑入效果 */
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
    }

    /* 修正 hover 選單在小螢幕時不自動展開 */
    @media (max-width: 992px) {
        .nav-item.dropdown:hover .dropdown-menu {
            display: none;
            /* 避免小螢幕 hover 就展開 */
        }

        .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: none;
            position: static;
        }
    }
</style>

<!-- 導覽列 -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand" href="index.php">
            <img src="./img/logo.png" alt="Chainee Logo">
        </a>

        <!-- 漢堡選單按鈕（手機版） -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fas fa-bars"></i> <!-- FontAwesome 漢堡圖示 -->
        </button>

        <!-- 導覽列選單 -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="index.php">首頁</a></li>
                <li class="nav-item"><a class="nav-link" href="#">鏈金術基地</a></li>
                <li class="nav-item"><a class="nav-link" href="#">新手成長地圖</a></li>
                <li class="nav-item"><a class="nav-link" href="#">公開講座</a></li>
                <li class="nav-item"><a class="nav-link" href="#">線上課程</a></li>

                <!-- 幣圈知識庫（下拉選單） -->
                <!-- 幣圈知識庫（自動展開的下拉選單） -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="knowledgeDropdown" role="button">
                        幣圈知識庫
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="knowledgeDropdown">
                        <li><a class="dropdown-item" href="./learn_crypto.php">學幣圈</a></li>
                        <li><a class="dropdown-item" href="./learn-investing.php">學投資</a></li>
                        <li><a class="dropdown-item" href="./open-accounts.php">學開戶</a></li>
                        <li><a class="dropdown-item" href="./find-deals.php">撿好康</a></li>
                        <li><a class="dropdown-item" href="./columnists.php">專欄作家</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="#">線上小幫手</a></li>
            </ul>

            <!-- 登入/註冊按鈕 -->
            <a href="#" class="btn login-btn"><i class="fas fa-user"></i> 登入/註冊</a>
        </div>
    </div>
</nav>