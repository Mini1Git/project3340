<?php
   
   // Assign the database credentials
   $host = "localhost";
    $database = "grillow";
    $dbUser = "root";
    $dbPass = "";

    // Try and catch blocks for connecting to the database
    try {
        // Create a new connection using and instance of PDO
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $dbUser, $dbPass);
        // Define how the connection will report errors when interacting with the database, in this case,
        // we will throw an exception if anything goes wrong
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        // Report errors and close the script immediately
        die("Connection failed: " . $e->getMessage());
    }

    // If the correspodning request method is equal to 'POST'
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // If all required keys to register for an account are set, the start the logic to register for an account.
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone-num']) && isset($_POST['password'])) {
            // Trim the users name found in the header body content
            $name = trim($_POST['username']);
            // Trim the phone number found in the header body content
            $phoneNum = trim($_POST['phone-num']);
            // Trim the users email address found in the header body content
            $emailAdd = trim($_POST['email']);
            // Assign the raw password data to a variable
            $userPass = $_POST['password'];
            
            // Using a password regex called pattern. This checks whether the password contains at least 10 characters
            // and includes uppercase letters, lowercase letters, a number, and a symbol 
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{10,}$/';
            if (!preg_match($pattern, $userPass)) {
                // If the user enters a password that doesn't match the pattern defined above, then exit the script 
                die("Password must be at least 10 characters and include uppercase, lowercase, number, and symbol.");
            }

            // Convert the raw password to a hashed password. This is what we're storing in the database
            $hash_to_store = password_hash($userPass, PASSWORD_DEFAULT);

            // If the email address entered is not a valid email address 
            if (!filter_var($emailAdd, FILTER_VALIDATE_EMAIL)) {
                // Exit the script
                die("Invalid email");
            }

            // Prepare the SQL query. This inserts all of the entered information into the database.
            $stmt = $pdo->prepare("INSERT INTO customer (name, email, phone_number, password) VALUES (:name, :email, :phone_number, :password)");

            // Bind each variable we retrieved and reformatted from 'POST' to the corresponding value in the query
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $emailAdd);
            $stmt->bindParam(':phone_number', $phoneNum);
            $stmt->bindParam(':password', $hash_to_store);

            // Try to execute the statement
            try {
                // If this works then move down a line, otherwise it will throw an exception
                $stmt->execute();
                // Redirect to the login page where the user must login in. Apply the query string registered=1
                header("Location: login.php?registered=1");
                // Exit the script immediately
                exit();
            } catch (PDOException $e) {
                // 1062 = duplicate entry error in MySQL
                if ($e->errorInfo[1] == 1062) {
                    // Apply the query string error=email_taken
                    header("Location: signup.php?error=email_taken");
                    // Exit the script immediately
                    exit();
                } else {
                    // If the error doesn't correspond to a duplicate entry error than retrieve the message from the exception
                    die("Error: " . $e->getMessage());
                }
            }

        }
    }
    
    

    
?>