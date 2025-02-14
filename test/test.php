<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPA Academy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        .hero-section {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .video-container iframe {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(to left, rgba(255, 255, 255, 0) 30%, rgba(255, 255, 255, 1) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: black;
            text-align: left;
            padding-left: 5%;
            /* max-width: 400px; */
        }

        .hero-content h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .search-bar {
            display: flex;
            width: 100%;
            max-width: 350px;
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .search-bar input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 16px;
            padding: 5px;
        }

        .search-bar button {
            background: black;
            color: white;
            border: none;
            padding: 5px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-bar button i {
            color: white;
            font-size: 18px;
        }

        .tags {
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
        }

        .tag {
            background: #f3f3f3;
            color: #333;
            padding: 8px 12px;
            border-radius: 15px;
            font-size: 14px;
            margin-right: 8px;
            margin-bottom: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .tag:hover {
            background: #ddd;
        }
    </style>
</head>

<body>

    <div class="hero-section">
        <div class="video-container">
            <iframe src="https://player.vimeo.com/video/936150040?autoplay=1&muted=1&loop=1"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>


        <div class="gradient-overlay"></div>

        <div class="hero-content">
            <h1>為自己學習最迷人</h1>
            <p>鏈習生 線上學習平台，找到適合你的學習方式，迎接新改變！</p>

            <div class="search-bar">
                <input type="text" placeholder="今天想學點什麼？">
                <button><i class="fas fa-search"></i></button>
            </div>

            <div class="tags">
                <div class="tag">24堂新年希望加速器 🚀</div>
                <div class="tag">先搶先贏 / 最低77折</div>
                <div class="tag">長期問答攻防戰</div>
                <div class="tag">2025請假攻略</div>
            </div>

        </div>
    </div>

</body>

</html>