<?php

$array = [1, 2, 3, 4, 5, 6, 7777777, 9];
var_dump($array);

// by reference
foreach ($array as &$value) {}
var_dump($array);

// by value (i.e., copy)
foreach ($array as $value) {
//    var_dump($value);
//    var_dump($array);
}
var_dump($array);
