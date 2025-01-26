<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>交易成功</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="container text-center mt-5">
        <div class="alert alert-success" role="alert">
            <h1 class="display-4">交易成功！</h1>
            <p class="lead">感謝您的購買，以下是您的交易明細：</p>
        </div>
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">交易明細</h5>
                <p class="card-text"><strong>交易編號：</strong> <?= htmlspecialchars($_GET['transaction_id'] ?? '無法提供') ?></p>
                <p class="card-text"><strong>金額：</strong> <?= htmlspecialchars($_GET['amount'] ?? '無法提供') ?></p>
                <p class="card-text"><strong>商品描述：</strong> <?= htmlspecialchars($_GET['itemDesc'] ?? '未知商品') ?></p>
                <p class="card-text"><strong>電子郵件：</strong> <?= htmlspecialchars($_GET['email'] ?? '無法提供') ?></p>
            </div>
        </div>
        <a href="../index.php" class="btn btn-primary mt-4">繼續購物</a>
    </div>
</body>
<footer class="mt-3">
    <?php include 'footer.php' ?>
</footer>

</html>