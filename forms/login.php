<?php
    // Start the session to access the superglobal array
    session_start();
    // If the user_id value is set within the $_SESSION array, then the user is logged in, otherwise not
    $isLoggedIn = isset($_SESSION['user_id']);
    // If the user is logged in a trying to get to the login page, they will be redirected to their profile page
    // This is to prevent the user from trying to login again
    if ($isLoggedIn) {
        header("Location: ../user/profile.php");
        exit();
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--List of meta tags for SEO-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Our icon we chose-->
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Grillow Login</title>
    <!--Main stylsheet for nav, home page, restaurants, orders, and profile-->
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--Theme stylsheet. Includes all three themes-->
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <!--Stylesheet specific for screen sizes > 768 pixels and < 1023 px-->
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
    <!--Stylesheet specific to form elements-->
    <link rel="stylesheet" href="../stylesheets/formStyle.css">
    <!--Stylesheet for screen sizes < 768 pixels-->
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">
    <!--Script for the show/hide password field-->
    <script src="../scripts/scriptform.js" defer></script>
    <!--Includes a library of icons-->
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
</head>
<!--Applying the auth class to the body provides a different style to form pages.
between the background and navigation menu.-->
<body class="auth">
    <!--Header with hamburger, logo, and account buttons based on user sigin-->
    <header>
        <div class="logo-menu">
            <!--Hamburger div-->
            <div class="ham">
                <!--Hamburger image-->
                <img src="../icons/hamburger.svg">
            </div>
            <!--Pizza icon and logo-->
            <h1><img src="../icons/logo-pizza.png" alt="rushing pizza logo"> Grillow</h1>
        </div>
        <!--Account controls-->
        <div class="log">
            <!--Anchor tags to login and sign up pages-->
            <a class="account-btn" href="../forms/login.php">Login</a>
            <a class="account-btn-bold" href="../forms/signup.php">Sign Up</a>
        </div>
    </header>
    <!--End of header, beginning of side menu-->
    <!--Content div includes side nav menu-->
    <div class="content">
        <nav> <!--navigation bar-->
            <div class="offscreen-menu">
                <!--A list of services, these will redirect depending on login status-->
                <ul class="services">
                    <li id="on-page"><a href="../home/index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                    <li><a href="browse.php"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                    <li><a href="orders.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                    <li><a href="favourites.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                    <li><a href="../info/help.html"><i class="fa-solid fa-circle-question"></i><span>Help</span></a></li>
                </ul>
                <!--A list of other forms and a website wiki-->
                <ul class="partner">
                    <li><a href="../forms/partnerform.php">Partner with us</a></li>
                    <li><a href="../forms/driverform.php">Become a Driver</a></li>
                    <li><a href="../info/about.html">About us</a></li>
                    <li><a href="../info/wiki.html">Wiki</a></li>
                </ul>
            </div>  
        </nav>
        <!--End of navigation bar-->
        <!--Parent element of a corresponding form-->
        <div class="formparent">
            <!--Form will use the POST method and process that information in the process_login PHP file-->
            <form class="login" method="POST" action="../server/process_login.php">
                <!--Form title-->
                <h2>Login</h2>
                <!--Div for email input-->
                <div>
                    <input type="email" name="email" placeholder="Email" autocomplete="email" required>
                </div>
                <!--Div for password input, includes an interactive eye to show/hide password-->
                <div class="pass">
                    <input class="password" type="password" placeholder="Password" name="password" required>
                    <span class="eye"></span> <!--to add the eye icon-->
                </div>
                <!--Link to a page in case you forgot your password-->    
                <a href="">Forgot your password?</a>
                <!--Button to submit login information-->
                <input type="submit" value="Login">
            </form>
        </div>
        <!--End of form-->
    </div>
    <!--End of content div-->
    
    <aside id="theme-changer">
        <button id="default"></button><button id="theme2"></button><button id="theme3"></button>
    </aside>
    <!--Script to control hamburger interactivity on both mobile and desktop-->
    <script src="../scripts/script.js"></script>
</body>
</html>