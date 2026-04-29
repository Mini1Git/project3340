<?php

require_once __DIR__ . '/../config.php';

session_start();


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// checking if user clicked the button and sent a req of productID
if (isset($_GET['productID'])) {
    $productID = intval($_GET['productID']);
    $stmt = $pdo->prepare("SELECT * FROM Product WHERE product_id = ? AND instock = 1"); //make sure it is in stock
    $stmt->execute([$productID]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($product);
    exit;
}

// Otherwise, handle autocomplete search
$query = trim($_GET['query'] ?? '');

if ($query === '') {
    $stmt = $pdo->prepare("
        SELECT DISTINCT 
            rv.business_name AS name, 
            rv.cuisine_name AS cuisine, 
            rv.image_path AS image,
            p.product_name AS product,
            p.price AS price,
            p.product_id AS id
        FROM Restaurant_Vendor rv
        JOIN Product p ON rv.restaurant_id = p.vendor_id
        WHERE p.instock = 1
        LIMIT 50
    ");
    $stmt->execute();
} else {
    $stmt = $pdo->prepare("
        SELECT DISTINCT 
            rv.business_name AS name, 
            rv.cuisine_name AS cuisine, 
            rv.image_path AS image,
            p.product_name AS product,
            p.price AS price,
            p.product_id AS id
        FROM Restaurant_Vendor rv
        JOIN Product p ON rv.restaurant_id = p.vendor_id
        WHERE (rv.business_name LIKE CONCAT('%', ?, '%')
            OR p.product_name LIKE CONCAT('%', ?, '%')
            OR rv.cuisine_name LIKE CONCAT('%', ?, '%'))
            AND p.instock = 1
        ORDER BY rv.rating DESC
        LIMIT 50
    ");
    $stmt->execute([$query, $query, $query]);
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode(['results' => $results]);