<?php
//Tên server
$hostname = 'localhost';
//username truy cập vào database của mysql
$username = 'root';
//mật khẩu của username
$password = '';
//Tên database truy cập
$dbname = 'pt1531a-php1';
try {
    //Tạo đối tượng kết nối PDO
    $conn = new PDO("mysql:host=$hostname; dbname=$dbname; charset=utf8", $username, $password);
    
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu<br>" . $e->getMessage();
}
