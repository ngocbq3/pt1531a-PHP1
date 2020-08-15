<?php

require_once 'connection.php';
//Lấy id trên thanh địa chỉ URL
$pro_id = $_GET['id'];
//Câu lênh SQL lấy ra dữ liệu theo pro_id
$sql = "SELECT * FROM products WHERE pro_id=$pro_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include_once "layout/header.php" ?>
<div class="main">
    <h3><?= $product['pro_name'] ?></h3>
    <img src="images/<?= $product['pro_image'] ?>" alt="">
    <h3>Price: <?= $product['price'] ?></h3>
    <div>
        <?= $product['detail'] ?>
    </div>
</div>
<?php include_once "layout/footer.php" ?>
<?=(isset($_SESSION['user']))? "<p>ABC</p>": '' ?>