<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

$current_user = $_SESSION['user_id'];

//database connection
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
        SELECT DISTINCT
            co.order_id, 
            co.order_date, 
            co.total_price, 
            rv.business_name, 
            rv.image_path AS img_path
        FROM Customer_Order co
        JOIN Order_Item oi ON co.order_id = oi.order_id
        JOIN Product p ON oi.product_id = p.product_id
        JOIN Restaurant_Vendor rv ON p.vendor_id = rv.restaurant_id
        WHERE co.customer_id = ?
        ORDER BY co.order_date DESC
    ");
    
    $stmt->execute([$current_user]);
    $orders = $stmt->fetchAll();

    // 4. Return the data as JSON
    echo json_encode($orders);

} catch (PDOException $e) {
    // Return error as JSON so JS can catch it
    echo json_encode(['error' => $e->getMessage()]);
}
?>