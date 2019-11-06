<?php

$array1 = $array2 = ["img12.png", "img10.png", "img2.png", "img1.png"];

asort($array1);
echo "Typical sort<br>";
var_dump($array1);

natsort($array2);
echo "<br>Sort natural order<br>";
var_dump($array2);
