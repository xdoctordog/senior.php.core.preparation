<?php

$scale = 30;

$a = 3;
$b = 2;

$result = bcadd($a, $b, $scale);
var_dump($result);

$a = 3;
$b = 3;
$result = bccomp($a, $b, $scale);
var_dump($result);

$a = 6;
$b = 2;
$result = bcdiv($a, $b, $scale);
var_dump($result);

$a = 7;
$b = 2;
$result = bcdiv($a, $b, $scale);
var_dump($result);

$a = 7;
$b = 2;
$result = bcmod($a, $b, $scale);
var_dump($result);

$a = 5;
$b = 2;
$result = bcmul($a, $b, $scale);
var_dump($result);

$a = 5;
$b = 200;
$result = bcpow($a, $b, $scale);
var_dump($result);

$a = 5;
$b = 1;
$result = bcpowmod($a, $b, 3, $scale);
var_dump($result);

$a = 5;
$result = bcsqrt($a, $scale);
var_dump($result);

$a = 5;
$b = 2;
$result = bcsub($a, $b, $scale);
var_dump($result);
