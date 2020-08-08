<?php
require_once "../connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_REQUEST);
    if ($_FILES['pro_image']['size'] > 0) {
        $pro_image = $_FILES['pro_image']['name'];
    } else {
        $pro_image = '';
    }
    $detail = str_replace('\'', '', $detail);
    $sql = "INSERT INTO products set pro_name='$pro_name', cate_id='$cate_id', pro_image='$pro_image', intro='$intro', detail='$detail', price=$price, quantity=$quantity";

    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        if ($pro_image != '') {
            move_uploaded_file($_FILES['pro_image']['tmp_name'], "../images/" . $pro_image);
        }
        header("Location: sanpham.php?message=Thêm dữ liệu thành công");
    } else {
        echo "Thêm dữ liệu thất bại";
    }
}
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <script src="https://cdn.tiny.cloud/1/ld34vclndumv7xny2s3pnsrpxwoe9floxn96fpbl57r085kv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#detail',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
</head>

<body>
    <h3>Thêm sản phẩm</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="pro_name" id="">
        <br>
        <select name="cate_id" id="">
            <?php foreach ($result as $c) : ?>
                <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="file" name="pro_image" id="">
        <br>
        <input type="number" name="price" id="">
        <br>
        <input type="number" name="quantity" id="">
        <br>
        <textarea name="intro" placeholder="Intro" id="" cols="130" rows="4"></textarea>
        <br>
        <textarea id="detail" name="detail" placeholder="Deltai" id="" cols="130" rows="24"></textarea>
        <br>
        <button type="submit">Save</button>
    </form>
</body>

</html>