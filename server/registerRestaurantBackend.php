<?php

    require_once __DIR__ . '/../config.php';



    session_start();
    $isLoggedIn = isset($_SESSION['user_id']); // returns bool


    try {
        // Establish a connection using PDO (PHP Data Objects)
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        // Set error reporting to Exception for easier debugging
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($isLoggedIn){
            echo "logged ";
        }
        else{
            echo "Hey u no log "; // also should redirect to login. actually maybe this useless cuz u need to be logged in in the first place....
        }

        echo "Success! ";

    }
    catch(PDOException $e) {
        // If connection fails, output the error message and exit
        die("Connection failed: " . $e->getMessage());
    }


$restaurant_name = trim($_POST["restaurant_name"]);
    $cuisine_type = trim($_POST["cusine_type"]);
    $restaurant_email = trim($_POST["restaurant_email"]);
    $restaurant_number = trim($_POST["restaurant_number"]);
    $restaurant_address = trim($_POST["restaurant_address"]);

    $user = $_SESSION['user_id'];

    $registerRestaurant = $pdo->prepare("
    INSERT INTO Restaurant_Vendor (business_name, admin_id, email, phone_number, address, cuisine_name)
    VALUES (:name,:admin, :email, :phone, :address, :cusine_type)");

    $registerRestaurant->execute([
        ':name' => $restaurant_name,
        ':admin' => $user,
        ':email' => $restaurant_email,
        ':phone' => $restaurant_number,
        ':address' => $restaurant_address,
        ':cusine_type' => $cuisine_type
    ]);


    // Redirect the browser
    header("Location: ../home/index.php");

    // The below code does not get executed
    // while redirecting
    exit();





?>