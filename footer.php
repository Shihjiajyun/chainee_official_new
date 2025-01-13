<div class="footer-container">
    <!-- Section 1: Logo & Description -->
    <div class="footer-logo-desc">
        <img src="./img/login_logo.jpg" alt="Logo" class="footer-logo">
        <p>您的網站描述或品牌標語，例如「致力於提供最優質的服務」。</p>
    </div>

    <!-- Section 2: Quick Links -->
    <div class="footer-links">
        <h4>快速連結</h4>
        <ul>
            <li><a href="/about">關於我們</a></li>
            <li><a href="/services">服務項目</a></li>
            <li><a href="/blog">部落格</a></li>
            <li><a href="/contact">聯絡我們</a></li>
        </ul>
    </div>

    <!-- Section 3: Contact Information -->
    <div class="footer-contact">
        <h4>聯絡資訊</h4>
        <p>Email: <a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></p>
        <p>電話: +886 123 456 789</p>
        <p>地址: 台北市某某區某某路123號</p>
    </div>

    <!-- Section 4: Social Media -->
    <div class="footer-social">
        <h4>追蹤我們</h4>
        <a href="https://facebook.com" target="_blank" aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://instagram.com" target="_blank" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://twitter.com" target="_blank" aria-label="Twitter">
            <i class="fab fa-twitter"></i>
        </a>
    </div>
</div>
<!-- Copyright -->
<div class="footer-bottom">
    <p>© 2025 您的公司名稱. 保留所有權利。</p>
</div>

<style>
    footer {
        background-color: #222;
        color: #fff;
        padding: 40px 20px;
        font-family: Arial, sans-serif;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-logo-desc {
        flex: 1;
        min-width: 200px;
    }

    .footer-logo {
        border-radius: 50%;
        width: 150px;
        margin-bottom: 10px;
    }

    .footer-links,
    .footer-contact,
    .footer-social {
        flex: 1;
        min-width: 200px;
    }

    .footer-links h4,
    .footer-contact h4,
    .footer-social h4 {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 5px;
    }

    .footer-links a,
    .footer-contact a,
    .footer-social a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-links a:hover,
    .footer-contact a:hover,
    .footer-social a:hover {
        color: #00bcd4;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        border-top: 1px solid #444;
        padding-top: 10px;
        font-size: 14px;
        color: #aaa;
    }

    .footer-social a {
        display: inline-flex;
        align-items: center;
        color: #fff;
        text-decoration: none;
        margin-right: 15px;
        font-size: 16px;
        transition: color 0.3s;
    }

    .footer-social a i {
        font-size: 20px;
        margin-right: 8px;
    }

    .footer-social a:hover {
        color: #00bcd4;
    }
</style>