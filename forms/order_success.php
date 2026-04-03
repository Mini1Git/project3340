<?php
    session_start();
    // check to make sure they are logged in
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        <div class="receipt-footer">
            <a href="../services/orders.php" class="back-link">See Your Orders</a>
        </div>
    </div>
</body>
</html>