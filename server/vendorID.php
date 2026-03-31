<?php

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
}
catch (PDOException $e) {
    // Report errors and close the script immediately
    die("Connection Failed: " . $e->getMessage());
}

$idNum = file_get_contents('php://input');

$query = $pdo->prepare("select business_name from Restaurant_Vendor where vendor_id = :id");

$query->bindParam(':id', $idNum);
$query->execute();

$result = $query->fetch();
echo $result['business_name'];


?>