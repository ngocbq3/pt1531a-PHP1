<?php
require_once "../connection.php";
if (isset($_POST['btnLuu'])) {
    $cate_name = $_POST['cate_name'];
    $description = $_POST['description'];
    //Kiểm tra xem người dùng có đưa file vào form không
    if ($_FILES['cate_image']['size']) {
        //Lưu lại tên file
        $cate_image = $_FILES['cate_image']['name'];
    } else {
        $cate_image = "";
    }
    //Câu lệnh SQL insert
    $sql = "INSERT INTO categories(cate_name, cate_image, description) VALUES('$cate_name', '$cate_image', '$description')";
    //Chuẩn bị
    $stmt = $conn->prepare($sql);
    //Nếu Thực thi thành công
    if ($stmt->execute()) {
        //Upload ảnh lên server
        if (!empty($cate_image)) {
            move_uploaded_file($_FILES['cate_image']['tmp_name'], '../images/' . $cate_image);
        }
        header("location:danhmuc.php?message=Thêm dữ liệu thành công");
        die;
    } else {
        echo "Thêm dữ liệu thất bại";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
</head>

<body>
    <h2>Thêm danh mục</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Tên danh mục</label>
        <br>
        <input type="text" name="cate_name" id="">
        <br>
        <label for="">Hình ảnh</label>
        <br>
        <input type="file" name="cate_image" id="">
        <br>
        <label for="">Mô tả</label>
        <br>
        <textarea name="description" id="" cols="130" rows="10"></textarea>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>