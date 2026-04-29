
<?php


require_once __DIR__ . '/../config.php';

//this works, dont touch
try {
    // Establish a connection using PDO (PHP Data Objects)
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
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