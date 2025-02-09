<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>主視覺 Coverflow 範例</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 引入 Swiper CSS (官方 CDN) -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@8.3.2/swiper-bundle.min.css" />

    <style>
        /* 基礎重置 */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            font-family: sans-serif;
            color: #333;
            /* 讓頁面佔滿可視區 */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Swiper 主容器大小 (可自行調整) */
        .swiper {
            width: 85%;
            max-width: 1200px;
            height: 500px;
            position: relative;
        }

        /* 每個 Slide 設定固定寬度，以便左右可半露 */
        .swiper-slide {
            width: 800px;
            /* 關鍵：固定寬度，若螢幕足夠寬，會顯示左右半露 */
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ccc;
            /* 預設底色 */
        }

        /* 主視覺背景圖，可改成您自己的圖片 URL */
        .slide-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* 圖片自動裁切填滿 */
        }

        /* 疊加在背景上方的文字或人物區塊 */
        .slide-overlay {
            position: relative;
            z-index: 2;
            /* 讓文字位於背景圖之上 */
            text-align: center;
            color: #fff;
            /* 可改成符合背景的顏色 */
            padding: 2rem;
        }

        .slide-overlay h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        /* 關鍵詞示例 */
        .keywords {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            justify-content: center;
        }

        .keywords span {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 999px;
        }

        /* Swiper 分頁器、箭頭基本樣式 */
        .swiper-button-prev,
        .swiper-button-next {
            color: #333;
        }

        .swiper-pagination-bullet {
            background: rgba(0, 0, 0, 0.2);
        }

        .swiper-pagination-bullet-active {
            background: #333;
        }
    </style>
</head>

<body>

    <!-- 單一 Swiper 容器 -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <!-- Slide 1 (大圖 + 疊加人物 / 文字) -->
            <div class="swiper-slide">
                <img
                    class="slide-bg"
                    src="https://via.placeholder.com/1200x600/666/fff?text=加密新手+投資創富"
                    alt="Slide 1" />
                <div class="slide-overlay">
                    <h1>加密新手 投資創富</h1>
                    <div class="keywords">
                        <span>技術</span>
                        <span>心態</span>
                        <span>分析</span>
                        <span>知識</span>
                        <span>風控</span>
                        <span>策略</span>
                        <span>理財</span>
                        <span>平台</span>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
                <img
                    class="slide-bg"
                    src="https://via.placeholder.com/1200x600/444/fff?text=第二個主視覺"
                    alt="Slide 2" />
                <div class="slide-overlay">
                    <h1>第二個主視覺標題</h1>
                    <p>這裡可放更多文字敘述或按鈕</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
                <img
                    class="slide-bg"
                    src="https://via.placeholder.com/1200x600/222/fff?text=第三個主視覺"
                    alt="Slide 3" />
                <div class="slide-overlay">
                    <h1>第三個主視覺標題</h1>
                    <p>根據需求自訂內文</p>
                </div>
            </div>

        </div>

        <!-- 分頁器、前後切換按鈕 -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@8.3.2/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".mySwiper", {
                // 使用 coverflow 效果
                effect: "coverflow",
                centeredSlides: true,
                slidesPerView: "auto", // 搭配固定寬度 .swiper-slide
                coverflowEffect: {
                    rotate: 0, // 旋轉角度 (可調大讓卡片斜斜的)
                    stretch: -100, // 調整左右卡片距離(負值往內靠、正值往外擴)
                    depth: 200, // 3D 深度
                    modifier: 1,
                    slideShadows: false
                },
                loop: true, // 無限輪播
                grabCursor: true, // 滑鼠移上顯示抓手
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });
    </script>
</body>

</html>