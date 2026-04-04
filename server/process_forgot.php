//NOTE THAT U CANT ACTUALLY RESET YOUR PASSWORD IT JUST APPEARS FUNCTIONAL
//SINCE WE DONT HAVE TIME TO SET UP AN SMTP SERVER and all the other stuff
<?php
session_start();

//check if page accessed via POST from form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get the email from the form and remove any illegal characters (santizing)
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // in a real app, you would check if this email exists in your database
    
    // simulate a "Sent" state save email
    $_SESSION['reset_email'] = $email;
    //message to user, htmlspecialchars() helps for security and malicious code injection
    $_SESSION['status_message'] = "A password reset link has been sent to " . htmlspecialchars($email);
    
    // rdirect back to the page  success triggers green alert box
    header("Location: ../forms/forgot.php?status=success");
    exit();
}
?>