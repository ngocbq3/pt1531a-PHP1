<?php
//Xóa cookie
//Để xóa cookie chúng ta set thời gian sống của cookie là âm
setcookie('username', '', time() - 60 * 60, '/');
setcookie('role', '', time() - 60 * 60, '/');
header("location: use_cookie.php");
