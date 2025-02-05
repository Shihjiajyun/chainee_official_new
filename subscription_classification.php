<?php
session_start();
require 'php/db.php'; // 連接資料庫

// 查詢 subscription 資料表
$query = "SELECT id, title, creator, description, main_visual FROM subscription ORDER BY last_updated DESC";
$result = $mysqli->query($query);

$subscriptions = [];
while ($row = $result->fetch_assoc()) {
    $subscriptions[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>鏈習生 - 訂閱專欄</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/subscription_classification.css">
</head>

<body>
    <?php include './navbar.php' ?>
    
    <div class="container my-5" id="subscription">
        <h4 class="text-center" style="font-weight: 900;">All Subscriptions</h4>
        <h2 class="text-center mb-4" style="font-weight: 900;">鏈習生訂閱方案</h2>
        <div class="row justify-content-center">
            
            <?php if (!empty($subscriptions)) : ?>
                <?php foreach ($subscriptions as $subscription) : ?>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo htmlspecialchars($subscription['main_visual'] ?: './img/lesson.jpg'); ?>" 
                                 class="card-img-top" alt="<?php echo htmlspecialchars($subscription['title']); ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo htmlspecialchars($subscription['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($subscription['description'] . ' | ' . $subscription['creator']); ?></p>
                                <a href="subscription.php?id=<?php echo htmlspecialchars($subscription['id']); ?>" 
                                   class="btn btn-warning mt-3" style="font-weight: 700;">了解更多</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="./img/lesson.jpg" class="card-img-top" alt="精準定位幣圈趨勢">
                        <div class="card-body text-center">
                            <h5 class="card-title">精準定位幣圈趨勢</h5>
                            <p class="card-text">加密市場的邏輯與第一性原理 | 腦哥</p>
                            <a href="subscription.php" class="btn btn-warning mt-3" style="font-weight: 700;">了解更多</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer>
    <?php include 'footer.php' ?>
</footer>

</html>
