<?php 
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: ../forms/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grillow Profile Information</title>
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">
    <link rel="stylesheet" href="../stylesheets/styleprofile.css">
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
            <a class="account-btn-bold" href="../server/logout.php">Sign Out</a>
            <a class="profile-settings" href="../user/profile.php"><i class="fa-solid fa-circle-user"></i></a>
        </div>
    </header>
    <div class="content">
        <nav> <!--navigation bar-->
            <div class="offscreen-menu">
                <ul class="services">
                    <li id="on-page"><a href="../home/index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                    <li><a href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i><span>Browse</span></a></li>
                    <li><a href="../services/orders.php"><i class="fa-solid fa-receipt"></i><span>Orders</span></a></li>
                    <li><a href="../services/favourites.php"><i class="fa-solid fa-star"></i><span>Favourites</span></a></li>
                    <li><a href="../services/cart.php"><i class="fa-solid fa-cart-shopping"></i><span>Cart</span></a></li>
                    <li><a href="../info/help.html"><i class="fa-solid fa-circle-question"></i><span>Help</span></a></li>
                </ul>
                <ul class="partner">
                    <li><a href="../forms/partnerform.php">Partner with us</a></li>
                    <li><a href="../forms/driverform.php">Become a Driver</a></li>
                    <li><a href="../info/about.html">About us</a></li>
                    <li><a href="">Wiki</a></li>
                </ul>
            </div>  
        </nav>

        <main class="profile-container">
            <section class="profile-grid">
                <!-- Account Info -->
                <div class="profile-card" id="account-card">
                    <h3>Account Info</h3>
                    <p><strong>Name:</strong> <span id="profile-name"></span></p>
                    <p><strong>Email:</strong> <span id="profile-email"></span></p>
                    <p><strong>Phone:</strong> <span id="profile-phone"></span></p>
                </div>

                <!-- Address -->
                <div class="profile-card" id="address-card">
                    <h3>Address</h3>

                    <div class="autocomplete">
                        <input type="text" name="profile-address" id="profile-address" autocomplete="off">
                    </div>

                    <button id="save-address-btn">Save</button>
                </div>

                <!-- Stats -->
                <div class="profile-card" id="stats-card">
                    <h3>Your Activity</h3>
                    <div class="profile-stats">
                        <div>
                            <h4 id="stat-orders">0</h4>
                            <p>Orders</p>
                        </div>
                        <div>
                            <h4 id="stat-spent">$0</h4>
                            <p>Spent</p>
                        </div>
                    </div>
                </div>

                <!-- Placeholder for future JS -->
                <div class="profile-card" id="extra-card">
                    <h3>More</h3>
                    <p id="extra-info">Coming soon...</p>
                </div>

            </section>

        </main>
    </div>
    <aside id="theme-changer">
        <button id="default"></button><button id="theme2"></button><button id="theme3"></button>
    </aside>
    <script src="../scripts/script.js"></script>
    <script src="../scripts/profileScript.js"></script>
</body>
</html>