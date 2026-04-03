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
} 
catch(PDOException $e) {
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
        $stmt = $pdo->prepare("SELECT user_id, password, phone_number, name FROM Customer WHERE email = :email");
        // Bind the email variable inside the query statement
        $stmt->bindParam(':email', $email);
        // Execute the query
        $stmt->execute();

        // Send the first row from the retrieved data in the database. This will result in an array called $user
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //check if user exist
        if (!$user){
            //email not in database go to not found error
            header("Location: ../forms/login.php?error=not_found");
            exit();
        }

        //check if password is correct
        if (password_verify($password, $user['password'])){
            //correct password! continue to create session key called user_id
            $_SESSION['user_id'] = $user['user_id'];
            //create session key user_name
            $_SESSION['user_name'] = $user['name'];

            // Redirect to the main index.php page
            header("Location: ../home/index.php");
            exit();
        }
        
        else {
            // If the user doesn't enter a password correctly query string of error=wrong_password
            header("Location: ../forms/login.php?error=wrong_password");
            // Exit the script
            exit();
        }
    }
}

?>