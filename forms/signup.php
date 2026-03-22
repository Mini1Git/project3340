<?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);

    if ($isLoggedIn) {
        header("Location: ../user/profile.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Grillow Sign In</title>
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
    <link rel="stylesheet" href="../stylesheets/formstyle.css">
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">
    <script src="../scripts/scriptform.js" defer></script>
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
</head>
<body class="auth">
    <header>
        <div class="logo-menu">
            <div class="ham">
                <img src="../icons/hamburger.svg">
            </div>
            <h1><img src="../icons/logo-pizza.png" alt="rushing pizza logo"> Grillow</h1>
        </div>
        <div class="log">
            <?php if (!$isLoggedIn): ?>
                <a class="account-btn" href="login.php">Login</a>
                <a class="account-btn-bold" href="signup.php">Sign Up</a>
            <?php else: ?>
                <a class="account-btn-bold" href="../server/logout.php">Sign Out</a>
                <a class="profile-settings"><i class="fa-solid fa-circle-user"></i></a>
            <?php endif; ?>
        </div>
    </header>

    <div class="content">
        <nav> <!--navigation bar-->
            <div class="offscreen-menu">
                <ul class="services">
                    <li id="on-page"><a href="../index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                    <li><a href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                    <?php if ($isLoggedIn): ?>
                        <li><a href="../services/orders.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                        <li><a href="../services/favorites.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                        <li><a href="../services/cart.php"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                    <?php else: ?>
                        <li><a href="signup.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                        <li><a href="signup.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                        <li><a href="signup.php"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                    <?php endif; ?>
                    <li><a href="../info/help.html"><i class="fa-solid fa-circle-question"></i><span>Help</span></a></li>
                </ul>
                <ul class="partner">
                    <li><a href="partnerform.php">Partner with us</a></li>
                    <li><a href="driverform.php">Become a Driver</a></li>
                    <li><a href="../info/about.html">About us</a></li>
                </ul>
            </div>  
        </nav>
        <div class="formparent">
        <form class="register" method="POST" action="process_signup.php">
            <h2>Create An Account</h2>
            <div>
                <input type="text" name="username" placeholder="Full Name" autocomplete="name" required>
            </div>
            <div>
                <input type="tel" name="phone-num" placeholder="Phone" minlength="10" maxlength="13" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" autocomplete="email" required>
            </div>
            <div class="pass">
                <input class="password" name="password" type="password" minlength=10 placeholder="Password" required>
                <span class="eye"></span> <!--to add the eye icon-->
            </div>

            <input type="submit" value="Register">

        </form>
        </div>
    </div>
    <aside id="theme-changer">
        <button id="default"></button><button id="theme2"></button><button id="theme3"></button>
    </aside>

        <script src="../scripts/script.js"></script>
    
</body>
</html>