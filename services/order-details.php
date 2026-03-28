<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../forms/login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "Grillow");
$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user_id = $_SESSION['user_id'];

// Fetch Main Order Info
$stmt = $conn->prepare("SELECT * FROM Customer_Order WHERE order_id = ? AND customer_id = ?");
$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) { die("Order not found."); }

// Fetch Items with Product Names
$items_sql = "SELECT p.product_name, oi.quantity, oi.subtotal 
              FROM Order_Item oi 
              JOIN Product p ON oi.product_id = p.product_id 
              WHERE oi.order_id = ?";
$stmt_items = $conn->prepare($items_sql);
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$items_result = $stmt_items->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt #<?php echo $order_id; ?></title>
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="../stylesheets/stylemobile.css">
    <link rel="stylesheet" href="../stylesheets/styletablet.css">
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
                <?php while($item = $items_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td class="text-right">$<?php echo number_format($item['subtotal'], 2); ?></td>
                </tr>
                <?php endwhile; ?>
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