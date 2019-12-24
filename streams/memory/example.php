<?php

$inputStream = fopen('php://memory', 'r+');
$content = ['a' => 'valueA'];

fwrite($inputStream, serialize($content));
rewind($inputStream);

$readContent = fread($inputStream, 100);
var_dump($readContent);
