<?php
session_start();
//Kiểm tra nếu không có session thì điều hướng về trang login
if (!isset($_SESSION['user'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đây là trang quản trị website</title>
</head>

<body>
    <h2>Trang quản trị website</h2>
</body>

</html>