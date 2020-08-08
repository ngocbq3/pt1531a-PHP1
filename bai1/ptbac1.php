<?php

if (isset($_POST['btnGiai'])) {
    $a = $_POST['soa'];
    $b = $_POST['sob'];
    if ($a != 0) {
        $x = -$b / $a;
        $kq = "Nghiệm của phương trình x=$x";
    } else {
        $kq = "Phương trình vô nghiệm";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương trình Ax + B = 0</title>
</head>

<body>
    <form action="" method="POST">
        <label for="">Nhập a</label>
        <input type="number" name="soa" value="<?= (isset($a) ? $a : "") ?>" id="">
        <br>
        <label for="">Nhập b</label>
        <input type="number" name="sob" value="<?= (isset($b) ? $b : "") ?>" id="">
        <br>
        <?php
        if (isset($kq)) {
            echo $kq . "<br>";
        }
        ?>
        <button type="submit" name="btnGiai">Giải</button>

    </form>
</body>

</html>