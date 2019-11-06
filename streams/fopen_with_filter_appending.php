<?php

$filter = 'convert.base64-encode';
$file = 'lorem.txt';
$h = fopen('php://filter/read=' . $filter . '/resource=' . $file,'r');
fpassthru($h);
fclose($h);
