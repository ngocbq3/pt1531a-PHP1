<?php
require_once "../connection.php";

//Câu lệnh sql Lấy dữ liệu bảng categories
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
//Validate ten san phẩm và image
$errors = ['pro_name' => ''];
if (isset($_POST['btnLuu'])) {
    extract($_REQUEST);
    if (trim($pro_name) == '') {
        $errors['pro_name'] = "bạn cần nhập tên sản phẩm";
    }
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
    } else {
        $image = $pro_image;
    }
    if (!array_filter($errors)) {
        //Câu lệnh sql insert
        $sql = "UPDATE products SET pro_name='$pro_name', cate_id='$cate_id', pro_image='$image', intro='$intro', detail='$detail', price='$price', quantity='$quantity' WHERE pro_id=$pro_id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            if ($_FILES['image']['size'] > 0) {
                move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);
            }
            echo "Cập nhật dữ liệu thành công!!!";
        } else {
            echo "Lỗi dữ liệu";
        }
    }
}

//Lấy mã của sản phẩm cần sửa
$pro_id = $_GET['id'];
//Câu lệnh sql
$sql = "SELECT * FROM products WHERE pro_id=$pro_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>

<body>
    <h3>Thêm sản phẩm</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="pro_id" value="<?= $product['pro_id'] ?>">
        <input type="text" name="pro_name" placeholder="Tên sp" id="" value="<?= $product['pro_name'] ?>">
        <?= (isset($errors['pro_name']) ? $errors['pro_name'] : '') ?>
        <br>
        <select name="cate_id" id="">
            <!--Đổ dữ liệu của bảng categories vào option-->
            <?php foreach ($cate as $c) : ?>
                <?php if ($c['cate_id'] == $product['cate_id']) : ?>
                    <option value="<?= $c['cate_id'] ?>" selected><?= $c['cate_name'] ?></option>
                <?php else : ?>
                    <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="file" name="image" id="">
        <img src="../images/<?= $product['pro_image'] ?>" width="120" alt="">
        <input type="hidden" name="pro_image" value="<?= $product['pro_image'] ?>">
        <br>
        <input type="number" name="price" min="0" id="" placeholder="price" value="<?= $product['price'] ?>">
        <br>
        <input type="number" name="quantity" id="" placeholder="quantity" value="<?= $product['quantity'] ?>">
        <br>
        <textarea name="intro" id="" cols="130" rows="5" placeholder="Intro"><?= $product['intro'] ?></textarea>
        <br>
        <textarea name="detail" id="" cols="130" rows="10"><?= $product['detail'] ?></textarea>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>