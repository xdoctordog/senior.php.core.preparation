<?php

$fruits =
    [
        "d" => "lemon",
        "a" => "orange",
        "b" => "banana",
        "c" => "apple"
    ];
// asort — Сортирует values в массиве, сохраняя ключи
asort($fruits);
array_walk($fruits, function($value, $key){
    echo "$key : $value<br>";
});
