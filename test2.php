<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/test2.css">
</head>

<body>
    <div class="container">
        <!-- Login Form -->
        <div class="form-box login">
            <form action="#">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="form-box register">
            <form action="#">
                <h1>Registration</h1>
                <div class="input-box email-box">
                    <input type="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <button type="button" class="verify-btn">Send Code</button>

                <div class="input-box">
                    <input type="text" placeholder="Verification Code" required>
                    <i class='bx bxs-check-shield'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Confirm Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Referral Code (Optional)" id="referral">
                    <i class='bx bxs-user'></i>
                    <span class="tooltip">If you have a referral code, enter it here.</span>
                </div>

                <button type="submit" class="btn">Register</button>
            </form>
        </div>

        <!-- Toggle Panels -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
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
</body>

</html>