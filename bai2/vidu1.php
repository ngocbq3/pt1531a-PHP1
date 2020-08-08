<?php
$arr = [
    ['id' => 1, 'name' => 'Nguyễn văn Nam', 'email' => 'namnv@gmail.com', 'address' => 'Hòa Bình'],
    ['id' => 2, 'name' => 'Lê Quang Long', 'email' => 'longlq@gmail.com', 'address' => 'Hòa Bình'],
    ['id' => 3, 'name' => 'Trinh Lê Ninh', 'email' => 'Ninhtl@gmail.com', 'address' => 'Hà Nam'],
    ['id' => 4, 'name' => 'Bùi Đúc Huy', 'email' => 'huybh@gmail.com', 'address' => 'Hà Nội'],
    ['id' => 5, 'name' => 'Lưu quang điệp', 'email' => 'dienlq@gmail.com', 'address' => 'Thái Bình']
];
if (isset($_POST['btn'])) {
    $son = $_POST['son'];
    $gt = 1;
    for ($i = 2; $i <= $son; $i++) {
        $gt *= $i;
    }
    $kq = "Giai thừa của $son! = $gt";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính giai thừa</title>
    <style>
        table {
            margin: auto;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <label for="">Nhập vào số cần tính</label>
        <input type="number" name="son" value="<?= isset($son) ? $son : 0 ?>" id="" min="0">
        <br>
        <button type="submit" name="btn">Tính</button>
        <?php
        if (isset($kq)) {
            echo "<br>$kq";
        }
        ?>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
        </tr>
        <?php foreach ($arr as $item) : ?>
            <tr><?php foreach ($item as $a) : ?>

                    <td><?= $a ?></td>


                <?php endforeach; ?></tr>
        <?php endforeach; ?>
    </table>
</body>

</html>