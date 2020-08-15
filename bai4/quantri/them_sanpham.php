<?php
require_once "../connection.php";

//Câu lệnh sql Lấy dữ liệu bảng categories
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
//Validate ten san phẩm và image
$errors = ['pro_name' => '', 'image' => ''];
if (isset($_POST['btnLuu'])) {
    extract($_REQUEST);
    if (trim($pro_name) == '') {
        $errors['pro_name'] = "bạn cần nhập tên sản phẩm";
    }
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
    } else {
        $errors['image'] = "Bạn chưa nhập ảnh";
    }
    if (!array_filter($errors)) {
        //Câu lệnh sql insert
        $sql = "INSERT INTO products(pro_name, cate_id, pro_image, intro, detail, price, quantity) VALUES('$pro_name', '$cate_id', '$image', '$intro', '$detail', '$price', '$quantity')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);
            echo "Thêm dữ liệu thành công!!!";
        } else {
            echo "Lỗi dữ liệu";
        }
    }
}
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
        <input type="text" name="pro_name" placeholder="Tên sp" id="">
        <?= (isset($errors['pro_name']) ? $errors['pro_name'] : '') ?>
        <br>
        <select name="cate_id" id="">
            <!--Đổ dữ liệu của bảng categories vào option-->
            <?php foreach ($cate as $c) : ?>
                <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="file" name="image" id="">
        <?= (isset($errors['image']) ? $errors['image'] : '') ?>
        <br>
        <input type="number" name="price" value="0" min="0" id="" placeholder="price">
        <br>
        <input type="number" name="quantity" id="" placeholder="quantity">
        <br>
        <textarea name="intro" id="" cols="130" rows="5" placeholder="Intro"></textarea>
        <br>
        <textarea name="detail" id="" cols="130" rows="10"></textarea>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>