<?php
require_once __DIR__ . '/../config.php';

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../forms/login.php");
    exit();
}


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}

$user_id = $_SESSION['user_id'];

// Get vendor
$stmt = $pdo->prepare("SELECT * FROM Restaurant_Vendor WHERE admin_id = :id");
$stmt->execute([':id'=>$user_id]);
$vendor = $stmt->fetch(PDO::FETCH_ASSOC);
$vendor_id = $vendor['restaurant_id'];

// === Upload Image ===
if(isset($_POST['upload_image']) && isset($_FILES['restaurant_image'])){
    $file = $_FILES['restaurant_image'];

    // Validate file
    if($file['error'] !== UPLOAD_ERR_OK){
        die("Upload error");
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Only allow certain file types
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    if(!in_array($ext, $allowed)){
        die("Invalid file type");
    }

    $business_name_safe = preg_replace("/[^a-zA-Z0-9]/", "_", $vendor['business_name']);


    $business_name_safe = preg_replace("/[^a-zA-Z0-9]/", "_", $vendor['business_name']);

    $dir = __DIR__ . "/../images/restaurants/$business_name_safe/";
    $dbPathBase = "images/restaurants/$business_name_safe";

    if(!is_dir($dir)) {
        if(!mkdir($dir, 0755, true)){
            die("Failed to create directory");
        }
    }

    // Delete old files
    $files = glob($dir . "*");
    foreach($files as $existingFile){
        if(is_file($existingFile)){
            unlink($existingFile);
        }
    }

    // Save file
    $path = $dir . "cover." . $ext;

    if(move_uploaded_file($file['tmp_name'], $path)){
        $dbPath = $dbPathBase . "/cover.$ext";

        $stmt = $pdo->prepare("UPDATE Restaurant_Vendor SET image_path=:path WHERE restaurant_id=:rid");
        $stmt->execute([
            ':path' => $dbPath,
            ':rid' => $vendor_id
        ]);

        header("Location: ../user/restaurant.php?success=image_uploaded");
        exit();
    } else {
        die("move_uploaded_file failed");
    }
}

// === Add Menu Item ===
if(isset($_POST['add_item'])){
    $name = $_POST['product_name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $instock = isset($_POST['instock']) ? 1 : 0;

    $stmt = $pdo->prepare("INSERT INTO Product (vendor_id, product_name, description, price, instock) VALUES (:vid, :name, :desc, :price, :instock)");
    $stmt->execute([
        ':vid'=>$vendor_id,
        ':name'=>$name,
        ':desc'=>$desc,
        ':price'=>$price,
        ':instock'=>$instock
    ]);
    header("Location: ../user/restaurant.php?success=item_added");
    exit();
}

// === Edit / Delete Menu Item ===
if(isset($_POST['edit_item']) || isset($_POST['delete_item'])){
    $prod_id = $_POST['product_id'];

    if(isset($_POST['delete_item'])){
        $stmt = $pdo->prepare("DELETE FROM Product WHERE product_id=:pid");
        $stmt->execute([':pid'=>$prod_id]);
    } else {
        $name = $_POST['product_name'];
        $desc = $_POST['description'];
        $price = $_POST['price'];
        $instock = isset($_POST['instock']) ? 1 : 0;

        $stmt = $pdo->prepare("UPDATE Product SET product_name=:name, description=:desc, price=:price, instock=:instock WHERE product_id=:pid");
        $stmt->execute([
            ':name'=>$name,
            ':desc'=>$desc,
            ':price'=>$price,
            ':instock'=>$instock,
            ':pid'=>$prod_id
        ]);
    }

    header("Location: ../user/restaurant.php?success=item_updated");
    exit();
}
?>