<?php
    require_once __DIR__ . '/../config.php';
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
    if (!$isLoggedIn) {
        header("Location: ../forms/login.php");
        exit();
    }

    try{
        //connect to db
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        //tell us if error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //get user's ID
        $user_id = $_SESSION['user_id'];

        //find user info
        $userStmt = $pdo->prepare("SELECT name, email, phone_number, address, role, is_disabled FROM Customer WHERE user_id = :id");
        $userStmt->execute(['id' => $user_id]);

        //save result into $userData array
        $userData = $userStmt->fetch(PDO::FETCH_ASSOC);

        $isAdmin = (isset($userData["role"]) && $userData["role"] === "admin");


        if (!$isAdmin) {
            die("Error: Page not found");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["account"]) && isset($_POST["id"])) {

                $id = $_POST["id"];

                $status = ($_POST["account"] === "activate") ? 0 : 1;
                
                $stmt = $pdo->prepare("UPDATE Customer SET is_disabled = :status WHERE user_id = :id");
                $stmt->execute([
                    'status' => $status,
                    'id' => $id
                ]);

                header("Location: ../user/admin.php");
                exit();
            }
        }

        
    }
    catch(PDOException $e) {
        // the connection fails, stop the page and show the error.
        die("Connection failed: " . $e->getMessage());
    }
    
?>