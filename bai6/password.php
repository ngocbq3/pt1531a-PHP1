<?php
//mã hóa mật khẩu bằng password_hash
$password = password_hash("123456", PASSWORD_DEFAULT);
echo $password;
