<style>
    #slider-container {
        height: 100vh;
    }

    .slider-container {
        position: relative;
        width: 100%;
        height: 80%;
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
        bottom: 20px;
        right: 20px;
        display: flex;
        gap: 10px;
        z-index: 10;
        color: white;
        font-family: Arial, sans-serif;
    }

    .slider-counter {
        background: #0066ff;
        padding: 10px 20px;
        border-radius: 4px;
    }

    .nav-buttons {
        display: flex;
        gap: 5px;
    }

    .nav-button {
        background: #0066ff;
        border: none;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-button:hover {
        background: #0052cc;
    }

    .slide-content {
        font-weight: 700;
        background-color: white;
        color: #333333;
        position: absolute;
        bottom: 0px;
        left: 0px;
        z-index: 2;
        transform: translateY(50px);
        opacity: 0;
        transition: all 0.8s ease-out;
        transition-delay: 0.3s;
        padding-left: 10px;
        padding-right: 10px;
    }

    .slide.active .slide-content {
        transform: translateY(0);
        opacity: 1;
    }

    .slide-content h1 {
        font-size: 2.5em;
        margin: 0;
        margin-bottom: 10px;
    }

    .slide-content p {
        font-size: 1.2em;
        margin: 0;
    }
</style>

<div class="container" id="slider-container">
    <div class="slider-container">
        <div class="slide active" style="background-image: url('./img/download.png')">
            <div class="slide-content py-2">
                <p><span class="px-1 mx-2" style="color: white;background-color: red">最新消息</span>全球經濟運行看見投資機會</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('./img/download.png')">
            <div class="slide-content py-2">
                <p><span class="px-1 mx-2" style="color: white;background-color: red">最新消息</span>Description for slide 2</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('./img/download.png')">
            <div class="slide-content py-2">
                <p><span class="px-1 mx-2" style="color: white;background-color: red">最新消息</span>Description for slide 3</p>
            </div>
        </div>

        <div class="slider-nav">
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
    let currentIndex = 0;

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
        updateCounter();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);

    // Auto advance slides every 5 seconds
    setInterval(nextSlide, 7000);
</script>