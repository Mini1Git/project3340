<?php 
    
    // Assign the database credentials
    require_once __DIR__ . '/../config.php';


    
    // Try and catch blocks for connecting to the database
    try {
        // Create a new connection using and instance of PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        // Define how the connection will report errors when interacting with the database, in this case,
        // we will throw an exception if anything goes wrong
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $e) {
        // Report errors and close the script immediately
        die("Connection Failed: " . $e->getMessage());
    }

    // If the query string id has a corresponding variable then continue with resolving the restaurant menu
    if (isset($_GET['id'])) {
        // Set the vendor id to the value of query string id
        $vendor_id = $_GET['id'];
        // Prepare a statement to retrieve the business name and image_path attributes from the database
        $vendorStmt = $pdo->prepare("
        SELECT business_name, image_path 
        FROM Restaurant_Vendor 
        WHERE restaurant_id = :id
        ");
        // Bind the vendor id to the corresponding id value in the query
        $vendorStmt->bindParam(":id", $vendor_id);
        // Execute the query, this should only retrieve a single row
        $vendorStmt->execute();
        // Assign the row to a PHP array variable using the fetch method
        $vendor = $vendorStmt->fetch(PDO::FETCH_ASSOC);
        
        // Prepare another sql query to retrieve all menu items corresponding to that restaurant
        $productStmt = $pdo->prepare("
            SELECT *
            FROM Product 
            WHERE vendor_id = :id
        ");
        // Bind the vendor_id to the corresponding id value 
        $productStmt->bindParam(":id", $vendor_id);
        // Execute the query
        $productStmt->execute();
        // Retrieve the product_name, description, price, and instock values and assign to an array of products
        $products = $productStmt->fetchAll(PDO::FETCH_ASSOC);
        // Ensure we specify the type off document that we'll be sending over
        header("Content-Type: application/json; charset=UTF-8");
        
        // Encode the vendor and products to a JSON object
        echo json_encode([
            "vendor" => $vendor,
            "products" => $products
        ]);
        // Exit the script
        exit();
    }



?>