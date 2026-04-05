<?php

require_once __DIR__ . '/../config.php';

session_start();

// Log that the script was accessed
error_log("SHOPPING CART BACKEND ACCESSED at " . date('Y-m-d H:i:s'));

//this script takes care of adding items the customer orders to the database.
// Assign the database credentials

// Try and catch blocks for connecting to the database
try {
    // Create a new connection using and instance of PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    // Define how the connection will report errors when interacting with the database, in this case,
    // we will throw an exception if anything goes wrong
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Return error as JSON instead of dying with plain text
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

// Set the response header to JSON
header('Content-Type: application/json');

// Receive the raw POST data
$json_data = file_get_contents('php://input');

// Decode the JSON string into a PHP array
$data = json_decode($json_data, true);

// Validate data
if (!$data || !isset($data['cart']) || !is_array($data['cart']) || empty($data['cart'])) {
    echo json_encode(['error' => 'Invalid or empty cart']);
    exit;
}

if (!isset($data['total']) || !is_numeric($data['total']) || $data['total'] <= 0) {
    echo json_encode(['error' => 'Invalid total']);
    exit;
}

// Set variables FIRST before binding
$date = date('Y-m-d');
$total = $data['total'];
$userID = $_SESSION['user_id'];

if (!$userID) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

//Customer Order: order_id (ai)	customer_id	order_date	total_price	order_status
try {
    $customer_order = $pdo->prepare("INSERT INTO Customer_Order (customer_id, order_date, total_price, order_status) values (:user, :date, :total, 1)");
$customer_order->bindParam(':total', $total);
$customer_order->bindParam(':user', $userID);
$customer_order->bindParam(':date', $date);

$customer_order->execute();

$orderID = $pdo->lastInsertId(); // get the last id.

//Order_item: order_id	product_id	unit_price	//quantity	subtotal//
//also increase quantity by 1 each time product_id is duped.
$order_item = $pdo->prepare("
    INSERT INTO Order_Item (product_id, order_id, unit_price, quantity, subtotal) VALUES (:productID, :orderID, :price, 1, :unit_price) ON DUPLICATE KEY UPDATE quantity = quantity + 1, subtotal = quantity * unit_price;
"); //problem, if its two diff orders, but SAME product id, it will stack. Thus, we wanna make orderid composite key.

$order_item->bindParam(':productID', $productID);
$order_item->bindParam(':orderID', $orderID);
$order_item->bindParam(':price', $price);
$order_item->bindParam(':unit_price', $price);


for ($i = 0; $i < count($data['cart']); $i++) {
    //for each item
    $productID = $data['cart'][$i]['product_id'];
    $price = $data['cart'][$i]['price'];
    
    if (!$productID || !$price) {
        echo json_encode(['error' => 'Invalid cart item data']);
        exit;
    }
    
    $order_item->execute();
}


//ai = auto increment
//payment table: payment_id(ai)	 order_id	method	amount	payment_date payment_status
$payment_info = $pdo->prepare("
    INSERT INTO Payment(order_id, method, amount, payment_date, payment_status)
    VALUES (:orderPaymentID, 'credit-card', :total, :payment_date, 1);
");

$payment_info->bindParam(':orderPaymentID', $orderID);
$payment_info->bindParam(':total', $total);
$payment_info->bindParam(':payment_date', $date);

$payment_info->execute();
// idea: make method payment a drop down? front end? For now its credit card.

echo json_encode(['success' => true, 'order_id' => $orderID]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}



