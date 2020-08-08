<?php
require_once "../connection.php";
$id = $_GET['id'];
//Lệnh sql DELETE
$sql = "DELETE FROM categories WHERE cate_id=$id";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi
if ($stmt->execute()) {
    header("location: danhmuc.php?message=Xóa dữ liệu thành công");
    die;
}
