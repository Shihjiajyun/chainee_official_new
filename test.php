<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <title>Coverflow 輪播 - 顯示 5 張</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@8.3.2/swiper-bundle.min.css">

  <style>
    /* 全域 CSS 重置 */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #f7f7f7;
      font-family: sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    /* Swiper 容器 */
    /* Swiper 容器 */
    .swiper {
      height: 50vh;
      /* 控制輪播區塊的高度 */
      position: relative;
    }

    /* Slide 設定 */
    .swiper-slide {
      width: 100%;
      max-width: 1400px;
      /* 確保每張圖片夠大 */
      border-radius: 20px;
      overflow: hidden;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      aspect-ratio: 16 / 7;
      /* 長方形比例 */
    }

    /* 背景圖片 */
    .slide-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* 黑色遮罩：非中間的卡片變暗 */
    .swiper-slide:not(.swiper-slide-active)::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.3);
      z-index: 1;
    }

    /* 讓 active slide 沒有遮罩 */
    .swiper-slide.swiper-slide-active::before {
      display: none;
    }

    /* 箭頭按鈕 */
    .swiper-button-prev,
    .swiper-button-next {
      color: #333;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 10;
    }

    .swiper-button-next {
      right: 0;
    }

    .swiper-button-prev {
      left: 0;
    }

    /* Swiper 分頁器 */
    .swiper-pagination-bullet {
      background: rgba(0, 0, 0, 0.3);
    }

    .swiper-pagination-bullet-active {
      background: #333;
    }
  </style>
</head>

<body>

  <!-- Swiper 容器 -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

      <!-- 5 張圖片 (全部使用 img/main.jpg) -->
      <div class="swiper-slide">
        <img class="slide-bg" src="img/main.jpg" alt="Slide 1" />
      </div>
      <div class="swiper-slide">
        <img class="slide-bg" src="img/main.jpg" alt="Slide 2" />
      </div>
      <div class="swiper-slide">
        <img class="slide-bg" src="img/main.jpg" alt="Slide 3" />
      </div>
      <div class="swiper-slide">
        <img class="slide-bg" src="img/main.jpg" alt="Slide 4" />
      </div>
      <div class="swiper-slide">
        <img class="slide-bg" src="img/main.jpg" alt="Slide 5" />
      </div>
      <div class="swiper-slide">
        <img class="slide-bg" src="img/main.jpg" alt="Slide 6" />
      </div>

      <div class="swiper-slide">
        <img class="slide-bg" src="img/main.jpg" alt="Slide 7" />
      </div>


    </div>

    <!-- 分頁器 + 左右箭頭 -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper@8.3.2/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        centeredSlides: true,
        slidesPerView: "auto", // 讓圖片自適應寬度
        spaceBetween: -500, // 讓左右卡片重疊更多
        coverflowEffect: {
          rotate: 0,
          stretch: 300, // 讓左右卡片更接近中間
          depth: 1000, // 減少 3D 景深
          modifier: 1,
          slideShadows: false,
        },
        loop: true,
        grabCursor: true,
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