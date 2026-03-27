<?php 
    // Start the session to modify session array
    session_start();
    // Free all session variables variables currently registered in the superglobal array
    session_unset();
    // Destroy the current session
    session_destroy();
    // Redirect to the main page or a page that doesn't require logging in
    header("Location: ../home/index.php");
    // Terminate the execution of the script to prevent any errors or leakage
    exit();
?>