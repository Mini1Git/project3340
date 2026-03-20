<?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--List of meta tags for SEO-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Grillow Driver Registration</title>
    <!--Main stylsheet for nav, home page, restaurants, orders, and profile-->
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--Theme stylsheet. Includes all three themes-->
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <!--Stylesheet specific for screen sizes > 768 pixels and < 1023 px-->
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
    <!--Stylesheet for screen sizes < 768 pixels-->
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">
    <!--Stylesheet specific to form elements-->
    <link rel="stylesheet" href="../stylesheets/formstyle.css">
    <!--Include a library of icons-->
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Start of horizontal nav-->
    <header>
        <!--Logo and hamburger place in the logo-menu class-->
        <div class="logo-menu">
            <!--Hamburger div which includes the hamburger icon svg-->
            <div class="ham">
                <img src="../icons/hamburger.svg">
            </div>
            <!--Logo consisting of an image inside of the h1 tag-->
            <h1><img src="../icons/logo-pizza.png" alt="rushing pizza logo"> Grillow</h1>
        </div>
        <!--Account controls-->
        <div class="log">
            <!--Login button-->
            <a class="account-btn" href="login.php">Login</a>
            <!--Sign up button-->
            <a class="account-btn-bold" href="signup.php">Sign Up</a>
        </div>
    </header>
    <!--End of horizontal nav-->
    <!--Beginning of content divider-->
    <div class="content">
        <nav> <!--navigation bar-->
            <div class="offscreen-menu">
            <ul class="services">
                <li><a href="../index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                <li><a href="../services/services/browse.html"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                <li><a href="../services/orders.html"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                <li><a href="../services/favorites.html"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                <li><a href="../services/cart.html"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                <li><a href="../info/help.html"><i class="fa-solid fa-circle-question"></i><span>Help</span></a></li>
            </ul>
            <ul class="partner">
                <li><a href="partnerform.html">Partner with us</a></li>
                <li id="on-page"><a href="driverform.html">Become a Driver</a></li>
                <li><a href="../info/about.html">About us</a></li>
            </ul>
            </div>
        </nav>

        <!-- driver form and content -->
         <div class="driverform">
            <form class = "driver-form" action="submit_driver_form.php" method="post">
                <h2> Sorry, we are not currently accepting new drivers.</h2>
                <p>Enter your email address and resume, and we'll contact you when we are hiring drivers!</p>    
                <label>
                    <input type="email" name="email" placeholder="Email" autocomplete="email" required>
                </label>

                <input type = "file" name="resume" accept=".pdf,.doc,.docx" required>

                <input type="submit" value="Submit">
            </form>
         </div>
    </div>
    <aside id="theme-changer">
        <button id="default"></button><button id="theme2"></button><button id="theme3"></button>
    </aside>

    <script src="../scripts/script.js"></script>
    
</body>
</html>