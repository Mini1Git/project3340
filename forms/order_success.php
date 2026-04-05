<?php
    session_start();
    // check to make sure they are logged in
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: login.php");
        exit();
    }
?>

<!--page to show that their order was successfully placed-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="author" content ="Wilson Tran, Liana Bell, Kayden Ions, Nazifa Tahsin">
    <meta name="keywords" content="food, pizza, grillow, delivery, delivery app, app takeout, eating, restaurants, windsor, local foods">
    <meta name = "description" content ="affordable local food delivery service in Windsor">
    <title>Order Placed</title>
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/receiptStyle.css">
</head>
<body class="receipt-body">
    <div class="receipt-container">
        <header class="receipt-header">
            <br>
            <h1>Order Placed</h1>
        </header>

        <h3>
            Thank you for ordering from Grillow! Your order will be arriving shortly!
        </h3>
        <!--link to the orders page to see their order-->
        <div class="receipt-footer">
            <a href="../services/orders.php" class="back-link">See Your Orders</a>
        </div>
    </div>
</body>
</html>