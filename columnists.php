<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Card Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/columnists.css">
</head>

<body>
    <!-- 導覽列 -->
    <?php include 'navbar.php' ?>

    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <!-- 第一張卡片 -->
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <img src="./img/lesson.jpg" class="card-img-top" alt="股股學院">
                    <div class="card-body">
                        <h5 class="card-title">股股學院</h5>
                        <p class="card-text">股股知識庫，致力於提供多元投資理財訊息：台灣股投資 | 加密貨幣 | 金融理財 | 財經時事。</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./columnists_introduce.php" class="btn btn-custom">查看介紹</a>
                    </div>
                </div>
            </div>
            <!-- 第二張卡片 -->
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <img src="./img/lesson1.jpg" class="card-img-top" alt="矮倫">
                    <div class="card-body">
                        <h5 class="card-title">矮倫</h5>
                        <p class="card-text">每週都要吃各餐攤，美食家喜歡泡通，身體根本就是由垃圾食物組成的。</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./columnists_introduce.php" class="btn btn-custom">查看介紹</a>
                    </div>
                </div>
            </div>
            <!-- 第三張卡片 -->
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <img src="./img/lesson2.jpg" class="card-img-top" alt="區塊鏈小白">
                    <div class="card-body">
                        <h5 class="card-title">區塊鏈小白</h5>
                        <p class="card-text">我是Ivan，一個充滿好奇的冒險家，身處於這個Web 3的未知時代。</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./columnists_introduce.php" class="btn btn-custom">查看介紹</a>
                    </div>
                </div>
            </div>
            <!-- 第四張卡片 -->
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <img src="./img/lesson.jpg" class="card-img-top" alt="貝瑞大叔">
                    <div class="card-body">
                        <h5 class="card-title">貝瑞大叔</h5>
                        <p class="card-text">旅宿創業家與區塊鏈愛好者，目前管理7家飯店與其他旅遊休閒事業。</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./columnists_introduce.php" class="btn btn-custom">查看介紹</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <img src="./img/lesson.jpg" class="card-img-top" alt="貝瑞大叔">
                    <div class="card-body">
                        <h5 class="card-title">貝瑞大叔</h5>
                        <p class="card-text">旅宿創業家與區塊鏈愛好者，目前管理7家飯店與其他旅遊休閒事業。</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./columnists_introduce.php" class="btn btn-custom">查看介紹</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <img src="./img/lesson.jpg" class="card-img-top" alt="貝瑞大叔">
                    <div class="card-body">
                        <h5 class="card-title">貝瑞大叔</h5>
                        <p class="card-text">旅宿創業家與區塊鏈愛好者，目前管理7家飯店與其他旅遊休閒事業。</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./columnists_introduce.php" class="btn btn-custom">查看介紹</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center shadow">
                    <img src="./img/lesson.jpg" class="card-img-top" alt="貝瑞大叔">
                    <div class="card-body">
                        <h5 class="card-title">貝瑞大叔</h5>
                        <p class="card-text">旅宿創業家與區塊鏈愛好者，目前管理7家飯店與其他旅遊休閒事業。</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="./columnists_introduce.php" class="btn btn-custom">查看介紹</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <?php include 'footer.php' ?>
</footer>

</html>