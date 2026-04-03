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
    <title>Login</title>
    <!--Main stylsheet for nav, home page, restaurants, orders, and profile-->
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--Theme stylsheet. Includes all three themes-->
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <!--Stylesheet specific to form elements-->
    <link rel="stylesheet" href="../stylesheets/formStyle.css">
    <!--Script for the show/hide password field-->
    <script src="../scripts/scriptform.js" defer></script>
    <!--Includes a library of icons-->
    <script src="https://kit.fontawesome.com/7d8aa418e1.js" crossorigin="anonymous"></script>
</head>
<!--Applying the auth class to the body provides a different style to form pages.
between the background and navigation menu.-->
<body>
    <!--Header with hamburger, logo, and account buttons based on user sigin-->
    <div class="layout">
        <!-- HEADER -->
        <header class="header">
            <div style="display:flex; align-items:center; gap:1rem;">
                <button id="menu-toggle" class="btn btn-outline"><i class="fa-solid fa-bars"></i></button>
                <h1 class="header-logo-h1">Grillow</h1>
                <img class="header-icon" src="../icons/logo-pizza.png">
            </div>

            <div>
                <?php if (!$isLoggedIn): ?>
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
        <!--End of navigation bar-->
        <!--Parent element of a corresponding form-->
        <div class="layout-main forms">
            <aside class="sidebar" id="sidebar">
                <ul class="nav-list">
                    <li><a class="nav-link active" href="../home/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
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
                    <li><a class="nav-link" href="../forms/driverform.php">Become a Driver</a></li>
                    <li><a class="nav-link" href="../info/wiki.html">Wiki</a></li>  
                </ul>
            </aside>
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

            <main class="main"> 
                <div class="formparent">
                    <!--Form will use the POST method and process that information in the process_login PHP file-->
                    <form class="form" method="POST" action="../server/process_login.php">
                        <!--Form title-->
                        <div class="form-title"><i class="fa-solid fa-circle-user"></i><h2>Sign In to Grillow</h2></div>
                        <!--Div for email input-->
                        <div class="form-main">
                            <div class="input-field">
                                <label class="label" for="email">Email Address</label>
                                <input class="text-input" id="email" type="email" name="email" placeholder="Enter your email here" autocomplete="email" required>
                            </div>
                            <!--Div for password input, includes an interactive eye to show/hide password-->
                            <div class="pass input-field">
                                <label class="label" for="password">Password<a class="link" href="#">Forgot your password?</a></label>
                                <input class="password text-input" id="password" type="password" placeholder="Enter your password" name="password" required>
                                <span class="eye fa-solid fa-eye"></span> <!--to add the eye icon-->
                                
                            </div>
                        
                        <!--Link to a page in case you forgot your password-->    
                        </div>
                        <!--Button to submit login information-->
                        <div class="input-field">
                            <input class="btn btn-primary long-btn" type="submit" value="Login">
                            <p style="text-align:center; margin-top: 1rem;">New to Grillow? <a class="link" href="../forms/signup.php">Create an Account</a><p>
                        </div>
                    </form>
                    
                </div>
            </main>

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
</body>
</html>