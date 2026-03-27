<?php
    // Start the session to access the superglobal array
    session_start();
    // If the user_id value is set within the $_SESSION array, then the user is logged in, otherwise not
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--List of meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Our icon we chose-->
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Grillow Partner Registration</title>
    <!--Main stylsheet for nav, home page, restaurants, orders, and profile-->
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--Theme stylsheet. Includes all three themes-->
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <!--Stylesheet specific for screen sizes > 768 pixels and < 1023 px-->
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
    <!--Stylesheet for screen sizes < 768 pixels-->
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">

    <link rel="stylesheet" href="../stylesheets/formstyle.css">
    <!--Includes a library of icons-->
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
    <script src="../scripts/scriptform.js" defer> </script>
</head>
<body>
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
             <a class="account-btn-bold" href="../server/logout.php">Sign Out</a>
            <a class="profile-settings" href="../user/profile.php"><i class="fa-solid fa-circle-user"></i></a>
        </div>
    </header>
    <!--End of header, beginning of side menu-->
    <!--Content div includes side nav menu-->
    <div class="content">
        <nav> <!--navigation bar-->
            <div class="offscreen-menu">
                <!--A list of services, these will redirect depending on login status-->
                <ul class="services">
                    <li><a href="../home/index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                    <li><a href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                    <li><a href="../services/orders.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                    <li><a href="../services/favourites.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                    <li><a href="../services/cart.php"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                    <li><a href="../info/help.html"><i class="fa-solid fa-circle-question"></i><span>Help</span></a></li>
                </ul>
                <!--A list of other forms and a website wiki-->
                <ul class="partner">
                    <li><a href="partnerform.php">Partner with us</a></li>
                    <li><a href="driverform.php">Become a Driver</a></li>
                    <li><a href="../info/about.html">About us</a></li>
                    <li><a href="">Wiki</a></li>
                </ul>
            </div>
        </nav>
        <!--End of navigation bar-->

        <div class="formparent">
            <form class="orderForm" action = "" method="POST">
                <h2>Place Your Order</h2>
                <div class="autocomplete">
                        <input type="text" name="delivery_address" id="address" placeholder="Address" required>
                </div>
                <h3>Payment Information</h3> <!--payment information-->
                <label class="payment" for="card-num">
                    Card Number
                </label>
                <input type="text" id="card-num" placeholder="Card Number" required>
                <label class="payment" for="exp-date">
                    Expiration
                </label>
                <input type="month" id="exp-date" placeholder="yyyy/mm" required>
                
                <label class="payment" for="seq">
                    Security Code 
                </label>
                    <input type ="text" id="seq" placeholder="Security Code">
                <div class="show-total">
                    <!--from js-->
                </div>

                <input type="submit" value="Place Order">
            </form>
        </div>

    </div>
    <!--End of content div-->
    <aside id="theme-changer">
        <button id="default"></button><button id="theme2"></button><button id="theme3"></button>
    </aside>
    <!--Script to control hamburger interactivity on both mobile and desktop-->
    <script src="../scripts/script.js"></script>
    
</body>
</html>