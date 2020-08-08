<?php
//Hàm tạo cookie
//setcookie('tên cookie', 'giá trị', 'thời gian sống của cookie', 'đường dẫn')
//Tạo 2 cookie username và role
setcookie('username', 'ngocbq', time() + 60 * 60, '/');
setcookie('role', 'administrator', time() + 60 * 60, '/');
?>
<a href="use_cookie.php">Xem cookie</a>