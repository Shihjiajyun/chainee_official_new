<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>認識幣圈新手</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="./css/introduce.css">
</head>
<style>
    .feature-box {
        display: flex;
        align-items: center;
        background: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 15px;
        transition: all 0.3s ease-in-out;
    }

    .feature-box:hover {
        background: #e9ecef;
    }

    .feature-box i {
        font-size: 2rem;
        color: #00262b;
        margin-right: 15px;
    }

    .feature-text h4 {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .feature-text p {
        margin-top: 11px;
    }

    .section-title {
        color: #00262b;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 36px;
        line-height: 42px;
    }

    .section-subtitle {
        color: #00262b;
        font-size: 18px;
        line-height: 24px;
        margin-bottom: 30px;
    }

    .introduce p {
        color: #454545;
        line-height: 28px;
        font-size: 18px;
    }

    .filter-btn {
        border: none;
        background: #f8f9fa;
        padding: 10px 15px;
        border-radius: 20px;
        margin: 5px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: #204e37;
        color: #fff;
    }

    .course-card {
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        overflow: hidden;
    }

    .course-card img {
        /* width: 100%; */
        border-radius: 8px;
        /* margin-bottom: 10px; */
    }

    .badge-custom {
        background: #6c757d;
        color: white;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 0.85rem;
    }
</style>
<style>
    .course-card {
        position: relative;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s;
    }

    .course-card:hover {
        transform: translateY(-5px);
    }

    .course-image {
        width: 100%;
        /* height: 160px; */
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .course-content {
        padding: 16px;
    }

    .university-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: white;
        padding: 8px;
        border-radius: 5px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
    }

    .university-badge img {
        height: 24px;
        margin-right: 8px;
    }

    .course-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .course-provider {
        font-size: 14px;
        color: #666;
    }

    .course-badge {
        display: inline-block;
        background: #eee;
        color: #333;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 12px;
        margin-top: 10px;
        font-weight: bold;
    }
</style>

<body>
    <?php include 'navbar.php' ?>
    <div class="min-vh-100">
        <!-- 主視覺 -->
        <div class="bg-dark-green text-white py-5">
            <div class="container">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-white text-decoration-none">首頁</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            幣圈初心者
                        </li>
                    </ol>
                </nav>

                <!-- Hero Content -->
                <h1 class="display-2 fw-bold mb-4">認識鏈習生</h1>
                <p class="lead mb-5">
                    鏈習生是一個針對區塊鏈學習者的專案，旨在幫助你從零開始了解區塊鏈技術，學習智能合約開發，並探索 Web3 世界的無限可能。
                </p>

                <!-- Action Buttons -->
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#" class="btn btn-outline-light">瀏覽加密貨幣課程</a>
                    <a href="#" class="btn btn-outline-light">加密貨幣職涯發展</a>
                    <a href="#" class="btn btn-light text-dark">建立帳戶</a>
                </div>
            </div>
        </div>

        <!-- 成為鏈習生獲得三個東西 -->
        <div class="container my-5">
            <h2 class="section-title">成為鏈習生之後，你可以獲得的三個東西</h2>
            <p class="section-subtitle">了解加密貨幣的世界，獲取更多機會</p>

            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-coins icons"></i>
                        <div class="feature-text">
                            <h4>被動收入機會</h4>
                            <p>透過質押（Staking）、DeFi、流動性挖礦等方式賺取額外收益。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-lightbulb icons"></i>
                        <div class="feature-text">
                            <h4>金融與技術知識</h4>
                            <p>學習區塊鏈、NFT、智能合約等核心概念，提升你的競爭力。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-handshake icons"></i>
                        <div class="feature-text">
                            <h4>更多合作與社群</h4>
                            <p>參與幣圈社群，找到志同道合的夥伴，一起探索新機會。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 什麼是鏈習生 -->
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 introduce">
                    <h2 class="h3 mb-4" style="color: #00262b;font-weight:900;">什麼是鏈習生？</h2>
                    <p>
                        鏈習生是一個專注於區塊鏈學習與實作的培訓計畫，旨在幫助學習者從基礎概念到實際應用，全面掌握區塊鏈技術。無論你是剛接觸區塊鏈的新手，還是想深入學習智能合約開發與 Web3 技術的開發者，都能在鏈習生找到適合的學習內容與實作機會。
                    </p>
                    <p class="">
                        在這個計畫中，我們提供系統化的學習資源，涵蓋區塊鏈基礎、去中心化應用（DApp）開發、智能合約設計、安全性原則等核心技術。同時，我們強調動手實作，讓學員透過模擬交易、鏈上數據分析、智能合約部署等挑戰，累積實戰經驗，將學習成果轉化為可展示的作品。
                    </p>
                    <p>鏈習生不僅是一個學習平台，更是一個連結區塊鏈產業與學習者的橋樑。我們透過社群互動、業界導師指導、專案合作等方式，幫助學員與業界建立聯繫，拓展未來的職涯與發展機會。</p>

                </div>
                <div class="col-lg-6">
                    <img
                        src="./img/leadership.png"
                        alt="加密貨幣學習示意圖"
                        class="img-fluid rounded shadow" style="width: 100%;" />
                </div>
            </div>
        </div>

        <!-- 簡單三步驟 -->
        <div id="stepsContainer"></div>

        <!-- 可以獲得的三個東西 -->
        <div id="benefitsContainer"></div>

        <!-- 課程篩選 -->
        <div class="container my-5">
            <h2 class="text-center fw-bold">課程篩選</h2>
            <p class="text-center text-muted">選擇你感興趣的課程分類</p>

            <!-- 選擇篩選類別 -->
            <div class="d-flex justify-content-center flex-wrap mb-4">
                <button class="filter-btn" data-category="all">全部課程</button>
                <button class="filter-btn" data-category="beginner">幣圈初心者</button>
                <button class="filter-btn" data-category="intermediate">幣圈見習家</button>
                <button class="filter-btn" data-category="advanced">幣圈實戰冒險者</button>
            </div>

            <!-- 課程清單 -->
            <div class="row" id="courseContainer"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoryNames = {
                all: "全部課程",
                beginner: "幣圈初心者",
                intermediate: "幣圈見習家",
                advanced: "幣圈實戰冒險者"
            };

            const courses = {
                beginner: [{
                        title: "比特幣基礎與投資",
                        category: "beginner",
                        image: "./img/lesson3.jpg",
                        provider: "加密學院",
                        type: "基礎課程"
                    },
                    {
                        title: "區塊鏈入門",
                        category: "beginner",
                        image: "./img/lesson4.jpg",
                        provider: "區塊鏈學習中心",
                        type: "基礎課程"
                    }
                ],
                intermediate: [{
                        title: "NFT 入門指南",
                        category: "intermediate",
                        image: "./img/lesson3.jpg",
                        provider: "NFT 學院",
                        type: "進階課程"
                    },
                    {
                        title: "智能合約開發",
                        category: "intermediate",
                        image: "./img/lesson4.jpg",
                        provider: "開發者學院",
                        type: "技術培訓"
                    }
                ],
                advanced: [{
                        title: "DeFi 金融應用",
                        category: "advanced",
                        image: "./img/lesson5.jpg",
                        provider: "投資大師班",
                        type: "高級課程"
                    },
                    {
                        title: "區塊鏈安全與風險管理",
                        category: "advanced",
                        image: "./img/lesson5.jpg",
                        provider: "安全技術學院",
                        type: "專業證書"
                    }
                ]
            };

            const steps = {
                beginner: [{
                        icon: "fas fa-user-plus",
                        title: "註冊交易所",
                        desc: "選擇適合的交易所並完成 KYC 驗證。"
                    },
                    {
                        icon: "fas fa-wallet",
                        title: "入金並購買加密貨幣",
                        desc: "存入法幣或 USDT，開始你的第一筆交易。"
                    },
                    {
                        icon: "fas fa-chart-line",
                        title: "開始學習交易",
                        desc: "了解現貨、合約、質押等投資方式。"
                    }
                ],
                intermediate: [{
                        icon: "fas fa-search-dollar",
                        title: "探索市場",
                        desc: "學習如何分析市場趨勢，找到合適的投資機會。"
                    },
                    {
                        icon: "fas fa-user-graduate",
                        title: "進階交易技巧",
                        desc: "掌握技術分析與風險管理，提高交易勝率。"
                    },
                    {
                        icon: "fas fa-briefcase",
                        title: "策略應用",
                        desc: "學習使用 DeFi、NFT 與 DAO 進行投資與管理。"
                    }
                ],
                advanced: [{
                        icon: "fas fa-code",
                        title: "開發區塊鏈應用",
                        desc: "學習智能合約開發，打造自己的區塊鏈應用。"
                    },
                    {
                        icon: "fas fa-network-wired",
                        title: "深入去中心化金融",
                        desc: "深入理解流動性挖礦、槓桿交易等高級應用。"
                    },
                    {
                        icon: "fas fa-users",
                        title: "創建幣圈品牌",
                        desc: "學習如何建立自己的幣圈影響力，創造更多機會。"
                    }
                ]
            };

            const benefits = {
                beginner: [{
                        icon: "fas fa-coins",
                        title: "被動收入機會",
                        desc: "透過質押（Staking）、DeFi、流動性挖礦等方式賺取額外收益。"
                    },
                    {
                        icon: "fas fa-lightbulb",
                        title: "金融與技術知識",
                        desc: "學習區塊鏈、NFT、智能合約等核心概念，提升你的競爭力。"
                    },
                    {
                        icon: "fas fa-handshake",
                        title: "更多合作與社群",
                        desc: "參與幣圈社群，找到志同道合的夥伴，一起探索新機會。"
                    }
                ],
                intermediate: [{
                        icon: "fas fa-chart-pie",
                        title: "市場分析能力",
                        desc: "培養分析市場趨勢的能力，做出更聰明的投資決策。"
                    },
                    {
                        icon: "fas fa-laptop-code",
                        title: "學習技術交易",
                        desc: "掌握技術分析與量化交易，提高你的投資技巧。"
                    },
                    {
                        icon: "fas fa-trophy",
                        title: "成為專業投資者",
                        desc: "持續學習，提升專業知識，讓投資成為你的核心競爭力。"
                    }
                ],
                advanced: [{
                        icon: "fas fa-rocket",
                        title: "打造區塊鏈事業",
                        desc: "從開發應用到投資管理，讓區塊鏈成為你的事業基石。"
                    },
                    {
                        icon: "fas fa-globe",
                        title: "進入全球市場",
                        desc: "與國際投資者、開發者合作，拓展你的影響力與機會。"
                    },
                    {
                        icon: "fas fa-user-shield",
                        title: "安全與風控",
                        desc: "學習如何保護資產，避免詐騙與安全風險。"
                    }
                ]
            };

            const courseContainer = document.getElementById("courseContainer");
            const stepsContainer = document.getElementById("stepsContainer");
            const benefitsContainer = document.getElementById("benefitsContainer");
            const filterButtons = document.querySelectorAll(".filter-btn");

            function getCategoryFromURL() {
                const params = new URLSearchParams(window.location.search);
                return params.get("category") || "all";
            }

            function updateActiveButton(category) {
                filterButtons.forEach(button => {
                    button.classList.toggle("active", button.getAttribute("data-category") === category);
                });
            }

            // 初始化時讓對應的按鈕亮起
            document.addEventListener("DOMContentLoaded", function() {
                const initialCategory = getCategoryFromURL();
                updateActiveButton(initialCategory);
            });

            // 點擊按鈕時更新網址與 active 樣式
            filterButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const selectedCategory = this.getAttribute("data-category");

                    // 更新網址
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.set("category", selectedCategory);
                    window.history.pushState({}, "", newUrl);

                    // 更新按鈕 active 樣式
                    updateActiveButton(selectedCategory);

                    // 更新頁面內容
                    updatePage(selectedCategory);
                });
            });

            function displayCourses(category) {
                courseContainer.innerHTML = "";
                const filteredCourses = category === "all" ? [].concat(...Object.values(courses)) : courses[category] || [];

                filteredCourses.forEach(course => {
                    courseContainer.innerHTML += `
            <div class="col-md-4 mb-4">
                <div class="course-card">
                    <div class="university-badge">
                        <img src="./img/logo.png" alt="${course.provider}">
                        <span>${course.provider}</span>
                    </div>
                    <img class="course-image" src="${course.image}" alt="${course.title}">
                    <div class="course-content">
                        <h5 class="course-title">${course.title}</h5>
                        <p class="course-provider">${course.provider}</p>
                        <span class="course-badge">${course.type}</span>
                    </div>
                </div>
            </div>
        `;
                });
            }


            function displaySection(container, title, items) {
                container.innerHTML = `
            <div class="container my-5">
                <h2 class="section-title">${title}</h2>
                <div class="row">
                    ${items.map(item => `
                        <div class="col-md-4">
                            <div class="feature-box">
                                <i class="${item.icon} icons"></i>
                                <h4>${item.title}</h4>
                                <p>${item.desc}</p>
                            </div>
                        </div>
                    `).join("")}
                </div>
            </div>
        `;
            }

            function updatePage(category) {
                updateActiveButton(category);

                if (category === "all") {
                    displayCourses("all"); // 顯示所有課程
                } else {
                    displayCourses(category);
                    displaySection(stepsContainer, `成為 ${categoryNames[category]} 的簡單三步驟`, steps[category]);
                    displaySection(benefitsContainer, `成為 ${categoryNames[category]} 你可以獲得的三個東西`, benefits[category]);
                }
            }

            const initialCategory = getCategoryFromURL();
            updatePage(initialCategory);
        });
    </script>
</body>

</html>