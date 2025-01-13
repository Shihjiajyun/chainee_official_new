<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>鏈習生 - 訂閱專欄</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<style>
    body {
        background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        font-family: 'Arial', sans-serif;
    }

    #subscription .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    #subscription .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    #subscription .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    #subscription .card-title {
        font-weight: bold;
        font-size: 1.25rem;
        color: #343a40;
    }

    #subscription .card-text {
        color: #6c757d;
    }

    #subscription h2,
    #subscription h4 {
        color: #343a40;
    }

</style>

<body>
    <?php include './navbar.php' ?>
    <div class="container my-5" id="subscription">
        <h4 class="text-center" style="font-weight: 900;">All Subscriptions</h4>
        <h2 class="text-center mb-4" style="font-weight: 900;">鏈習生訂閱方案</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="./img/lesson.jpg" class="card-img-top" alt="精準定位幣圈趨勢">
                    <div class="card-body text-center">
                        <h5 class="card-title">精準定位幣圈趨勢</h5>
                        <p class="card-text">加密市場的邏輯與第一性原理 | 腦哥</p>
                        <a href="#" class="btn btn-warning mt-3" style="font-weight: 700;">了解更多</a>
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