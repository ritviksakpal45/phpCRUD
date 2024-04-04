<?php
session_start(); // Start or resume the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page after logout
header("Location: login.php"); // Change "login.php" to your actual login page
exit();
?>
