<?php
require_once "function.php";
if (isset($_POST['btn'])) {
    $son = $_POST['son'];
    if (is_numeric($son)) {
        if (kiem_tra_so_nguyen_to($son)) {
            $kq = "Số $son là số nguyên tố";
        } else {
            $kq = "Số $son không phải là số nguyên tố";
        }
    } else {
        $kq = "Bạn cần nhập số để chương hoạt động";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra số nguyên tố</title>
</head>

<body>
    <form action="" method="post">
        <input type="number" name="son" value="<?= isset($son) ? $son : 0 ?>" id="">
        <br>
        <button type="submit" name="btn">Kiểm tra</button>
    </form>

    <?php
    if (isset($kq)) {
        echo $kq;
    }
    ?>
</body>

</html>