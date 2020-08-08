<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pt1531a-php1";
try {
    $conn = new PDO("mysql:host=$hostname; dbname=$dbname; charset=utf8mb4", $username, $password);
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL <br> " . $e->getMessage();
}
