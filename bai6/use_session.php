<?php
session_start();

//Kiểm tra xem session username có tồn tại không
//Nếu tồn tại thì sẽ hiển thị
//Còn không thì sẽ hiển thị link tạo session mới
if (isset($_SESSION['username'])) {
    echo "<h3>Username: " . $_SESSION['username'] . "</h3>";
    echo "<p>Role: " . $_SESSION['role'] . "</p>";
    echo "<a href='del_session.php'>Xóa session (Logout)</a>";
} else {
    echo "Session không tồn tại, <a href='session.php'>Tạo session mới</a>";
}
