<?php
require_once "../connection.php";
$sql = "SELECT * FROM products p INNER JOIN categories c ON p.cate_id=c.cate_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
</head>

<body>
    <h3>Danh sách sản phẩm</h3>
    <a href="them_sanpham.php">Add</a>
    <table border="1">
        <tr>
            <th>Ma sản phẩm
            </th>
            <th>tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Danh mục</th>
            <th>Mô tả</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $p) : ?>
            <tr>
                <td><?= $p['pro_id'] ?></td>
                <td><?= $p['pro_name'] ?></td>
                <td>
                    <img src="../images/<?= $p['pro_image'] ?>" width="120" alt="">
                </td>
                <td><?= $p['cate_name'] ?></td>
                <td><?= $p['intro'] ?></td>
                <td>Action</td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>