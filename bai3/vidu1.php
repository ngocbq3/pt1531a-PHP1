<?php
//Hàm tính tổng của 2 số
function tinhTong($a, $b)
{
    echo "<p>Tổng của $a + $b = " . ($a + $b) . "</p>";
}

function tinhTong2(&$a, $b)
{
    $a++;
    return $a + $b;
}

function kiemtra()
{
    global $soa;
    $soa++;
    echo "<p>Bạn đang dùng biến toàn cục $soa</p>";
}
//Hàm tính tổng nhiều số không biết trước
function tinh_tong_nhieu_so()
{
    $arr = func_get_args();
    $t = 0;
    $s = "";
    foreach ($arr as $a) {
        $t = $t + $a;
        $s = $s . $a . " + ";
    }
    $s = rtrim($s, "+ ") . " = ";
    return $s . $t;
}
//Sử dụng hàm
$soa = 10;
$sob = 23.3;
tinhTong($soa, $sob);

echo "<p>Tổng của $soa + $sob = " . tinhTong2($soa, $sob) . "</p>";
//kiemtra();
echo "Tổng = " . tinh_tong_nhieu_so(12, 32, 3, 4, 12.4, 13, 22.4, 53, 65);

echo "<p>soa = $soa</p>";
