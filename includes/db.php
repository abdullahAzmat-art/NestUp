<?php
// This securely connects PHP to your XAMPP MySQL database
$host = 'localhost';
$dbname = 'nestup';
$username = 'root'; // XAMPP default
$password = '';     // XAMPP default is blank

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>