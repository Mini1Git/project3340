<?php 
    require_once __DIR__ . '/../config.php';
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: ../forms/login.php");
        exit();
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

        $isAdmin = (isset($userData["role"]) && $userData["role"] === "admin");


        if (!$isAdmin) {
            die("Error: Page not found");
        }

        $userStmts = $pdo->prepare("SELECT user_id, name, email, role, is_disabled FROM Customer");
        $userStmts->execute();
        $users = $userStmts->fetchAll(PDO::FETCH_ASSOC);


        

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
    <title>Grillow Profile Information</title>
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <meta name ="author" content ="Wilson Tran, Liana Bell, Kayden Ions, Nazifa Tahsin">
    <meta name="keywords" content="food, pizza, grillow, delivery, delivery app, app takeout, eating, restaurants, windsor, local foods">
    <meta name = "description" content ="affordable local food delivery service in Windsor">
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
            <h3>Number of total users: <?php echo count($users)?> </h3>
            <?php
                foreach($users as $user): 
                    if ($user_id == $user["user_id"]) {
                        continue;
                    } 
            ?>
                <div class="card" style="margin: var(--space-md);">
                    <div class="card-body">
                        <h3>User Type: <?php echo htmlspecialchars($user["role"]); ?></h3>
                        <p>Name: <?php echo htmlspecialchars($user["name"]) ?></p>
                        <p>Email: <a class="link" href="mailto:<?php echo htmlspecialchars($user["email"]) ?>"><?php echo htmlspecialchars($user["email"]) ?></a></p>
                        <p>Enabled: <?php echo $user["is_disabled"] == 0 ? "True" : "False" ?></p>
                        <div class="admin-actions">
                            <form method="POST" action="../server/adminactions.php">
                                <input type="hidden" name="account" value="activate">
                                <input type="hidden" name="id" value="<?php echo (int)$user["user_id"]; ?>">
                                <button class="btn btn-primary">Activate</button>
                            </form>

                            <form method="POST" action="../server/adminactions.php">
                                <input type="hidden" name="account" value="deactivate">
                                <input type="hidden" name="id" value="<?php echo (int)$user["user_id"]; ?>">
                                <button class="btn ">Deactivate</button>
                            </form>
                        </div>
                        
                    </div> 
                </div>

            <?php endforeach; ?>
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
</body>
</html>