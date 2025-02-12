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
        width: 100%;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .badge-custom {
        background: #6c757d;
        color: white;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 0.85rem;
    }
</style>

<body>
    <?php include 'navbar.php' ?>
    <div class="min-vh-100">
        <!-- Hero Section -->
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
                <h1 class="display-2 fw-bold mb-4">認識幣圈初心者</h1>
                <p class="lead mb-5">
                    雖然許多人都想進入加密貨幣市場，但對於新手來說，這個領域可能會感到困惑和複雜。透過我們的線上課程，讓您輕鬆掌握加密貨幣的基礎知識。
                </p>

                <!-- Action Buttons -->
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#" class="btn btn-outline-light">瀏覽加密貨幣課程</a>
                    <a href="#" class="btn btn-outline-light">加密貨幣職涯發展</a>
                    <a href="#" class="btn btn-light text-dark">建立帳戶</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 introduce">
                    <h2 class="h3 mb-4" style="color: #00262b;font-weight:900;">什麼是幣圈初心者？</h2>
                    <p>
                        幣圈初心者是指剛開始接觸加密貨幣市場的投資者。他們通常需要學習基本的區塊鏈知識、
                        交易平台使用方式、市場分析技巧等。新手在進入市場時，應該謹慎行事，從小額投資開始，並持續學習相關知識。
                    </p>
                    <p class="">
                        許多新手在剛進入市場時會感到困惑和不安。這是正常的，因為加密貨幣市場確實比傳統
                        金融市場更加複雜和波動。建議新手可以從了解比特幣開始，逐步擴展到其他加密貨幣，
                        同時要特別注意風險管理和資金控管。
                    </p>
                </div>
                <div class="col-lg-6">
                    <img
                        src="./img/leadership.png"
                        alt="加密貨幣學習示意圖"
                        class="img-fluid rounded shadow" style="width: 100%;" />
                </div>
            </div>
        </div>

        <div class="container my-5">
            <h2 class="section-title">簡單成為幣圈初心者三步驟</h2>
            <p class="section-subtitle">跟著這三個簡單步驟，快速進入幣圈世界</p>

            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-user-plus icons"></i>
                        <div class="feature-text">
                            <h4>註冊交易所</h4>
                            <p>選擇適合的交易所並完成 KYC 驗證。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-wallet icons"></i>
                        <div class="feature-text">
                            <h4>入金並購買加密貨幣</h4>
                            <p>存入法幣或 USDT，開始你的第一筆交易。</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="fas fa-chart-line icons"></i>
                        <div class="feature-text">
                            <h4>開始學習交易</h4>
                            <p>了解現貨、合約、質押等投資方式。</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-5">
        </div>

        <div class="container my-5">
            <h2 class="section-title">成為幣圈初心者之後，你可以獲得的三個東西</h2>
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

        <div class="container my-5">
            <h2 class="text-center fw-bold">課程篩選</h2>
            <p class="text-center text-muted">選擇你感興趣的課程分類</p>

            <!-- 選擇篩選類別 -->
            <div class="d-flex justify-content-center flex-wrap mb-4">
                <button class="filter-btn active" data-category="all">全部課程</button>
                <button class="filter-btn" data-category="crypto">加密貨幣</button>
                <button class="filter-btn" data-category="finance">金融與投資</button>
                <button class="filter-btn" data-category="tech">區塊鏈技術</button>
            </div>

            <!-- 課程清單 -->
            <div class="row" id="courseContainer">
                <!-- 動態生成課程卡片 -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const courses = [{
                    title: "比特幣基礎與投資",
                    category: "crypto",
                    image: "./img/lesson3.jpg",
                    provider: "加密學院",
                    type: "課程"
                },
                {
                    title: "NFT 入門指南",
                    category: "crypto",
                    image: "./img/lesson4.jpg",
                    provider: "區塊鏈學習中心",
                    type: "課程"
                },
                {
                    title: "智能合約開發",
                    category: "tech",
                    image: "./img/lesson5.jpg",
                    provider: "開發者學院",
                    type: "技術培訓"
                },
                {
                    title: "DeFi 金融應用",
                    category: "finance",
                    image: "./img/lesson3.jpg",
                    provider: "投資大師班",
                    type: "高級課程"
                },
                {
                    title: "區塊鏈安全與風險管理",
                    category: "tech",
                    image: "./img/lesson4.jpg",
                    provider: "安全技術學院",
                    type: "專業證書"
                },
                {
                    title: "投資策略與市場分析",
                    category: "finance",
                    image: "./img/lesson5.jpg",
                    provider: "金融大學",
                    type: "課程"
                }
            ];

            const courseContainer = document.getElementById("courseContainer");
            const filterButtons = document.querySelectorAll(".filter-btn");

            function displayCourses(category) {
                courseContainer.innerHTML = "";
                const filteredCourses = category === "all" ? courses : courses.filter(course => course.category === category);

                filteredCourses.forEach(course => {
                    const courseHTML = `
                    <div class="col-md-4 mb-4">
                        <div class="course-card">
                            <img src="${course.image}" alt="${course.title}">
                            <h5>${course.title}</h5>
                            <p class="text-muted">${course.provider}</p>
                            <span class="badge-custom">${course.type}</span>
                        </div>
                    </div>
                `;
                    courseContainer.innerHTML += courseHTML;
                });
            }

            // 初始顯示所有課程
            displayCourses("all");

            // 綁定按鈕事件
            filterButtons.forEach(button => {
                button.addEventListener("click", function() {
                    document.querySelector(".filter-btn.active").classList.remove("active");
                    this.classList.add("active");
                    const selectedCategory = this.getAttribute("data-category");
                    displayCourses(selectedCategory);
                });
            });
        });
    </script>
</body>

</html>