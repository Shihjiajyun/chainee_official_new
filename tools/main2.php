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
        transition: all 0.8s ease-in-out;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        transform: translateX(100%);
    }

    .slide.active {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
    }

    .slide.prev {
        transform: translateX(-100%);
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
    }

    .slider-counter {
        font-size: 14px;
    }

    .nav-buttons {
        display: flex;
        gap: 5px;
    }

    .nav-button {
        background: #0066ff;
        border: none;
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-button:hover {
        background: #0052cc;
    }

    .slide-description {
        font-size: 14px;
        white-space: nowrap;
        max-width: 200px;
        text-overflow: ellipsis;
        overflow: hidden;
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
                <button class="nav-button prev">←</button>
                <button class="nav-button next">→</button>
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
            slide.classList.remove('active', 'prev');
            if (i < index) {
                slide.classList.add('prev');
            }
        });
        slides[index].classList.add('active');
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