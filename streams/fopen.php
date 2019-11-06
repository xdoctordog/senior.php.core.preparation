<?php

//$h = fopen('file://lorem.txt', 'rb'); // DON'T WORK ON LOCAL PC
$handle = fopen("lorem.txt","rb");

while(feof($handle)!==true) {
    echo fgets($handle);
    echo "<br>";
}

fclose($handle);
