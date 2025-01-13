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
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="./img/logo.png" alt="Logo" style="height: 80px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">探索</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">企業方案</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">App下載</a>
                </li>
            </ul>
            <div class="d-flex pb-3">
                <a href="login.php" class="btn btn-outline-info me-2">登入</a>
                <a href="#" class="btn btn-info">註冊</a>
            </div>
        </div>
    </div>
</nav>