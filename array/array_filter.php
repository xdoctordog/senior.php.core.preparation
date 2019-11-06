<?php

function odd($var)
{
    return $var & 1;
}

$array1 = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4,
    'e' => 5
];
$array2 = [6, 7, 8, 9, 10, 11, 12, 13];

echo "ODD:\n";
// array_filter -- Фильтрует массив с помощью вызова функции callback'а для каждого элемента массива.
var_dump(array_filter($array1, "odd"));
var_dump(array_filter($array2, "odd"));
