<?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);

    if (!$isLoggedIn) {
        header("Location: ../forms/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Grillow</title>
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">
    <link rel="stylesheet" href="../stylesheets/favouritesStyle.css">
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
    <script src="../scripts/favouritesScript.js" defer></script>
</head>
<body>
    <header>
        <div class="logo-menu">
            <div class="ham">
                <img src="../icons/hamburger.svg">
            </div>
            <h1><img src="../icons/logo-pizza.png" alt="rushing pizza logo"> Grillow</h1>
        </div>
        <div class="log">
            <?php if (!$isLoggedIn): ?>
                <a class="account-btn" href="../forms/login.php">Login</a>
                <a class="account-btn-bold" href="../forms/signup.php">Sign Up</a>
            <?php else: ?>
                <a class="account-btn-bold" href="../server/logout.php">Sign Out</a>
                <a class="profile-settings" href="../user/profile.php"><i class="fa-solid fa-circle-user"></i></a>
            <?php endif; ?>
        </div>
    </header>

    <div class="content">
        <nav> <!--navigation bar-->
            <div class="offscreen-menu">
                <ul class="services">
                    <li><a href="../home/index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                    <li><a href="browse.php"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                    <?php if ($isLoggedIn): ?>
                        <li><a href="orders.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                        <li id="on-page"><a href="favourites.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                        <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                    <?php else: ?>
                        <li><a href="../forms/signup.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                        <li><a href="../forms/signup.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                        <li><a href="../forms/signup.php"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                    <?php endif; ?>
                    <li><a href="../info/help.html"><i class="fa-solid fa-circle-question"></i><span>Help</span></a></li>
                </ul>
                <ul class="partner">
                    <li><a href="../forms/partnerform.php">Partner with us</a></li>
                    <li><a href="../forms/driverform.php">Become a Driver</a></li>
                    <li><a href="../info/about.html">About us</a></li>
                    <li><a href="">Wiki</a></li>
                </ul>
            </div>  
        </nav>

        <!--favourites content shown here if logged in-->
       <?php if($isLoggedIn): ?>
            <main class="orders">
                <h2>Your most Frequently Ordered Restaurants</h2>
                </main>
        <?php else: ?>
            <main>
                <h2>Logged Out</h2>
                <p>Please log in to view your Favourites</p>
            </main>
        <?php endif;?>

    </div>
    <aside id="theme-changer">
        <button id="default"></button><button id="theme2"></button><button id="theme3"></button>
    </aside>

    <script src="../scripts/script.js"></script>
    
</body>
</html>