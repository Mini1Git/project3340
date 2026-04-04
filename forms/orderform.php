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
        <title>Complete your Order</title>
        <!--Main stylsheet for nav, home page, restaurants, orders, and profile-->
        <link rel="stylesheet" href="../stylesheets/style.css">
        <!--Theme stylsheet. Includes all three themes-->
        <link rel="stylesheet" href="../stylesheets/stylealternate.css">
        <link rel="stylesheet" href="../stylesheets/formstyle.css">
        <!-- for the auto complete bar -->
        <link rel="stylesheet" href="../stylesheets/autocomplete_style.css">
        <!--Includes a library of icons-->
        <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
        <script src="../scripts/scriptform.js" defer> </script>
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
                    <a class="btn btn-outline" href="../server/logout.php">Sign Out</a>
                    <a class="btn btn-primary" href="../user/profile.php">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </header>
            <div class="layout-main forms">
                <aside class="sidebar" id="sidebar"> <!--th e regular nav-bar-->
                    <ul class="nav-list">
                        <li><a class="nav-link" href="../home/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a class="nav-link" href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i> Browse</a></li>
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
                        <li><a class="nav-link active" href="../forms/partnerform.php">Partner with Us</a></li>
                        <li><a class="nav-link" href="../forms/driverform.php">Become a Driver</a></li>
                        <li><a class="nav-link" href="../info/wiki.html">Wiki</a></li>  
                    </ul>
                </aside>
                <aside class="mobile-nav hidden"> <!--the mobile nav bar-->
                    <ul class="nav-list">
                        <li><a class="nav-link active" href="../home/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li><a class="nav-link" href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i> Browse</a></li>
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

                <div class="main">
                    <div class="formparent">
                        <form id ="order" class="form" action="order_success.php" method="POST"> <!-- action redirect: go to page that says thanks for order, or maybe go to orders page? -->
                            <h2 class="form-title">Place Your Order</h2>
                            
                            <div class="form-main">
                                <h3 class="form-title">Payment Information</h3> <!--payment information-->
                                <div class="input-field">
                                    <label class="label">
                                        Billing Address
                                    </label>
                                    <input class="text-input" type="text" name="delivery_address" id="address" placeholder="Enter your billing address here" required>
                                </div>
                                <div class="input-field">
                                    <label class="label" for="card-num">
                                        Card Number
                                    </label>
                                    <input class="text-input" type="text" name="card-num" id="card-num" placeholder="Enter your card Number" required>
                                </div>
                                <div class="input-field">
                                    <label class="label" for="exp-date">
                                        Expiration
                                    </label>
                                    <input class="text-input" type="month" name="exp-date" id="exp-date" placeholder="yyyy/mm" required>
                                </div>  
                                <div class="input-field">
                                    <label class="label" for="seq">
                                        Security Code
                                    </label>
                                    <input class="text-input" type="text" id="seq" placeholder="Security Code">
                                </div>
                                
                            </div>
                            <div class="show-total">
                                <!--from js-->
                            </div>
                            <div class="input-field">
                                <input class="btn btn-primary long-btn" type="submit" value="Place Order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--End of content div-->
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
        <!--Script to control hamburger interactivity on both mobile and desktop-->
        <script src="../scripts/script.js"></script>
        <script type = "module" src = "../scripts/placeOrder.js"></script>
        <!-- gotta add type = module because orderScript is using import -->
    </body>
</html>