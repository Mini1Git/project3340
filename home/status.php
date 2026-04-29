<?php
require_once __DIR__ . '/../config.php';

function checkDatabase() {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function checkUsersTable($pdo) {
    try {
        $stmt = $pdo->query("SELECT 1 FROM Customer LIMIT 1");
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function checkOrdersTable($pdo) {
    try {
        $stmt = $pdo->query("SELECT 1 FROM Customer_Order LIMIT 1");
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Main check
$status = [];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
    $status['database'] = true;

    $status['users'] = checkUsersTable($pdo);
    $status['orders'] = checkOrdersTable($pdo);

} catch (PDOException $e) {
    $status['database'] = false;
    $status['users'] = false;
    $status['orders'] = false;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>System Status</title>
        <meta http-equiv="refresh" content="10">
        <link rel="stylesheet" href="../stylesheets/style.css">
        <style>
            .status-card {
                padding: 1rem;
                margin: 1rem 0;
                border-radius: 8px;
                color: white;
                font-weight: bold;
            }
            .online { background: #28a745; }
            .offline { background: #dc3545; }
        </style>
    </head>
    <body>

        <h1>Grillow System Status</h1>

        <?php foreach ($status as $service => $isOnline): ?>
            <div class="status-card <?= $isOnline ? 'online' : 'offline' ?>">
                <?= strtoupper($service) ?>: <?= $isOnline ? 'ONLINE' : 'OFFLINE' ?>
            </div>
        <?php endforeach; ?>
        <a href="../info/about.html">< Go back to the main site</a>
    </body>
</html>