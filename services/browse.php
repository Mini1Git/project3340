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
    <meta name ="author" content ="Wilson Tran, Liana Bell, Kayden Ions, Nazifa Tahsin">
    <meta name="keywords" content="food, pizza, grillow, delivery, delivery app, app takeout, eating, restaurants, windsor, local foods">
    <meta name = "description" content ="affordable local food delivery service in Windsor">
    <title>Grillow Browse</title>
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/searchStyle.css">
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="layout">
            <header class="header">
                <div style="display:flex; align-items:center; gap:1rem;">
                    <button id="menu-toggle" class="btn btn-outline"><i class="fa-solid fa-bars"></i></button>
                    <h1 class="header-logo-h1">Grillow</h1>
                    <img class="header-icon" src="../icons/logo-pizza.png">
                </div>

                <div>
                    <?php if (!$isLoggedIn): ?> <!--checking logged in or not--> 
                        <a class="btn btn-outline" href="../forms/login.php">Login</a>
                        <a class="btn btn-primary" href="../forms/signup.php">Sign Up</a>
                    <?php else: ?>
                        <a class="btn btn-outline" href="../server/logout.php">Sign Out</a>
                        <a class="btn btn-primary" href="../user/profile.php">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </header>
            <div class="layout-main">
                <aside class="sidebar" id="sidebar">
                    <ul class="nav-list">
                        <li><a class="nav-link" href="../home/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a class="nav-link active" href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i> Browse</a></li>
                    </ul>

                    <ul class="nav-list">
                        <li><a class="nav-link" href="../services/orders.php"><i class="fa-solid fa-receipt"></i> Orders</a></li>
                        <li><a class="nav-link" href="../services/favourites.php"><i class="fa-solid fa-star"></i> Favourites</a></li>
                        <li><a class="nav-link" href="../services/cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
                    </ul>

                    <ul class="nav-list">
                        <li><a class="nav-link" href="../info/help.html"><i class="fa-solid fa-circle-question"></i>Help</a></li>
                        <li><a class="nav-link" href="../info/about.html"><i class="fa-solid fa-circle-info"></i>About</a></li>
                    </ul>

                    <ul class="nav-list">
                        <li><a class="nav-link" href="../forms/partnerform.php">Partner with Us</a></li>
                        <li><a class="nav-link" href="../forms/driverform.php">Become a Driver</a></li>
                        <li><a class="nav-link" href="../info/wiki.html">Wiki</a></li>
                        
                    </ul>
                </aside>
                <aside class="mobile-nav hidden"><!--mobile nav menu-->
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

                </aside>


                <main class="main">
                    <div class="form-parent">
                        <form id="search" autocomplete="off" class="form search-form hero-card" method="GET">
                            <div class="input-field search">
                                <input 
                                    class="text-input" 
                                    type="text" 
                                    name="query" 
                                    id="searchbox"
                                    placeholder="Search for food, restaurants..."
                                >
                                <span class="fa-solid fa-magnifying-glass search-icon"></span>
                            </div>
                            <input class="btn btn-primary long-btn" type="submit" value="Search">
                        </form>
                    </div>
                    <div>
                        <ul class ="searchResults grid grid-3">
                            <!-- this will get info from js -->
                        </ul>
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
        <script type="module" src="../scripts/browse.js"></script>
    </body>
</html>