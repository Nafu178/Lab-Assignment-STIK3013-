<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Set a logout message in a session variable to be displayed on the login page
session_start();
$_SESSION['logout_message'] = "Logout successful! Please log in again if you wish to continue.";

// Redirect to login page
header("Location: login.php");
exit();

