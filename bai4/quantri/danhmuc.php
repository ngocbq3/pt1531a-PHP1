<?php
require_once "../connection.php";
//Câu lệnh sql select
$sql = "Select * from categories";
//echo $sql;
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực hiện câu lệnh
$stmt->execute();
//Lấy dữ liệu
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
</head>

<body>
    <h2>Danh mục sản phẩm</h2>
    <a href="them_danhmuc.php">Thêm mới</a>
    <?php if (isset($_GET['message'])) : ?>
        <div>
            <?php echo $_GET['message'] ?>
        </div>
    <?php endif; ?>
    <table border="1">
        <tr>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        <!--Đổ dữ liệu từ bảng vào -->
        <?php foreach ($result as $r) : ?>
            <tr>
                <td><?= $r['cate_id'] ?></td>
                <td><?= $r['cate_name'] ?></td>
                <td>
                    <img src="../images/<?= $r['cate_image'] ?>" width="120" alt="">
                </td>
                <td><?= $r['description'] ?></td>
                <td>
                    <a href="capnhat_danhmuc.php?id=<?= $r['cate_id'] ?>">Sửa</a> |
                    <a onclick="return confirm('Bạn có chắc chắn xóa không?')" href="xoa_danhmuc.php?id=<?= $r['cate_id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>