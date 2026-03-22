<?php
// Start the session to access the session superglobal array
session_start(); 

// Assign the database credentials
$host = "localhost";
$dbName = "grillow";
$dbUser = "root";
$dbPass = "";

// Try and catch block for connecting to the database
try {
    // Connect by initializing the PDO object
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    // Define how the connection will report errors when interacting with the database, in this case,
    // we will throw an exception if anything goes wrong
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Report errors and close scripts immediately
    die("Connection failed: " . $e->getMessage());
}

// Check whether the request method is using POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // If the 'email' and password keys have their corresponding values (if they are assigned)
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Trim any extra spaces and store in the email variable
        $email = trim($_POST['email']);
        // Store the raw password data
        $password = $_POST['password'];

        // Prepare a query to retrieve user information including their id, password, and phone number based on their
        // unique email address
        $stmt = $pdo->prepare("SELECT user_id, password, phone_number FROM customer WHERE email = :email");
        // Bind the email variable inside the query statement
        $stmt->bindParam(':email', $email);
        // Execute the query
        $stmt->execute();

        // Send the first row from the retrieved data in the database. This will result in an array called $user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // If the user consists of valid values and the raw passwords fits the hashed password from the database
        if ($user && password_verify($password, $user['password'])) {
            // Then create a session key called 'user_id' to the retrieved user id
            $_SESSION['user_id'] = $user['user_id'];
            // Also create a session key called 'user_name' to the retrieved name in the database
            $_SESSION['user_name'] = $user['name'];

            // Redirect to the main index.php page
            header("Location: ../index.php");

            // Exit the script
            exit();
        } else {
            // If the user doesn't enter a password correctly or they don't exist, append a query string of error=invalid
            header("Location: login.php?error=invalid");
            // Exit the script
            exit();
        }
    }
}

?>