<?php

$arr = [
    null => 1,
    true => 7,
    false => 70,
    1 => 'valueB',
    '2' => 'valueC',
//    ['1', 2] => 'valueD',
//    fopen('file:///mnt/sources/m2-ee/pub/lorem.txt', 'rb') => 'valueE',
    '2sdkfbds' => 'valueF',
];


var_dump(array_keys($arr));
var_dump($arr);

$arrB = [

    4.01 => 'float',

    false => 'bool: false',
    true => 'bool: true',

    null => 'null',
];
var_dump($arrB);
