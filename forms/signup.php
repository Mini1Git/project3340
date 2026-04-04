<?php
    // Start the session to access the superglobal array
    session_start();
    // If the user_id value is set within the $_SESSION array, then the user is logged in, otherwise not
    $isLoggedIn = isset($_SESSION['user_id']);
    // If the user is logged in a trying to get to the register page, they will be redirected to their profile page
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
    <title>Sign Up</title>
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
    <div class="layout forms">
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
                        //person icon for profile button link
                        <i class="fa-solid fa-user"></i>
                    </a>
                <?php endif; ?>
            </div>
        </header>

        <div class="layout-main">
            <!-- SIDEBAR -->
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
            <!--End of navigation bar-->
            <!--Parent element of a corresponding form-->
            <main class="main">
                <div class="formparent">
                <!--Form will use the POST method and process that information in the process_login PHP file-->
                    <form class="form" method="POST" action="../server/process_signup.php">
                        <!--Form title-->
                        <div class="form-title"><i class="fa-solid fa-circle-user"></i><h2>Create an Account</h2></div>
                            <!--Div for fullname input-->
                        <div class="form-main">
                            <div class="input-field">
                                <label class="label" for="username">Full Name</label>
                                <input class="text-input" type="text" name="username" id="username" placeholder="Enter your full name here" autocomplete="name" required>
                            </div>
                            <!--Div for phone number input-->
                            <div class="input-field">
                                <label class="label" for="phone-num">Phone Number</label>
                                <input class="text-input" type="tel" name="phone-num" id="phone-num" placeholder="Enter your phone number" minlength="10" maxlength="13" required>
                            </div>
                            <!--Div for email input-->
                            <div class="input-field">
                                <label class="label" for="email">Email Address</label>
                                <input class="text-input" type="email" name="email" id="email" placeholder="Enter your email" autocomplete="email" required>
                            </div>
                            <!--Div for password input, includes an interactive eye to show/hide password-->
                            <div class="pass input-field">
                                <label class="label" for="password">Password</label>
                                <input class="password text-input" class="password" name="password" id="password" type="password" minlength=10 placeholder="Enter your password" required>
                                <span class="eye fa-solid fa-eye"></span> <!--to add the eye icon-->
                            </div>

                            <!--error message for wrong password format-->
                            <?php if (isset($_GET['error'])): ?>
                                <div style="color: #721c24; background-color: #ecd5d7; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 1rem; border-radius: 25px; text-align: center;">
                                <i class="fa-solid fa-circle-xmark"></i>
                                    <?php 
                                    //if the error is that the format of the password is not following the rules
                                        if ($_GET['error'] == "format_password") {
                                            echo "Password must be at least 10 characters, include uppercase letters, lowercase letters, a number, and a symbol.";
                                        }
                                    ?>
                                </div>
                            <?php endif; ?>

                        </div>
                        <!--Button to submit register information-->
                        <div class="input-field">
                            <input class="btn btn-primary long-btn" type="submit" value="Register">
                            <p style="text-align:center; margin-top: 1rem;">Already have an account? <a class="link" href="../forms/login.php">Sign In</a><p>
                        </div>
                    </form>
                </div>
            </main>
            
        <!--End of form-->
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
    <!--End of content div-->
    <!--Script to control hamburger interactivity on both mobile and desktop-->
    <script src="../scripts/script.js"></script>
    
</body>
</html>