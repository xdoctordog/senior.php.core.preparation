<?php

$fruits =
    [
        "d" => "lemon",
        "a" => "orange",
        "b" => "banana",
        "c" => "apple"
    ];

function test_print($value, $key)
{
    $key = '[->' . $key . '<-]';
    $value = '[---' . $value . '---]';
    echo "[$key. $value]<br />";
}

$testPrintFunction = function ($value, $key)
{
    $key = '[->' . $key . '<-]';
    $value = '[---' . $value . '---]';
    echo "[$key. $value]<br />";
};

echo "Before ...:<br>";
// array_walk - позволяет обработать элементы массива,
// но не изменяет их внутри этого самого массива переданного по ссылке
// и не возвращает измененный массив.
// Наверное полезна может быть в весьма ограниченных ситуациях.
// Функция для обработки должна принимать только два аргумента (key, value)
array_walk($fruits, 'test_print');
var_dump($fruits);

array_walk($fruits, $testPrintFunction);
var_dump($fruits);
