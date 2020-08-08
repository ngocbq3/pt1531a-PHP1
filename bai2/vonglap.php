<?php

//Vòng lặp while
$dem = 0;
while ($dem < 5) {
    $dem++;
    echo "Vòng lặp while thứ $dem<br>";
}
//Vòng lặp do .. while
do {
    echo "Vòng lặp do .. while thứ $dem<br>";
    $dem--;
} while ($dem > 0);

//Vòng lặp for
for ($i = 1; $i <= 5; $i++) {
    echo "Vòng lặp for thứ $i<br>";
}
