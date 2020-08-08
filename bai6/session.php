<?php
//Khi làm việc với session thì cần có hàm này
session_start();

//Đăng ký session
$_SESSION['username'] = 'admin';
$_SESSION['role'] = 'administrator';
?>
<a href="use_session.php">Xem session</a>