<?php
$x = 10;
//Phát biểu if
if ($x > 10) {
    echo "Số $x > 10";
} else if ($x === 10) {
    echo 'Số ' . $x . ' = 10';
} else {
    echo "Số $x < 10";
}

//Phát biểu switch .. case
switch ($x) {
    case 1:
        echo "bạn chọn lệnh 1";
        break;
    case 10:
        echo "bạn chọn lệnh 10";
        break;
    default:
        echo "Bạn không chọn lệnh nào cả!";
}
