<?php
session_start();
require_once "db.php";
if (isset($_POST['btnlogin'])) {
    extract($_REQUEST);
    //Câu lệnh sql, kiểm tra xem trong bảng users có username này không
    $sql = "SELECT * FROM users WHERE username='$username'";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    //Lấy ra 1 bản ghi
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //Kiểm tra xem $user có dữ liệu không
    //nếu có kiểm tra mật khẩu có trùng với mật khẩu trong CSDL không
    //Ngược lại thông báo cho người dùng nhập lại username
    if ($user != false) {
        if (password_verify($password, $user['password'])) {
            //Nếu đúng mật khẩu thì tạo session
            $_SESSION['user']['name'] = $username;
            //Chuyển hướng website
            header("location:index.php");
        } else {
            $pass_err = "Mật khẩu không chính xác";
        }
    } else {
        $user_err = "Tài khoản không đúng";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <h3>Đăng nhập</h3>
    <form action="" method="post">
        <label for="">Username</label>
        <br>
        <input type="text" name="username" id="">
        <?php
        if (isset($user_err)) {
            echo $user_err;
        }
        ?>
        <br>
        <label for="">Password</label>
        <br>
        <input type="password" name="password" id="">
        <?php
        if (isset($pass_err)) {
            echo $pass_err;
        }
        ?>
        <br>
        <button type="submit" name="btnlogin">Login</button>
    </form>
</body>

</html>