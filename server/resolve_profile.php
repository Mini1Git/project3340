<?php
    
    $host = "localhost";
    $dbName = "grillow";
    $dbUser = "root";
    $dbPass = "";

    session_start();

    // Retrieve the user id of whoever is logged in currently
    $user_id = $_SESSION["user_id"];
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        die("Error connecting: " . $e->getMessage());
    }

    // Prepare to receive user information from database
    $stmt = $pdo->prepare("SELECT name, phone_number, email, address FROM Customer WHERE user_id = :id");

    $stmt->bindParam(":id", $user_id);
    $stmt->execute();

    $output = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($output);

?>