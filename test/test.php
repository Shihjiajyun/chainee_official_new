<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課程介紹區塊</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .course-container {
            display: flex;
            width: 100vw;
            height: 100vh;
            position: relative;
        }

        .course-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg') no-repeat center/cover;
            filter: blur(10px) brightness(50%);
            z-index: -1;
        }

        .course-image {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .course-image img {
            max-width: 80%;
            max-height: 100%;
            object-fit: contain;
        }

        .course-content {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
        }

        .course-title {
            font-size: 32px;
            font-weight: bold;
        }

        .course-content h3 {
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .course-subtitle {
            color: #85d8ff;
            margin-top: 10px;
            font-size: 24px;
        }

        .course-meta {
            margin: 15px 0;
            display: flex;
            align-items: center;
            font-size: 18px;
        }

        .course-meta span {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }

        .course-meta i {
            margin-right: 5px;
        }

        .course-description {
            font-size: 16px;
            margin-top: 15px;
            color: #ddd;
        }

        .course-description-2 {
            font-size: 16px;
            margin-top: 15px;
            color: #FFD700;
        }

        .course-badge {
            background-color: #2E9E9E;
            border-radius: 10px;
            padding: 10px 0px;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            color: white;
            margin-bottom: 10px;
            max-width: 80px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="course-container">
        <div class="course-background"></div>
        <div class="course-image">
            <img src="https://chainee.io/wp-content/uploads/2024/03/%E4%BB%98%E8%B2%BB%E8%AA%B2%E6%A9%AB%E5%BC%8F.jpg" alt="課程封面">
        </div>
        <div class="course-content">
            <p class="course-badge">新手</p>
            <h2 class="course-title">腦哥 | 投資加密貨幣，懂這些就夠了！從新手到穩健獲利的全方位幣圈攻略</h2>
            <h3>理論x 策略 x 實戰</h3>
            <div class="course-meta">
                <span><i class="fas fa-user"></i> 18526 名學員</span>
                <span><i class="fas fa-star"></i> 4.8 (11)</span>
            </div>
            <p class="course-description">
                乘上未來金融趨勢，投資加密貨幣並賺取超越傳統股市的報酬，任何人都可以在合規、安全的環境下，用四大面向挑選短中長期投資的幣種，並透過理財工具輕鬆地完成自動化，創建穩健的被動收入。
            </p>
            <p class="course-description">
                在華語加密貨幣教育圈，深耕多年的腦哥，將結合過去帶領上百萬學員的經驗，在 8 小時內，以化繁為簡的大白話，帶你從加密貨幣的趨勢，到懶人交易、長期實戰的基礎分析和風險認知，以各種面向了解加密貨幣投資。
            </p>
            <p class="course-description-2">
                * 課程內含「認知升級篇」、「操作實務篇」、「投資獲利篇」、「名人專訪篇」，以及未來購買新篇章 3 折優惠資格
            </p>
        </div>
    </div>
</body>

</html>