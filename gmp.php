<?php

$a = 3;
$b = 24;
$result = gmp_legendre($a, $b);

var_dump($result);

$a = 12;
$b = 11;
$result = gmp_legendre($a, $b);

var_dump($result);

$a = 53;
$b = 18;
$result = gmp_legendre($a, $b);

var_dump($result);

$a = 18;
$b = 53;
$result = gmp_legendre($a, $b);

var_dump($result);

$a = 3;
$b = 4;
$result = gmp_add($a, $b);
var_dump($result);

