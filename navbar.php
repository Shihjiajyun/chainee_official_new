<style>
    .navbar img {
        object-fit: contain; /* 確保圖片保持比例 */
    }

    .navbar {
        padding: 0; /* 去掉多餘的 padding */
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar .container {
        display: flex;
        justify-content: space-between;
        align-items: center; /* 垂直置中 */
        height: 100px; /* 設置固定高度，確保內容可以正確對齊 */
    }

    .logo {
        height: 80px; /* 控制 logo 的高度 */
    }

    .nav-links {
        display: flex;
        gap: 2rem;
        list-style: none;
        margin: 0; /* 確保沒有額外的外邊距干擾 */
        padding: 0;
        align-items: center; /* 垂直置中內部項目 */
    }

    .nav-links a {
        text-decoration: none;
        color: #333;
        display: flex;
        align-items: center; /* 確保文字與容器對齊 */
    }

    .auth-buttons {
        display: flex;
        gap: 1rem;
        align-items: center; /* 垂直置中按鈕 */
    }

    .auth-buttons .btn {
        padding: 0.5rem 1rem;
        text-align: center;
    }
</style>

<nav class="navbar">
    <div class="container">
        <a href="./index.php">
            <img src="./img/logo.png" alt="Chainee Logo" class="logo">
        </a>
        <ul class="nav-links">
            <li><a href="#">探索</a></li>
            <li><a href="#">企業方案</a></li>
            <li><a href="#">App下載</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="login.php" class="btn btn-outline">登入</a>
            <a href="#" class="btn btn-dark">註冊</a>
        </div>
    </div>
</nav>