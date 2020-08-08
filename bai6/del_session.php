<?php
session_start();
//Hàm xóa toàn bộ session tồn tại trong phiên làm việc này
// session_destroy();

//Xóa từng session, xóa session role
unset($_SESSION['role']);

//Quay về trang use_session
header("location: use_session.php");
