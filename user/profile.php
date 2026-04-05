<?php 
    require_once __DIR__ . '/../config.php';
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: ../forms/login.php");
        exit();
    }

    function formatPhoneNum($phoneNumberString) {
        // Remove all non-digits
        $cleaned = preg_replace('/\D/', '', $phoneNumberString);

        // Match 10-digit format
        if (preg_match('/^(\d{3})(\d{3})(\d{4})$/', $cleaned, $matches)) {
            return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
        }

        // Return original if it doesn't match
        return $phoneNumberString;
    }

    try{
        //connect to db
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        //tell us if error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //get user's ID
        $user_id = $_SESSION['user_id'];

        //find user info
        $userStmt = $pdo->prepare("SELECT name, email, phone_number, address, role, is_disabled FROM Customer WHERE user_id = :id");
        $userStmt->execute(['id' => $user_id]);

        //save result into $userData array
        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

        //count the ordersand add up the sum total prices
        $statsStmt = $pdo->prepare("SELECT COUNT(order_id) as total_orders, SUM(total_price) as total_spent FROM Customer_order WHERE customer_id = :id");
        $statsStmt->execute(['id' => $user_id]);

        //save result in statsData array
        $statsData = $statsStmt->fetch(PDO::FETCH_ASSOC);

        //if nothing say 0
        $totalOrders = $statsData['total_orders'] ?? 0;

        //two deciaml places
        $totalSpent = number_format($statsData['total_spent'] ?? 0, 2);

        $userRestaurantStmt = $pdo->prepare("SELECT * FROM restaurant_vendor WHERE admin_id = :id");
        $userRestaurantStmt->bindValue(":id", $user_id);
        $userRestaurantStmt->execute();
        $userRestaurant = $userRestaurantStmt->fetch(PDO::FETCH_ASSOC);

        $hasRestaurant = $userRestaurant !== false;

        $isAdmin = (isset($userData["role"]) && $userData["role"] === "admin");

    }
    catch(PDOException $e) {
        // the connection fails, stop the page and show the error.
        die("Connection failed: " . $e->getMessage());
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="author" content ="Wilson Tran, Liana Bell, Kayden Ions, Nazifa Tahsin">
    <meta name="keywords" content="food, pizza, grillow, delivery, delivery app, app takeout, eating, restaurants, windsor, local foods">
    <meta name = "description" content ="affordable local food delivery service in Windsor">
    <title>Grillow Profile Information</title>
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/profileStyle.css">
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

        <div class="layout-main">
            <!-- SIDEBAR -->
            <aside class="sidebar" id="sidebar">
                <ul class="nav-list">
                    <li><a class="nav-link active" href="../home/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a class="nav-link" href="../services/browse.php"><i class="fa-solid fa-magnifying-glass"></i> Browse</a></li>
                </ul>

                <ul class="nav-list">
                    <li><a class="nav-link" href="../services/orders.php"><i class="fa-solid fa-receipt"></i> Orders</a></li>
                    <li><a class="nav-link" href="../services/favorites.php"><i class="fa-solid fa-star"></i> Favourites</a></li>
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
            <section class="profile-grid">
                <!-- Account Info -->
                <div class="card" id="account-card">
                    <div class="card-body">
                        <h3 class="card-title">Account Info</h3>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($userData["name"]); ?> </p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($userData["email"]); ?></p>
                        <p><strong>Phone:</strong> <?php echo formatPhoneNum($userData["phone_number"]); ?></p>
                    </div>
                </div>

                <!-- Address -->
                <div class="card" id="address-card">
                    <div class="card-body">
                        <h3 class="card-title">Address</h3>

                        <div class="input-field">
                            <input class="text-input" type="text" name="profile-address" id="profile-address" autocomplete="off" value="<?php echo htmlspecialchars($userData["address"]) ?>">
                        </div>
                    
                        <button style="margin-top: var(--space-md);" class="btn btn-primary" id="save-address-btn">Save</button>
                    </div>
                </div>
                <!-- Stats -->
                <div class="card" id="stats-card">
                    <div class="card-body">
                        <h3 class="card-title">Your Activity</h3>
                        <div class="profile-stats">
                            <div>
                                <h4 id="stat-orders">
                                    <?php echo $totalOrders; ?>
                                </h4>
                                <p>Orders</p>
                            </div>
                            <div>
                                <h4 id="stat-spent">$<?php echo $totalSpent; ?></h4>
                                <p>Spent</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Placeholder for future JS -->
                <div class="card" id="extra-card">
                    <div class="card-body">
                        <h3 class="card-title">More</h3>
                        <p id="extra-info">Coming soon...</p>
                    </div>
                </div>

                <?php if ($hasRestaurant): ?>
                <div class="card">
                    <div class="card-body">
                        <h3>Manage your restaurant</h3>
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($userRestaurant["business_name"]); ?><p>
                        <p><strong>Address:</strong> <?php echo htmlspecialchars($userRestaurant["address"]); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($userRestaurant["email"]); ?></p>
                        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($userRestaurant["phone_number"]); ?></p>
                        <div style="margin-top: var(--space-md);">
                            <a class="btn btn-primary" href="../user/restaurant.php">Go to restaurant page  <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        </div>
                    </div>
                    
                </div>
                <?php endif; ?>
                <?php if ($isAdmin): ?>
                <div class="card">
                    <div class="card-body">
                        <h3>Admin Pane</h3>
                        <div style="margin-top: var(--space-md);">
                            <a class="btn btn-primary" href="../user/admin.php">Go to Admin Page <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                

            </section>

        </main>
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
    <script src="../scripts/profileScript.js"></script>
</body>
</html>