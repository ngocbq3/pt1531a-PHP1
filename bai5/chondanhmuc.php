<?php
//Tên server
$hostname = 'localhost';
//username truy cập vào database của mysql
$username = 'root';
//mật khẩu của username
$password = '';
//Tên database truy cập
$dbname = 'pt1531a-php1';
try {
    //Tạo đối tượng kết nối PDO
    $conn = new PDO("mysql:host=$hostname; dbname=$dbname; charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu<br>" . $e->getMessage();
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
    <title>CHọn danh mục sản phẩm</title>
</head>

<body>
    <form action="" method="post">
        <select name="cate_id" id="">
            <?php foreach ($result as $c) : ?>
                <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </form>
</body>

</html>