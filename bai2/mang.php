<?php
//Khai báo mảng
$arr = [
    1, 2, 13.5, 'string', 'nguyễn quang đông', 'hà nội'
];
$arr[8] = 'dongnv@gmail.com';

print_r($arr); //Lệnh in ra mang arr

//Mảng 2 chiều
$arr2 = [
    [1, 2, 'nguyễn văn long', 'an', 'HCM'],
    ['trần văn thông', 'thongtv@gmail.com', 'Hà nội']
];
echo "<br>" . $arr2[1][0];

//Khai báo mảng có key và value
$arr3 = [
    'name' => 'Nguyễn Văn Đông',
    'email' => 'dongnv@gmail.com',
    'address' => 'Hà nội'
];

echo "<br>" . $arr3['email'];

echo "<br><br>";
//Vòng lặp foreach với mảng 1 chiều
echo "<h2>Foreach mảng 1 chiều</h2>";
foreach ($arr as $item) {
    echo "Phần tử mảng $item<br>";
}
//Vòng lặp for truy cập mảng
echo "<h2>Vòng lặp for</h2>";
for ($i = 0; $i < count($arr) - 1; $i++) {
    echo "Giá trị phần tử $arr[$i]<br>";
}

//Truy cập mảng 2 chiều
echo "<h2>Mảng 2 chiều</h2>";
foreach ($arr2 as $items) {
    foreach ($items as $item) {
        echo "Giá trị của phần tử: $item<br>";
    }
}
//Truy cập mảng có khóa và giá trị để lấy ra cả khóa và giá trị của nó
echo "<h2>Mảng có key và value</h2>";
foreach ($arr3 as $k => $v) {
    echo "$k: $v<br>";
}
date_default_timezone_set("Asia/Ho_Chi_Minh");

//Ngày tháng trong PHP
$date = new DateTime();

echo $date->format("Y-m-d H:i:s");

$date2 = date("d-m-Y H:i:s");
echo "<br> $date2";
