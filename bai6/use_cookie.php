<?php
//Sử dụng cookie
//Kiểm tra xem cookie đã tồn tại chưa
//Nếu tồn tại thì hiển thị nó
//Còn không thì hiển link tạo cookie
if (isset($_COOKIE['username'])) {
    echo "<h3>Cookie username: " . $_COOKIE['username'] . "</h3>";
    echo "<p>Cookie role: $_COOKIE[role] </p>";
    echo "<a href='del_cookie.php'>Xóa cookie</p>";
} else {
    echo "Cookie không tồn tại, bạn cần <a href='cookie.php'>tạo cookie mới</a>";
}
