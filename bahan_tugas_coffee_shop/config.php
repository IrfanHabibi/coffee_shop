<?php
// config.php
$host = "localhost";     // Ganti dengan host database Anda
$user = "root";          // Ganti dengan username database Anda
$password = "";          // Ganti dengan password database Anda
$dbname = "coffee_shop_db"; // Nama database

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
