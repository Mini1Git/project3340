<?php 
    require_once __DIR__ . '/../config.php';
// $pdo is now available from config.php
    $base_url = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
        ? '/myProjects/project3340'   // local
        : '';          // live server (root)
    
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

        $userRestaurantStmt = $pdo->prepare("SELECT * FROM restaurant_vendor WHERE admin_id = :id");
        $userRestaurantStmt->bindValue(":id", $user_id);
        $userRestaurantStmt->execute();
        $userRestaurant = $userRestaurantStmt->fetch(PDO::FETCH_ASSOC);

        $hasRestaurant = $userRestaurant !== false;

        if (!$hasRestaurant) {
            header("Location: profile.php?error=no+restaurant+found");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="author" content ="Wilson Tran, Liana Bell, Kayden Ions, Nazifa Tahsin">
    <meta name="keywords" content="food, pizza, grillow, delivery, delivery app, app takeout, eating, restaurants, windsor, local foods">
    <meta name = "description" content ="affordable local food delivery service in Windsor">
    <title>Grillow Profile Information</title>
    <link rel="icon" type="image/x-icon" href="../icons/favicon.ico">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/formstyle.css">
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
        <main class="main menu">
            <?php 
                $imagePath = isset($userRestaurant["image_path"]) ? $userRestaurant["image_path"] : "images/placeholder/placeholder.svg";
            ?>
            <div>
                <img 
                    class="hero card-img"
                    src="<?= $base_url . "/" . htmlspecialchars($imagePath) ?>" 
                    alt="<?= htmlspecialchars($userRestaurant["business_name"]) ?>"
                >
                <div class="card">
                <div class="card-body">
                    <h2>Update Restaurant Info</h2>

                    <!-- Image Upload -->
                    <form action="../server/updateRestaurant.php" method="POST" enctype="multipart/form-data">
                        <label class="label" for="restaurant_image">Upload Restaurant Image:</label>
                        <input class="file-input" type="file" name="restaurant_image" id="restaurant_image" accept="image/*">
                        <input type="submit" name="upload_image" value="Upload Image" class="btn btn-primary">
                    </form>
                    <br>
                    <hr>
                    <!-- Add Menu Item -->
                    <form action="../server/updateRestaurant.php" method="POST">
                        <h3 class="form-title">Add New Menu Item</h3>
                        <div class="input-field">
                            <input class="text-input" type="text" name="product_name" placeholder="Item Name" required>
                        </div>    
                        <div class="input-field">
                            <input class="text-input" type="number" step="0.01" name="price" placeholder="Price" required>
                        </div>
                        <div class="input-field">
                            <textarea class="text-input" name="description" placeholder="Item Description" required></textarea>
                        </div>
                        
                        <div class="input-field">
                            <label class="label">
                                In Stock <input type="checkbox" name="instock" value="1" checked> 
                            </label>
                        </div>
                        
                        <input type="submit" name="add_item" value="Add Menu Item" class="btn btn-primary long-btn">
                    </form>
                    <br>
                    <hr>
                    
                    <!-- Edit Menu Items-->
                    <h3 class="form-title">Edit Existing Items</h3>
                    <?php
                        // Fetch products for this vendor
                        $productsStmt = $pdo->prepare("SELECT * FROM Product WHERE vendor_id = :vid");
                        $productsStmt->execute([':vid' => $userRestaurant['restaurant_id']]);
                        $products = $productsStmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach($products as $prod): ?>
                        <form action="../server/updateRestaurant.php" method="POST" style="margin-bottom:1rem;">
                            <input type="hidden" name="product_id" value="<?= $prod['product_id'] ?>">
                            <div class="input-field">
                                <input class="text-input" type="text" name="product_name" value="<?= htmlspecialchars($prod['product_name']) ?>" required>
                            </div>
                            <div class="input-field">
                                <input class="text-input" type="number" step="0.01" name="price" value="<?= $prod['price'] ?>" required>
                            </div>
                            <div class="input-field">
                                <textarea class="text-input" name="description" required><?= htmlspecialchars($prod['description']) ?></textarea>
                            </div>
                            <div class="input-field">
                                <label class="label">
                                    In Stock <input type="checkbox" name="instock" value="1" <?= $prod['instock'] ? 'checked' : '' ?>>
                                </label>
                            </div>
                            <div class="input-field">
                                <input type="submit" name="edit_item" value="Update Item" class="btn btn-primary">
                                <input type="submit" name="delete_item" value="Delete Item" class="btn">
                            </div>
                            
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
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