<?php

require_once __DIR__ . '/../config.php';


session_start();

// Check login
if (!isset($_SESSION["user_id"])) {
    http_response_code(401);
    echo json_encode(["error" => "Not logged in"]);
    exit();
}

$user_id = $_SESSION["user_id"];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['address'])) {
    $new_address = trim($data['address']);

    if ($new_address === "") {
        http_response_code(400);
        echo json_encode(["error" => "Empty address"]);
        exit();
    }

    $stmt = $pdo->prepare("UPDATE Customer SET address = :address WHERE user_id = :id");
    $stmt->bindValue(":address", $new_address);
    $stmt->bindValue(":id", $user_id);
    $stmt->execute();

    echo json_encode(["success" => true]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>