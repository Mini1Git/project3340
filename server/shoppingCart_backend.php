<?php


session_start();

//this script takes care of adding items the customer orders to the database.
// Assign the database credentials
$host = "localhost";
$database = "tran9b_terminator";
$dbUser = "tran9b_terminator";
$dbPass = "AkrTtVN3HGXu3VzdkX9r";


// Try and catch blocks for connecting to the database
try {
    // Create a new connection using and instance of PDO
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $dbUser, $dbPass);
    // Define how the connection will report errors when interacting with the database, in this case,
    // we will throw an exception if anything goes wrong
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Report errors and close the script immediately
    die("Connection Failed: " . $e->getMessage());
}

// Set the response header to JSON
header('Content-Type: application/json');

// Receive the raw POST data
$json_data = file_get_contents('php://input');

// Decode the JSON string into a PHP array
$data = json_decode($json_data, true);
//Customer Order: order_id (ai)	customer_id	order_date	total_price	order_status
$customer_order = $pdo->prepare("INSERT INTO Customer_Order (customer_id, order_date, total_price, order_status) values (:user, :date, :total, 1)");
$customer_order->bindParam(':total', $total);
$customer_order->bindParam(':user', $userID);
$customer_order->bindParam(':date', $date);

$date = date('Y-m-d');
$total = $data['total'];
$userID = $_SESSION['user_id'];

$customer_order->execute();

$orderID = $pdo->lastInsertId(); // get the last id.

//Order_item: order_id	product_id	unit_price	//quantity	subtotal//
//also increase quantity by 1 each time product_id is duped.
$order_item = $pdo->prepare("
    Insert into Order_Item (product_id, order_id, unit_price, quantity, subtotal) values (:productID, :orderID, :price, 1, unit_price) on duplicate KEY UPDATE quantity = quantity + 1, subtotal = quantity * unit_price;
"); //problem, if its two diff orders, but SAME product id, it will stack. Thus, we wanna make orderid composite key.

$order_item->bindParam(':productID', $productID);
$order_item->bindParam(':orderID', $orderID);

$order_item->bindParam(':price', $price);


for ($i = 0; $i < count($data['cart']); $i++) {
    //for each item
    $productID = $data['cart'][$i]['product_id'];
    $price = $data['cart'][$i]['price'];
    $order_item->execute();
}


//ai = auto increment
//payment table: payment_id(ai)	 order_id	method	amount	payment_date payment_status
$payment_info = $pdo->prepare("
    insert into Payment(order_id, method, amount, payment_date, payment_status)
    values (:orderPaymentID, 'credit-card', :total, :payment_date, 1);
");

$payment_info->bindParam(':orderPaymentID', $orderID);
$payment_info->bindParam(':total', $total);
$payment_info->bindParam(':payment_date', $date);

$payment_info->execute();
// idea: make method payment a drop down? front end? For now its credit card.


echo json_encode($data); // can be anything. so return data from database. mostly debug



