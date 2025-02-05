<style>
    #slider-container {
        height: 90vh;
        max-height: 480px;
        width: 90vw;
    }

    .slider-container {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        transform-origin: center;
        transition: transform 0.6s ease-in-out, opacity 0.6s ease-in-out;
        transform: scale(1.1);
        /* 初始稍微放大，讓動畫更有層次 */
    }

    .slide.active {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }

    .slide.prev {
        opacity: 0;
        transform: scale(0.8);
        /* 縮小並淡出 */
    }

    .slide.next {
        opacity: 0;
        transform: scale(1.2);
        /* 稍微放大，然後進入畫面 */
    }


    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateX(50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .slider-nav {
        position: absolute;
        bottom: 10px;
        right: 10px;
        display: flex;
        align-items: center;
        gap: 20px;
        z-index: 10;
        color: white;
        font-family: Arial, sans-serif;
        background: rgba(0, 0, 0, 0.6);
        padding: 10px 20px;
        border-radius: 8px;
        backdrop-filter: blur(5px);
        max-width: 90%;
        /* 讓它最多佔 90% 的寬度，自適應內容 */
        width: auto;
        /* 讓寬度依內容變化 */
        flex-wrap: nowrap;
        /* 確保內容不換行 */
    }

    .slider-counter {
        flex-shrink: 0;
        /* 讓計數不會被壓縮 */
    }

    .nav-buttons {
        flex-shrink: 0;
        /* 讓按鈕不會縮小 */
        display: flex;
        gap: 5px;
    }

    .nav-button {
        background: #999999;
        border: none;
        color: rgb(72, 72, 72);
        width: 35px;
        height: 35px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .nav-button:hover {
        background:rgb(99, 99, 99);
    }

    .slide-description {
        font-size: 14px;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        flex-shrink: 1;
        /* 讓描述區可以縮小 */
        min-width: 50px;
        /* 避免過小 */
        max-width: 350px;
        /* 限制最大寬度 */
    }

    .slide-description::before {
        content: "好評熱賣中";
        background: rgb(255, 0, 0);
        color: white;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 4px;
        margin-right: 8px;
        font-weight: bold;
    }


    @media (max-width: 768px) {
        #slider-container {
            height: 40vh;
            /* max-height: 480px; */
            width: 90vw;
        }
    }

    @media (max-width: 576px) {
        #slider-container {
            height: 35vh;
            /* max-height: 480px; */
            width: 90vw;
            padding: 0;
        }
    }

    @media (max-width: 425px) {
        .slide-description {
            display: none;
        }

        .slider-nav {
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 5px;
        }

        .nav-button {
            width: 28px;
            height: 28px;
            font-size: 12px;
        }

        .slider-counter {
            font-size: 12px;
        }
    }
</style>

<div class="container mt-3" id="slider-container">
    <div class="slider-container">
        <div class="slide active" style="background-image: url('./img/main.jpg')"></div>
        <div class="slide" style="background-image: url('./img/main.jpg')"></div>
        <div class="slide" style="background-image: url('./img/main.jpg')"></div>

        <div class="slider-nav">
            <div class="slide-description" id="slide-description">全球經濟運行看見投資機會</div>
            <div class="slider-counter">
                <span id="current">01</span> / <span id="total">03</span>
            </div>
            <div class="nav-buttons">
                <button class="nav-button prev"><span class="material-icons">chevron_left</span></button>
                <button class="nav-button next"><span class="material-icons">chevron_right</span></button>
            </div>

        </div>
    </div>
</div>

<script>
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const currentSlide = document.getElementById('current');
    const slideDescription = document.getElementById('slide-description');
    const descriptions = [
        "全球經濟運行看見投資機會",
        "Description for slide 2",
        "Description for slide 3"
    ];

    let currentIndex = 0;
    const totalSlides = slides.length;
    document.getElementById('total').textContent = String(totalSlides).padStart(2, '0');

    function updateCounter() {
        currentSlide.textContent = String(currentIndex + 1).padStart(2, '0');
    }

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active', 'prev', 'next');

            if (i < index) {
                slide.classList.add('prev'); // 讓上一張圖片縮小並淡出
            } else if (i > index) {
                slide.classList.add('next'); // 讓下一張圖片稍微放大再進場
            }
        });

        slides[index].classList.add('active'); // 當前圖片變為可見
        slideDescription.textContent = descriptions[index];
        updateCounter();

        // 禁用按鈕機制
        prevButton.disabled = index === 0;
        nextButton.disabled = index === slides.length - 1;
    }

    function nextSlide() {
        if (currentIndex < totalSlides - 1) {
            currentIndex++;
            showSlide(currentIndex);
        }
    }

    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
            showSlide(currentIndex);
        }
    }

    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);

    // 初始化按鈕狀態
    prevButton.disabled = currentIndex === 0;
    nextButton.disabled = currentIndex === totalSlides - 1;
</script>