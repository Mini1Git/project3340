<?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: ../forms/login.php");
        exit();
    }

    // dsatabase connection
    $host = "localhost";
    $dbName = "grillow";
    $dbUser = "root";
    $dbPass = "";

    try{
        //connect to db
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        //tell us if error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //get user's ID
        $user_id = $_SESSION['user_id'];

        //connect to db
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        //tell us if error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //get user's ID
        $user_id = $_SESSION['user_id'];

        //find user info
        $userStmt = $pdo->prepare("SELECT name, email, phone_number, address FROM Customer WHERE user_id = :id");
        $userStmt->execute(['id' => $user_id]);

        //save result into $userData array
        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

        $userRestaurantStmt = $pdo->prepare("SELECT * FROM restaurant_vendor WHERE admin = :id");
        $userRestaurantStmt->bindValue(":id", $user_id);
        $userRestaurantStmt->execute();
        $userRestaurant = $userRestaurantStmt->fetch(PDO::FETCH_ASSOC);

        $hasRestaurant = $userRestaurant !== false;

        if ($hasRestaurant) {
            header("Location: ../user/profile.php");
            exit();
        }
    }
    catch(PDOException $e) {
        // the connection fails, stop the page and show the error.
        die("Connection failed: " . $e->getMessage());
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
    <title>Partner Registration</title>
    <!--Main stylsheet for nav, home page, restaurants, orders, and profile-->
    <link rel="stylesheet" href="../stylesheets/style.css">
    <!--Theme stylsheet. Includes all three themes-->
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">

    <link rel="stylesheet" href="../stylesheets/formStyle.css">
    <!--Includes a library of icons-->
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
        <div class="layout-main forms">
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
                    <li><a class="nav-link active" href="../forms/partnerform.php">Partner with Us</a></li>
                    <li><a class="nav-link" href="../forms/driverform.php">Become a Driver</a></li>
                    <li><a class="nav-link" href="../info/wiki.html">Wiki</a></li>  
                </ul>
            </aside>
            <aside class="mobile-nav hidden ">
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
                    <form class="form" action = "../server/registerRestaurantBackend.php" method="POST">
                        <h2 class="form-title"><i class="fa-solid fa-circle-user"></i>Register your restaurant</h2>
                        <div class="form-main">
                            <div class="input-field">
                                <label class="label" for="restaurant_name">Restaurant Name</label>
                                <input class="text-input" type="text" name="restaurant_name" id="restaurant_name" placeholder="Enter the name of your restaurant" required>
                            </div>
                            <div class="input-field">
                                <label class="label" for="cuisine_type">Cuisine Type</label>
                                <input class="text-input" type="text" name="cuisine_type" id="cuisine_type" placeholder="Enter your restaurants cuisine type" required>
                            </div>
                            <div class="input-field">
                                <label class="label" for="restaurant_email">Email Address</label>
                                <input class="text-input" type="email" name="restaurant_email" id="restaurant_email" placeholder="Enter the email you will use for your restaurant" required>
                            </div>
                            <div class="input-field">
                                <label class="label" for="restaurant_number">Phone Number</label>
                                <input class="text-input" type="tel" name="restaurant_number" id="restaurant_number" placeholder="Enter the phone number you will use for your restaurant" minlength="9" maxlength="15">
                            </div>
                            <div class="input-field">
                                <label class="label" for="restaurant_address">Address</label>
                                <input class="text-input" type="text" name="restaurant_address" id="restaurant_address" placeholder="Enter the restaurant's address" required>
                            </div>
                        </div>
                        
                        <div class="input-field">
                            <input class="btn btn-primary long-btn" type="submit" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End of navigation bar-->

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
    <!--Script to control hamburger interactivity on both mobile and desktop-->
    <script src="../scripts/script.js"></script>
    
</body>
</html>