
<?php

$host = "localhost";               // Your MySQL host (usually "localhost")
$dbname = "tran9b_terminator";    // Replace with your database name
$username = "tran9b_terminator";       // Replace with your MySQL username
$password = "AkrTtVN3HGXu3VzdkX9r";



//this works, dont touch
try {
    // Establish a connection using PDO (PHP Data Objects)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set error reporting to Exception for easier debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ////////
    header("Content-Type: application/json; charset=UTF-8");


    $stmt = $pdo->prepare("SELECT * FROM Restaurant_Vendor");

    $stmt->execute();
    $output = $stmt->fetchAll(PDO::FETCH_ASSOC);



    echo json_encode($output);
    //do error log to debug in php.


}
catch(PDOException $e) {
    // If connection fails, output the error message and exit
    die("Connection failed: " . $e->getMessage());
}


?>