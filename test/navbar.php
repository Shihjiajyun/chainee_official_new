        <style>
            .navbar {
                background-color: #6c7dfb;
                /* 藍色背景 */
            }

            .navbar-brand {
                font-size: 30px;
                font-weight: 900;
            }

            .navbar-brand span:first-child {
                color: #ffc27a;
                /* 'C' 的顏色 */
            }

            .navbar-brand span:last-child {
                color: #fff;
                /* 'hainee' 的顏色 */
            }

            .nav-link {
                color: #fff !important;
                /* 導覽連結預設白色 */
                transition: 0.3s;
            }

            .nav-link.active,
            .nav-link:hover {
                color: #ffc27a !important;
                /* 滑鼠懸停 & active 狀態變色 */
            }

            .login-btn {
                color: white;
                background: none;
                border: none;
                font-size: 16px;
                transition: 0.3s;
            }

            .login-btn:hover {
                color: #ffc27a;
            }

            .nav-menu {
                align-self: stretch;
                display: flex;
                min-width: 240px;
                align-items: start;
                font-weight: 500;
                white-space: nowrap;
                justify-content: start;
                margin: auto 0;
            }

            @media (max-width: 991px) {
                .nav-menu {
                    max-width: 100%;
                    white-space: initial;
                }
            }

            .nav-item {
                border-radius: 8px;
                gap: 8px;
                padding: 12px 24px;
            }

            @media (max-width: 991px) {
                .nav-item {
                    white-space: initial;
                    padding: 0 20px;
                }
            }

            .nav-item-active {
                border-radius: 8px;
                gap: 8px;
                color: var(--Secondary-500, #ffc27a);
                font-weight: 600;
                padding: 12px 24px;
            }

            @media (max-width: 991px) {
                .nav-item-active {
                    white-space: initial;
                    padding: 0 20px;
                }
            }

            .user-actions {
                align-self: stretch;
                display: flex;
                min-width: 240px;
                align-items: start;
                justify-content: start;
                margin: auto 0;
            }

            .login-button {
                border-radius: 8px;
                display: flex;
                align-items: start;
                gap: 8px;
                font-weight: 500;
                white-space: nowrap;
                justify-content: start;
                padding: 12px 24px;
            }

            @media (max-width: 991px) {
                .login-button {
                    white-space: initial;
                    padding: 0 20px;
                }
            }

            .login-icon {
                aspect-ratio: 1;
                object-fit: contain;
                object-position: center;
                width: 24px;
            }

            .signup-button {
                border-radius: 100px;
                gap: 10px;
                font-weight: 400;
                padding: 12px 24px;
            }

            @media (max-width: 991px) {
                .signup-button {
                    padding: 0 20px;
                }
            }
        </style>

        <!-- 導覽列 -->
        <nav class="navbar navbar-expand-lg">
            <div class="container ">
                <!-- LOGO 使用文字 -->
                <a class="navbar-brand" href="#">
                    <span>C</span><span>hainee</span>
                </a>

                <!-- 漢堡選單按鈕 -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- 選單 -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">公開講座</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">線上課程</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="knowledge.php" id="knowledgeDropdown" role="button" data-bs-toggle="dropdown">
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
                            <a class="nav-link" href="#">線上小幫手</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-lock me-2"></i>登入/註冊</a>
                        </li>
                    </ul>
                </div>


            </div>
        </nav>