<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Cards</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .carousel {
            width: 90%;
            margin: 20px auto;
        }

        .card {
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            margin: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            height: 450px; /* Fixed height for consistent card sizes */
            position: relative;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .card-image-container {
            position: relative;
            height: 200px;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-tag {
            position: absolute;
            top: 16px;
            left: 16px;
            background-color: #0066ff;
            color: #fff;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            z-index: 1;
        }

        .card-content {
            padding: 20px;
            background: #fff;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 12px 0;
            line-height: 1.4;
            color: #1a1a1a;
        }

        .card-meta {
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-meta span {
            color: #0066ff;
            font-weight: 500;
        }

        .card-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            margin-top: auto;
            display: flex;
            justify-content: flex-end;
            padding-top: 16px;
            
        }

        .read-more {
            position: absolute;
            right: 10px;
            bottom: 15px;
            display: inline-block;
            background-color: #0066ff;
            color: white;
            padding: 8px 24px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .read-more:hover {
            background-color: #0052cc;
        }

        /* Slick Carousel Customization */
        .slick-dots {
            bottom: -40px;
        }

        .slick-dots li button:before {
            font-size: 8px;
            color: #0066ff;
        }

        .slick-dots li.slick-active button:before {
            color: #0066ff;
        }

        @media (max-width: 768px) {
            .card {
                height: 400px;
            }
            
            .card-image-container {
                height: 160px;
            }
        }
    </style>
</head>
<body>
    <div class="carousel">
        <div class="card">
            <div class="card-image-container">
                <div class="card-tag">幣圈天上掉錢下來</div>
                <img src="./img/lesson.jpg" alt="SOLV Megadrop">
            </div>
            <div class="card-content">
                <h3 class="card-title">SOLV 空投別錯過！幣安 Megadrop 積分任務手把手圖文教學</h3>
                <div class="card-meta">
                    Posted by <span>閱讀筆耕</span> • 2025-01-07
                </div>
                <p class="card-description">
                    最後更新日期：2024 年 1 月 7 日 幣安交易所擴手毛活動又來囉！跨進半年，幣安交易所 Megadrop 活動正式開跑，趕快來看看如何參與！
                </p>
                <div class="card-footer">
                    <a href="#" class="read-more">閱讀更多</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-image-container">
                <div class="card-tag">學習投資</div>
                <img src="./img/lesson.jpg" alt="投資學習">
            </div>
            <div class="card-content">
                <h3 class="card-title">台幣、港幣、比特幣，哪個會先消失？</h3>
                <div class="card-meta">
                    Posted by <span>高重建老師</span> • 2024-12-23
                </div>
                <p class="card-description">
                    隨著數位支付的普及，各種貨幣的未來發展引發熱議。本文將深入探討三種不同性質的貨幣：台幣、港幣和比特幣的未來發展趨勢。
                </p>
                <div class="card-footer">
                    <a href="#" class="read-more">閱讀更多</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-image-container">
                <div class="card-tag">幣圈大調查</div>
                <img src="./img/lesson.jpg" alt="幣圈調查">
            </div>
            <div class="card-content">
                <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                <div class="card-meta">
                    Posted by <span>閱讀筆耕</span> • 2024-12-17
                </div>
                <p class="card-description">
                    透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                </p>
                <div class="card-footer">
                    <a href="#" class="read-more">閱讀更多</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image-container">
                <div class="card-tag">幣圈大調查</div>
                <img src="./img/lesson.jpg" alt="幣圈調查">
            </div>
            <div class="card-content">
                <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                <div class="card-meta">
                    Posted by <span>閱讀筆耕</span> • 2024-12-17
                </div>
                <p class="card-description">
                    透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                </p>
                <div class="card-footer">
                    <a href="#" class="read-more">閱讀更多</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-image-container">
                <div class="card-tag">幣圈大調查</div>
                <img src="./img/lesson.jpg" alt="幣圈調查">
            </div>
            <div class="card-content">
                <h3 class="card-title">加密貨幣投資問卷大調查：「幣」需要對決！你是哪種投資人？</h3>
                <div class="card-meta">
                    Posted by <span>閱讀筆耕</span> • 2024-12-17
                </div>
                <p class="card-description">
                    透過這份詳細的投資者調查，我們深入了解不同類型的加密貨幣投資者的特點、投資策略以及風險管理方式。來看看你屬於哪一類型！
                </p>
                <div class="card-footer">
                    <a href="#" class="read-more">閱讀更多</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>