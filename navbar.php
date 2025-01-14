<style>
    .navbar img {
        object-fit: contain;
        /* 確保圖片保持比例 */
    }

    .navbar {
        padding: 0;
        /* 去掉多餘的 padding */
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
        font-weight: 900;
    }

    .navbar-nav {
        margin: 0 auto;
        /* 選單居中 */
    }

    .navbar .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* 垂直置中 */
        height: 100px;
        /* 設置固定高度，確保內容可以正確對齊 */
    }

    .logo {
        height: 80px;
        /* 控制 logo 的高度 */
        object-fit: contain;
    }

    .nav-links {
        display: flex;
        gap: 2rem;
        list-style: none;
        margin: 0;
        /* 確保沒有額外的外邊距干擾 */
        padding: 0;
        align-items: center;
        /* 垂直置中內部項目 */
    }

    .nav-links a {
        text-decoration: none;
        color: #333;
        display: flex;
        align-items: center;
        /* 確保文字與容器對齊 */
    }

    .auth-buttons {
        display: flex;
        gap: 1rem;
        align-items: center;
        /* 垂直置中按鈕 */
    }

    .auth-buttons .btn {
        padding: 0.5rem 1rem;
        text-align: center;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        /* 讓次級選單水平排列 */
        margin-top: -0.125rem;
        margin-left: 0.1rem;
        border-radius: 0.25rem;
    }

    /* 搜尋彈出框樣式 */
    .search-overlay {
        display: none;
        /* 預設隱藏 */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        z-index: 1050;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .search-container {
        max-width: 600px;
        width: 90%;
        text-align: center;
    }

    .btn-close {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .hot-keywords span {
        font-size: 16px;
        margin-right: 8px;
    }

    /* 調整放大鏡圖示樣式 */
    #desktop-search-btn i,
    #mobile-search-btn i {
        font-weight: 900;
        /* 加粗圖示 */
        font-size: 1.2em;
        /* 圖示背景顏色 */
        color: #333;
        /* 圖示顏色 */
    }

    /* 移除按鈕框線並調整樣式 */
    #desktop-search-btn,
    #mobile-search-btn {
        border: none;
        /* 移除框線 */
        background-color: transparent;
        /* 預設背景透明 */
        padding: 8px;
        /* 增加內距讓按鈕更舒適 */
        transition: all 0.3s ease;
        /* 添加平滑過渡效果 */
    }

    /* 滑鼠懸停效果 */
    #desktop-search-btn:hover,
    #mobile-search-btn:hover {
        background-color: rgb(166, 193, 233);
        /* 滑鼠懸停背景顏色 */
        /* color: white; */
        /* 滑鼠懸停文字顏色 */
    }

    @media screen and (max-width: 991.8px) {
        #desktop-search-btn {
            display: none;
        }
    }

    /* 下拉菜單初始隱藏 */
    .nav-item.dropdown .dropdown-menu {
        display: none;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease-in-out;
    }

    /* 滑鼠懸停顯示下拉菜單 */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    /* 下拉內容對齊 */
    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        margin: 0;
        padding: 0.5rem 0;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="./index.php">
            <img src="./img/logo.png" alt="Logo" style="height: 80px;">
        </a>

        <!-- 小螢幕時的漢堡選單與搜尋圖示 -->
        <div class="d-lg-none d-flex">
            <!-- 大螢幕的搜尋按鈕 -->
            <button class="btn me-2" id="mobile-search-btn">
                <i class="fas fa-search"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- 導覽列內容 -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- 導覽項目 -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" target="_blank" href="https://chainee.io/courses/public-course">公開講座</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./course_classification.php">線上課程</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./subscription_classification.php">訂閱專欄</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="knowledge.php" id="knowledgeDropdown" role="button">
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
                <li class="nav-item">
                    <a class="nav-link" href="#">幣種分析</a>
                </li>
            </ul>

            <!-- 大螢幕的搜尋按鈕 -->
            <button class="btn me-2" id="desktop-search-btn">
                <i class="fas fa-search"></i>
            </button>

            <!-- 登入與註冊 -->
            <div class="d-flex mb-2">
                <a href="login.php" class="btn btn-outline-info me-2">登入</a>
                <a href="login.php" class="btn btn-info">註冊</a>
            </div>
        </div>
    </div>
</nav>

<!-- 搜尋彈出框 -->
<div class="search-overlay" id="searchOverlay">
    <div class="search-container">
        <button class="btn-close" id="closeSearch"></button>
        <h5>想找什麼嗎？</h5>
        <form>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="請輸入你想在知識衛星搜尋的內容">
            </div>
        </form>
        <div class="hot-keywords mt-3">
            <span>熱門關鍵字：</span>
            <button class="btn btn-dark btn-sm">腦哥</button>
            <button class="btn btn-dark btn-sm">區塊鏈</button>
            <button class="btn btn-dark btn-sm">USDT</button>
            <button class="btn btn-dark btn-sm">加密貨幣</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const searchOverlay = document.getElementById("searchOverlay");
        const desktopSearchBtn = document.getElementById("desktop-search-btn");
        const mobileSearchBtn = document.getElementById("mobile-search-btn");
        const closeSearchBtn = document.getElementById("closeSearch");

        // 開啟搜尋框
        desktopSearchBtn?.addEventListener("click", () => {
            searchOverlay.style.display = "flex";
        });

        mobileSearchBtn?.addEventListener("click", () => {
            searchOverlay.style.display = "flex";
        });

        // 關閉搜尋框
        closeSearchBtn?.addEventListener("click", () => {
            searchOverlay.style.display = "none";
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownLink = document.getElementById('knowledgeDropdown');

        // 監聽點擊事件
        dropdownLink.addEventListener('click', function(e) {
            // 確保點擊會跳轉到指定頁面
            window.location.href = dropdownLink.getAttribute('href');
        });
    });
</script>