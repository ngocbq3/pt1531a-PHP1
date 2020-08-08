<?php
require_once "../connection.php";

if (isset($_POST['btnLuu'])) {
    extract($_REQUEST);

    //Nếu người dùng cập nhật ảnh mới
    if ($_FILES['cate_image']['size'] > 0) {
        $cate_image = $_FILES['cate_image']['name'];
    }

    $sql = "UPDATE categories SET cate_name='$cate_name', cate_image='$cate_image', description='$description' WHERE cate_id=$cate_id";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //thực thi
    if ($stmt->execute()) {
        $message = "Cập nhật dữ liệu thành công";
        //Cập nhật ảnh lên server
        if ($_FILES['cate_image']['size'] > 0) {
            move_uploaded_file($_FILES['cate_image']['tmp_name'], "../images/" . $cate_image);
        }
    } else {
        $message = "Dữ liệu không thể cập nhật";
    }
}

//Lấy id trên thanh URL
$id = $_GET['id'];
//Câu lênh sql theo điều kiện id
$sql = "SELECT * FROM categories WHERE cate_id=$id";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi
$stmt->execute();
//Lấy 1 dòng dữ liệu
$result = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật danh mục</title>
</head>

<body>
    <h2>Cập nhật danh mục</h2>
    <a href="danhmuc.php">danh mục</a>
    <?php if (isset($message)) : ?>
        <h4><?= $message ?></h4>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cate_id" value="<?= $result['cate_id'] ?>">
        <label for="">Tên danh mục</label>
        <br>
        <input type="text" name="cate_name" id="" value="<?= $result['cate_name'] ?>">
        <br>
        <label for="">Hình ảnh</label>
        <br>
        <input type="file" name="cate_image" id="">
        <?php if (!empty($result['cate_image'])) : ?>
            <br>
            <input type="hidden" name="cate_image" value="<?= $result['cate_image'] ?>">
            <img src="../images/<?= $result['cate_image'] ?>" width="120" alt="">
        <?php endif; ?>
        <br>
        <label for="">Mô tả</label>
        <br>
        <textarea name="description" id="" cols="130" rows="10"><?= $result['description'] ?></textarea>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>