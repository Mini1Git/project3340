<?php
    $host = "localhost";
    $database = "grillow";
    $dbUser = "root";
    $dbPass = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }


    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone-num']) && isset($_POST['password'])) {
            $name = trim($_POST['username']);
            $phoneNum = trim($_POST['phone-num']);
            $emailAdd = trim($_POST['email']);
            $userPass = $_POST['password'];

            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{10,}$/';
            if (!preg_match($pattern, $userPass)) {
                die("Password must be at least 10 characters and include uppercase, lowercase, number, and symbol.");
            }

            $hash_to_store = password_hash($userPass, PASSWORD_DEFAULT);

            if (!filter_var($emailAdd, FILTER_VALIDATE_EMAIL)) {
                    die("Invalid email");
            }

            $stmt = $pdo->prepare("INSERT INTO customer (name, email, phone_number, password) VALUES (:name, :email, :phone_number, :password)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $emailAdd);
            $stmt->bindParam(':phone_number', $phoneNum);
            $stmt->bindParam(':password', $hash_to_store);

            try {
                
                $stmt->execute();
                header("Location: login.php?registered=1");
                exit();
            } catch (PDOException $e) {

                // 1062 = duplicate entry error in MySQL
                if ($e->errorInfo[1] == 1062) {
                    header("Location: signup.php?error=email_taken");
                    exit();
                } else {
                    die("Error: " . $e->getMessage());
                }
            }

        }
    }
    
    

    
?>