<?php
//Lấy ra toàn bộ dữ liệu của bảng categories
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css/common.css">
</head>

<body>
    <div class="container">
        <header><img src="images/xbanner-trang-lien-he-moi.jpg.pagespeed.ic.FQvWHe7Pcx.jpg"></header>
        <!--Menu-->
        <nav>
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="about.html">Giới thiệu</a></li>
                <li><a href="news.html">Tin tức</a></li>
                <li><a href="contact.html">Liên hệ</a></li>
                <?php foreach ($category as $c) : ?>
                    <li><a href="category.php?id=<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></a></li>
                <?php endforeach;  ?>
            </ul>
        </nav>
        <!--End menu-->