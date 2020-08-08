<?php
require_once 'connection.php';
//Lấy id trên thanh địa chỉ URL
$cate_id = $_GET['id'];
//Câu lênh SQL lấy ra dữ liệu theo cate_id
$sql = "SELECT * FROM products WHERE cate_id=$cate_id ORDER BY pro_id DESC LIMIT 0,8";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once "layout/header.php" ?>
<div class="main">
    <!--List products-->
    <article>
        <?php foreach ($products as $p) : ?>
            <div class="col">
                <div class="product">
                    <a href="#">
                        <img src="images/<?= $p['pro_image'] ?>">
                        <h3><?= $p['pro_name'] ?></h3>
                        <div class="price"><?= $p['price'] ?></div>
                        <div class="desc">
                            <p><?= $p['intro'] ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </article>
    <!--End list products-->
</div>
<?php include_once "layout/footer.php" ?>