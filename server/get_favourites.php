<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$current_user = $_SESSION['user_id'];


$host = 'localhost';
$db   = 'grillow';
$user = 'root'; 
$pass = ''; 
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    //query
    $stmt = $pdo->prepare("
        SELECT 
            rv.restaurant_id,
            rv.business_name, 
            rv.image_path AS img_path,
            COUNT(DISTINCT co.order_id) AS order_count
        FROM Restaurant_Vendor rv
        JOIN Product p ON rv.restaurant_id = p.vendor_id
        JOIN Order_Item oi ON p.product_id = oi.product_id
        JOIN Customer_Order co ON oi.order_id = co.order_id
        WHERE co.customer_id = ?
        GROUP BY rv.restaurant_id
        ORDER BY order_count DESC, rv.business_name ASC
        LIMIT 4
    ");
    
    $stmt->execute([$current_user]);
    $favourites = $stmt->fetchAll();

    // Return the top 4 most ordered from restaurants data as JSON
    echo json_encode($favourites);

} catch (\PDOException $e) {
    // Return error as JSON so JS can catch it
    echo json_encode(['error' => $e->getMessage()]);
}
?>