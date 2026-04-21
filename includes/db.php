<?php
/**
 * NestUp - Database Connection Configuration
 */

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'nestup';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    // Detailed error logging (could be replaced with a cleaner error for production)
    die("Database connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 for full emoji/unicode support
$conn->set_charset("utf8mb4");

// Start session globally if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
