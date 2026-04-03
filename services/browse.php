<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Grillow Browse</title>
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">
    <link rel="stylesheet" href="../stylesheets/searchStyle.css">
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
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
            <a class="profile-settings"><i class="fa-solid fa-circle-user"></i></a>
        <?php endif; ?>
    </div>
</header>
<div class="content">
    <nav> <!--navigation bar-->
        <div class="offscreen-menu">
            <ul class="services">
                <li><a href="../index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                <li id="on-page"><a href="browse.php"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                <?php if ($isLoggedIn): ?>
                    <li><a href="orders.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                    <li><a href="favourites.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
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
            </ul>
        </div>
    </nav>

    <main>
        <form id="search" autocomplete="off">
            <input type="text" method = "get" id="searchbox" name="query" placeholder="Search for food items, restaurants, etc.">
            <!-- <i class="fa-solid fa-magnifying-glass" id="glass"></i> -->
            <input type="submit">
        </form>
        <div>
            <ul class ="searchResults">
                <!-- this will get info from js -->
            </ul>

        </div>
    </main>
</div>

                    <ul class="nav-list">
                        <li><a class="nav-link" href="../forms/partnerform.php">Partner with Us</a></li>
                        <li><a class="nav-link" href="../forms/driverform.php">Become a Driver</a></li>
                        <li><a class="nav-link" href="../info/wiki.html">Wiki</a></li>
                        
                    </ul>
                </aside>
                <aside class="mobile-nav hidden">
                    <ul class="nav-list">
                        <li><a class="nav-link" href="../home/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a class="nav-link active" href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i> Browse</a></li>
                        <li><a class="nav-link" href="../services/orders.php"><i class="fa-solid fa-receipt"></i> Orders</a></li>
                        <li><a class="nav-link" href="../services/favourites.php"><i class="fa-solid fa-star"></i> Favourites</a></li>
                        <li><a class="nav-link" href="../services/cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
                        <li><a class="nav-link" href="../info/help.html"><i class="fa-solid fa-circle-question"></i>Help</a></li>
                        <li><a class="nav-link" href="../info/about.html"><i class="fa-solid fa-circle-info"></i>About</a></li>
                        <li><a class="nav-link" href="../forms/partnerform.php">Partner with Us</a></li>
                        <li><a class="nav-link" href="../forms/driverform.php">Become a Driver</a></li>
                        <li><a class="nav-link" href="../info/wiki.html">Wiki</a></li> 
                    </ul>

<script src="../scripts/script.js"></script>
<script src = "../server/browseBackend.php"></script>
<script type = "module" src = "../scripts/browse.js"></script>
</body>

                <main class="main">
                    <div class="form-parent">
                        <form class="form search-form hero-card" method="GET">
                            <div class="input-field search">
                                <input 
                                    class="text-input" 
                                    type="text" 
                                    name="q" 
                                    placeholder="Search for food, restaurants..."
                                >
                                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                            </div>
                            <input class="btn btn-primary long-btn" type="submit" value="Search">
                        </form>
                    </div>
                    <div class="browse-cat">
                    
                    </div>
                </main>
        
            </div>
        </div>
    
        <aside class="settings-menu-btn">
            <i class="fa-solid fa-gear"></i>
        </aside>
        <div class="settings-menu-window hidden">
            <div class="settings-menu-content">
                <div class="settings-menu-label">
                    <p>Settings<p>
                    <i class="fa-solid fa-x btn btn-primary"></i>
                </div>
                <h3>Theme</h3>
                <div class="theme-options">
                    <button class="theme-btn" data-theme="">Default</button>
                    <button class="theme-btn" data-theme="theme2">Dark</button>
                    <button class="theme-btn" data-theme="theme3">Blue</button>
                </div>
            </div>
        </div>
        <script src="../scripts/script.js"></script>   
    
    </body>
</html>