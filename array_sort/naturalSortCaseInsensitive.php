<?php

$array1 = $array2 = ['IMG0.png', 'img12.png', 'img10.png', 'img2.png', 'img1.png', 'IMG3.png'];

sort($array1);
echo "Typical sort<br>";
var_dump($array1);

natcasesort($array2);
echo "<br>Natural order sort (case insensitive)<br>";
var_dump($array2);
