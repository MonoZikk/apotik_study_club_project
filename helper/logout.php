<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Prevent caching
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");

// Redirect to login page
header("Location: ../index.php");
exit;
?>
