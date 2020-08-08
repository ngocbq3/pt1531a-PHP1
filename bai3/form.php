<?php
if (isset($_POST['btnGui'])) {
    if (isset($_POST['thanhpho']) && isset($_POST['sothich'])) {
        $thanhpho = $_POST['thanhpho'];
        $sothich = $_POST['sothich'];
        var_dump($thanhpho);
        echo "<br>";
        var_dump($sothich);
    } else {
        echo "Bạn cần chọn thành phố và sở thích";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <select name="thanhpho[]" multiple="4" id="">
            <option value="HN">Hà Nội</option>
            <option value="HP">hải phòng</option>
            <option value="QN">Quảng Ninh</option>
            <option value="KH">Khánh hòa</option>
            <option value="HCM">Hồ chí minh</option>
            <option value="DN">Đà nẵng</option>
        </select>
        <br>
        <label for="">Sở thích</label>
        <input type="checkbox" name="sothich[]" value="Bóng đá" id=""> Bóng đá
        <br>
        <input type="checkbox" name="sothich[]" value="Bóng rổ" id=""> Bóng rổ
        <br>
        <input type="checkbox" name="sothich[]" value="Mua sắm" id=""> Mua sắm
        <br>
        <input type="checkbox" name="sothich[]" value="Du lịch" id=""> Du lịch
        <br>
        <button type="submit" name="btnGui">Gửi</button>
    </form>
</body>

</html>