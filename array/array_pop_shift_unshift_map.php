<?php

$queue = [
    '2t' => 'potato',
    100 => 'pineapple',
    '5t' => 'cucumber',
    'lemon',
    'citrus',
    '100t' => 'carrot',
    'melon',
    '99t' => 'lime',
];

var_dump($queue);

// Нумерация двигается назад при добавлении элементов в начало массива
// Но только для целочисленных ключей
// Вызов этой функции сбрасывает всю целочисленную нумерацию которая была "до"
array_unshift($queue, "apple", "raspberry");
var_dump($queue);

var_dump(array_pop($queue));
var_dump($queue);

var_dump(array_shift($queue));
var_dump($queue);

$func = function($value) {
    return '[prep]' . $value . '[/prep]';
};
var_dump(array_map($func, $queue));

// Не изменяет значения исходного массива даже при передечи по ссылке &$value
function someFunc (&$value) {
    $value = ' == ' . $value . ' == ';
    return '[someFunc]' . $value . '[/someFunc]';
};

// Можно передавать по имени функцию
$result = array_map('someFunc', $queue);

var_dump($result);
var_dump($queue);

// Либо в качестве обьекта анонимную функцию
var_dump(array_map($func, $result));
