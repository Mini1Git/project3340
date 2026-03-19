<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grillow</title>
    <link rel="icon" type="image/x-icon" href="icons/favicon.ico">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/stylealternate.css">
    <link rel="stylesheet" href="stylesheets/styletablet.css">
    <link rel="stylesheet" href="stylesheets/stylemobile.css">
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="logo-menu">
            <div class="ham">
                <img src="icons/hamburger.svg">
            </div>
            <h1><img src="icons/logo-pizza.png" alt="rushing pizza logo"> Grillow</h1>
        </div>
        <div class="log">
            <a class="account-btn" href="forms/login.php">Login</a>
            <a class="account-btn-bold" href="forms/signup.php">Sign Up</a>
        </div>
    </header>
    <div class="content">
        <nav> <!--navigation bar-->
            <div class="offscreen-menu">
            <ul class="services">
                <li id="on-page"><a href="index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                <li><a href="services/browse.html"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                <li><a href="services/orders.html"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                <li><a href="services/favorites.html"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                <li><a href="services/cart.html"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                <li><a href="info/help.html"><i class="fa-solid fa-circle-question"></i><span>Help</span></a></li>
            </ul>
            <ul class="partner">
                <li><a href="forms/partnerform.html">Partner with us</a></li>
                <li><a href="forms/driverform.html">Become a Driver</a></li>
                <li><a href="info/about.html">About us</a></li>
            </ul>
            </div>
        </nav>

        <main>
            <section class="jumbotron">
                <div class="overlay">
                    <div class="container">
                        <h2>Welcome to Windsor's Official Delivery App </h2>
                        <p>
                            Support Windsor's most affordable food delivery service and enjoy 
                            the finest cultural cuisines made by small businesses across the city.
                        </p>
                        <a href="#">Explore</a>
                    </div>
                </div>
            </section>
            <section class="restaurant">
                <!--these will come dynamically-->
            </section>
        </main>
    </div>
    <aside id="theme-changer">
        <button id="default"></button><button id="theme2"></button><button id="theme3"></button>
    </aside>
    <script src="scripts/script.js"></script>
    <script src="scripts/restaurantScript.js"></script>
</body>
</html>