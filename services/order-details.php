<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../forms/login.php");
        exit();
    }
    require_once __DIR__ . '/../config.php';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    $order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $user_id = $_SESSION['user_id'];

    // Fetch Main Order Info
    $stmt = $pdo->prepare("SELECT * FROM Customer_Order WHERE order_id = :order_id AND customer_id = :user_id");
    $stmt->execute(['order_id' => $order_id, 'user_id' => $user_id]);
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        die("Order not found.");
    }

    // Fetch Items with Product Names
    $items_sql = "SELECT p.product_name, oi.quantity, oi.subtotal 
                FROM Order_Item oi 
                JOIN Product p ON oi.product_id = p.product_id 
                WHERE oi.order_id = :order_id";
    $stmt_items = $pdo->prepare($items_sql);
    $stmt_items->execute(['order_id' => $order_id]);
    $items_result = $stmt_items->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- html for the receipt page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="author" content ="Wilson Tran, Liana Bell, Kayden Ions, Nazifa Tahsin">
    <meta name="keywords" content="food, pizza, grillow, delivery, delivery app, app takeout, eating, restaurants, windsor, local foods">
    <meta name = "description" content ="affordable local food delivery service in Windsor">
    <title>Receipt #<?php echo $order_id; ?></title>
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylealternate.css">
    <link rel="stylesheet" href="../stylesheets/receiptStyle.css">
</head>
<body class="receipt-body">
    <div class="receipt-container">
        <header class="receipt-header">
            <h1>Grillow</h1>
            <p>Order #<?php echo $order['order_id']; ?></p>
            <p><?php echo date("M j, Y", strtotime($order['order_date'])); ?></p>
        </header>

        <table class="receipt-table">
            <thead>
                <tr><th>Item</th><th>Qty</th><th class="text-right">Price</th></tr>
            </thead>
            <tbody>
                <?php foreach ($items_result as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td class="text-right">$<?php echo number_format($item['subtotal'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="receipt-total-row">
                    <td colspan="2">TOTAL</td>
                    <td class="text-right">$<?php echo number_format($order['total_price'], 2); ?></td>
                </tr>
            </tfoot>
        </table>
        <div class="receipt-footer">
            <a href="orders.php" class="back-link">Back to Orders</a>
        </div>
    </div>
</body>
</html>