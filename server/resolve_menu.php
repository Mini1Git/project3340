<?php 
    $host = "localhost";
    $database = "grillow";
    $dbUser = "root";
    $dbPass = "";

    

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } 
    catch (PDOException $e) {
        die("Connection Failed: " . $e->getMessage());
    }

    if (isset($_GET['id'])) {
        

        $vendor_id = $_GET['id'];
        
        $vendorStmt = $pdo->prepare("
        SELECT business_name, image_path 
        FROM restaurant_vendor 
        WHERE restaurant_id = :id
        ");
        $vendorStmt->bindParam(":id", $vendor_id);
        $vendorStmt->execute();
        $vendor = $vendorStmt->fetch(PDO::FETCH_ASSOC);
        
        $productStmt = $pdo->prepare("
            SELECT product_name, description, price, instock 
            FROM product 
            WHERE vendor_id = :id
        ");
        $productStmt->bindParam(":id", $vendor_id);
        $productStmt->execute();
        $products = $productStmt->fetchAll(PDO::FETCH_ASSOC);
        header("Content-Type: application/json; charset=UTF-8");

        echo json_encode([
            "vendor" => $vendor,
            "products" => $products
        ]);
        exit();
    }



?>