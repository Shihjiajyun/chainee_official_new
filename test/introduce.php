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

    #stepsContainer .container,
    #benefitsContainer .container {
        border: 1px solid rgb(176, 179, 176);
        /* 綠色框線 */
        border-radius: 12px;
        padding: 10px 30px;
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
                <h1 id="heroTitle" class="display-2 fw-bold mb-4">認識鏈習生</h1>
                <p id="heroDescription" class="lead mb-5">
                    鏈習生是一個針對區塊鏈學習者的專案，旨在幫助你從零開始了解區塊鏈技術，學習智能合約開發，並探索 Web3 世界的無限可能。
                </p>


                <!-- Action Buttons -->
                <div class="d-flex gap-3 flex-wrap">
                    <!-- <a href="#" class="btn btn-outline-light">瀏覽加密貨幣課程</a>
                    <a href="#" class="btn btn-outline-light">加密貨幣職涯發展</a> -->
                    <a href="#" class="btn btn-light text-dark">建立帳戶</a>
                </div>
            </div>
        </div>


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

        <!-- 可以獲得的三個東西 -->
        <div id="benefitsContainer" style="min-height: 230px;"></div>

        <!-- 簡單三步驟 -->
        <div id="stepsContainer"></div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const categoryNames = {
                all: "全部課程",
                beginner: "幣圈初心者",
                intermediate: "幣圈見習家",
                advanced: "幣圈實戰冒險者"
            };

            const categoryDescriptions = {
                all: "探索各種區塊鏈與加密貨幣課程，適合所有學習階段的學員。",
                beginner: "鏈習生是一個針對區塊鏈學習者的專案，幫助你從零開始學習區塊鏈與加密貨幣。",
                intermediate: "學習進階區塊鏈應用，包括 NFT、智能合約與去中心化金融（DeFi）。",
                advanced: "探索高級區塊鏈技術，如開發 DApp、智能合約安全、以及專業投資策略。"
            };

            const courses = {
                beginner: [{
                        title: "腦哥 | 投資加密貨幣，懂這些就夠了！從新手到穩健獲利的全方位幣圈攻略",
                        category: "beginner",
                        image: "https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg",
                        provider: "鏈習生加密學院",
                        type: "幣圈初心者"
                    },
                    {
                        title: "聰明理財Ｘ精準投資 ｜ 揮別窮忙的 5 分鐘高效加密貨幣投資攻略",
                        category: "beginner",
                        image: "https://chainee.io/wp-content/uploads/2024/09/%E4%B8%BB%E8%A6%96%E8%A6%BA-New.jpg",
                        provider: "鏈習生加密學院",
                        type: "幣圈初心者"
                    }
                ],
                intermediate: [{
                        title: "呢喃貓 | 股票操盤人轉戰幣圈 精選 10 招實戰獲利策略",
                        category: "intermediate",
                        image: "https://chainee.io/wp-content/uploads/2025/01/20250124.jpg",
                        provider: "鏈習生加密學院",
                        type: "幣圈見習家"
                    }
                ],
                advanced: [{
                        title: "認知升級篇 | 投資加密貨幣，懂這些就夠了！",
                        category: "advanced",
                        image: "https://chainee.io/wp-content/uploads/2025/02/%E5%85%8D%E8%B2%BB%E8%AC%9B%E5%BA%A7_1_0.jpg",
                        provider: "鏈習生加密學院",
                        type: "幣圈實戰冒險者"
                    },
                    {
                        title: "投資獲利篇 | 投資加密貨幣，懂這些就夠了！",
                        category: "advanced",
                        image: "https://chainee.io/wp-content/uploads/2025/02/%E5%85%8D%E8%B2%BB%E8%AC%9B%E5%BA%A7_3_0.jpg",
                        provider: "鏈習生加密學院",
                        type: "幣圈實戰冒險者"
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
            const heroTitle = document.getElementById("heroTitle");
            const heroDescription = document.getElementById("heroDescription");
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

            function updatePage(category) {
                updateActiveButton(category);

                // **動畫：先將內容移動到畫面外**
                gsap.to("#stepsContainer", {
                    x: 100,
                    opacity: 0,
                    duration: 0.3
                });
                gsap.to("#benefitsContainer", {
                    x: 100,
                    opacity: 0,
                    duration: 0.3
                });

                // **標題與描述先淡出**
                gsap.to("#heroTitle", {
                    opacity: 0,
                    x: 50,
                    duration: 0.3
                });
                gsap.to("#heroDescription", {
                    opacity: 0,
                    x: 50,
                    duration: 0.3
                });

                setTimeout(() => {
                    if (category === "all") {
                        displayCourses("all");
                    } else {
                        displayCourses(category);
                        displaySection(stepsContainer, `成為 ${categoryNames[category]} 的簡單三步驟`, steps[category]);
                        displaySection(benefitsContainer, `成為 ${categoryNames[category]} 你可以獲得的三個東西`, benefits[category]);
                    }

                    // **更新標題與描述**
                    if (heroTitle && heroDescription) {
                        heroTitle.textContent = `認識 ${categoryNames[category]}`;
                        heroDescription.textContent = categoryDescriptions[category];
                    }

                    // **動畫：新內容從右側滑入**
                    gsap.fromTo("#stepsContainer", {
                        x: 100,
                        opacity: 0
                    }, {
                        x: 0,
                        opacity: 1,
                        duration: 0.5
                    });
                    gsap.fromTo("#benefitsContainer", {
                        x: 100,
                        opacity: 0
                    }, {
                        x: 0,
                        opacity: 1,
                        duration: 0.5
                    });

                    // **標題與描述滑入**
                    gsap.fromTo("#heroTitle", {
                        x: 50,
                        opacity: 0
                    }, {
                        x: 0,
                        opacity: 1,
                        duration: 0.5
                    });
                    gsap.fromTo("#heroDescription", {
                        x: 50,
                        opacity: 0
                    }, {
                        x: 0,
                        opacity: 1,
                        duration: 0.5
                    });
                }, 300); // 等待舊內容動畫結束後再更新標題與內容
            };

            // 點擊按鈕時更新網址與 active 樣式
            filterButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const selectedCategory = this.getAttribute("data-category");

                    // 更新網址
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.set("category", selectedCategory);
                    window.history.pushState({}, "", newUrl);

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
                        <div class="text-center mt-3">
                            <a href="./course.php" 
                               class="btn btn-success">前往購買</a>
                        </div>
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

            const initialCategory = getCategoryFromURL();
            updatePage(initialCategory);
        });
    </script>
</body>

</html>