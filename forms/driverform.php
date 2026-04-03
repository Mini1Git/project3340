<?php
    // Start the session to access the superglobal array
    session_start();
    // If the user_id value is set within the $_SESSION array, then the user is logged in, otherwise not
    $isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--List of meta tags for SEO-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Our icon we chose-->
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <title>Driver Registration</title>
    <!--Main stylsheet for nav, home page, restaurants, orders, and profile-->
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--Theme stylsheet. Includes all three themes-->
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <!--Stylesheet specific to form elements-->
    <link rel="stylesheet" href="../stylesheets/formStyle.css">
    <!--Includes a library of icons-->
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Beginning of container of class layout.
    Layout provides us with a good starting point.
    Needed to stack the header on top of the rest of the content -->
    <div class="layout">
        <!--Header is of class header. This class provides us with a horizontal
        bar at the top of the screen with account controls and company logo-->
        <header class="header">
            <!--Div containing the logo, company name, and the hamburger button for the sidebar and mobile nav-->
            <div style="display:flex; align-items:center; gap:1rem;">
                <!--Hamburger button-->
                <button id="menu-toggle" class="btn btn-outline"><i class="fa-solid fa-bars"></i></button>
                <!--Company name, h1-->
                <h1 class="header-logo-h1">Grillow</h1>
                <!--Our rushing pizza logo-->
                <img class="header-icon" src="../icons/logo-pizza.png">
            </div>
            <!--On the other side of the nav with space in between the two divs are the account controls-->
            <div>
                <!--If there isn't anyone logged in, display the login and sign up buttons, otherwise, display the profile
                and sign out buttons-->
                <?php if (!$isLoggedIn): ?>
                    <!--Login button-->
                    <a class="btn btn-outline" href="../forms/login.php">Login</a>
                    <!--Sign up button-->
                    <a class="btn btn-primary" href="../forms/signup.php">Sign Up</a>
                <?php else: ?>
                    <!--Sign out button-->
                    <a class="btn btn-outline" href="../server/logout.php">Sign Out</a>
                    <!--Profile button with user icon-->
                    <a class="btn btn-primary" href="../user/profile.php">
                        <i class="fa-solid fa-user"></i>
                    </a>
                <?php endif; ?>
            </div>

        </header>
        <!--End of top header-->
        <!--layout main container with a forms class.
        Layout main is used so display the navbar inline with the main content.
        Forms is used to specify whether the content consists of a form and apply the correct styling-->
        <div class="layout-main forms">
            <!--Desktop sidebar. Will be utilized until the screen-width is lower than or equal to 768px-->
            <aside class="sidebar" id="sidebar">
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
                    <li><a class="nav-link" href="../forms/partnerform.php">Partner with Us</a></li>
                    <li><a class="nav-link  active" href="../forms/driverform.php">Become a Driver</a></li>
                    <li><a class="nav-link" href="../info/wiki.html">Wiki</a></li>  
                </ul>
            </aside>
            <!--Desktop sidebar. Will be utilized when the screen-width is lower than or equal to 768px. Above this threshold,
            this element is not displayed-->
            <aside class="mobile-nav hidden">
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
                    <form class="form" method="post">
                        <h2 class="form-title"> Sorry, we are not currently accepting new drivers.</h2>
                        <!--Email input field-->
                        <div class="form-main">
                            <div class="input-field">
                                <label class="label" for="email">Enter your email so we can contact you</label>
                                <input class="text-input" type="email" id="email" name="email" placeholder="Email" autocomplete="email" required>
                            </div>
                            <div class="input-field">
                                <label class="label" for="resume">Upload resume</label>
                                <!--Resume input field. Accepts pdf, doc, and docx files-->
                                <input class="btn btn-primary long-btn" type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" required>
                            </div>
                        </div>
                        <div class="input-field">
                            <!--Button to submit information-->
                            <input class="btn btn-primary long-btn" type="submit" value="Submit">
                        </div>
                    </form>
                </div>
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
    </div>
    
    <!--Script to control hamburger interactivity on both mobile and desktop-->
    <script src="../scripts/script.js"></script>
    
</body>
</html>