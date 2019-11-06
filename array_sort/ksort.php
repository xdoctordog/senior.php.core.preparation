<?php

$fruits =
    [
        "d"=>"lemon",
        "a"=>"orange",
        "b"=>"banana",
        "c"=>"apple"
    ];
// ksort — Сортирует массив по ключам
ksort($fruits);
array_walk($fruits, function ($value, $key) {
    echo "$key : $value<br>";
});
