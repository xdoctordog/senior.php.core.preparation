<?php

for ($c = 'a'; $c <= 'z'; $c++) {
    echo $c . "<br>";
}
$var = (boolean)('aa' < 'z');
var_dump($var);

for ($i = ord('a'); $i <= ord('z'); $i++) {
    echo chr($i) . "<br>";
}

$letters = range('a', 'z');
for ($i = 0; $i < count($letters); $i++) {
    echo $letters[$i] . "<br>";
}
