// 切換註冊、登入
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

// 註冊區塊
document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault(); // 阻止表單提交

    const email = document.getElementById('emailInput').value;
    const verificationCode = document.getElementById('verificationCodeInput').value;
    const password = document.getElementById('passwordInput').value;
    const confirmPassword = document.getElementById('confirmPasswordInput').value;

    // 檢查兩次密碼是否一致
    if (password !== confirmPassword) {
        alert('兩次輸入的密碼不一致');
        return;
    }

    // 檢查驗證碼是否正確
    const verifyCodeResponse = await fetch('php/verify_code.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ email, verificationCode }),
    });
    const verifyCodeResult = await verifyCodeResponse.json();

    if (verifyCodeResult.status !== 'success') {
        alert('驗證碼不正確或已過期');
        return;
    }

    // 提交註冊請求
    const registerResponse = await fetch('php/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
            email,
            password,
            referralCode: document.getElementById('referralCodeInput').value,
        }),
    });
    const registerResult = await registerResponse.json();

    if (registerResult.status === 'success') {
        alert('註冊成功');
        window.location.href = 'login.php';
    } else {
        alert(registerResult.message || '註冊失敗，請稍後再試');
    }
});

// 電子信箱檢查
document.getElementById('emailInput').addEventListener('blur', async function () {
    const email = this.value;

    if (!email) return;

    const response = await fetch('php/check_email.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ email }),
    });
    const result = await response.json();

    if (result.status === 'exists') {
        alert('該電子信箱已被註冊');
    }
});


// 登入區塊
document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    // 獲取表單輸入值
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;

    try {
        const response = await fetch('php/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({ email, password }),
        });

        const result = await response.json();
        if (result.status === 'success') {
            alert(result.message);
            window.location.href = 'index.php';
        } else {
            alert(result.message || '登入失敗，請稍後再試');
        }
    } catch (error) {
        console.error('發生錯誤:', error);
    }
});


// 寄送註冊驗證碼
document.getElementById('sendCodeBtn').addEventListener('click', async function () {
    const email = document.getElementById('emailInput').value;
    const sendCodeBtn = document.getElementById('sendCodeBtn');
    const loadingOverlay = document.getElementById('loadingOverlay');

    if (!email) {
        alert('請輸入電子信箱');
        return;
    }

    // 顯示 Loading 動畫，禁用按鈕
    loadingOverlay.style.display = 'flex';
    sendCodeBtn.disabled = true;

    try {
        const response = await fetch('php/send_verification_code.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({ email }),
        });

        const result = await response.json();
        if (result.status === 'success') {
            alert('驗證碼已成功寄送到您的電子信箱');
        } else {
            alert(result.message || '發送驗證碼失敗，請稍後再試');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('伺服器發生錯誤，請稍後再試');
    } finally {
        // 隱藏 Loading 動畫，啟用按鈕
        loadingOverlay.style.display = 'none';
        sendCodeBtn.disabled = false;
    }
});

