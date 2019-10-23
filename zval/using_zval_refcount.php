<?php

$someFunc = function () {
    return 'some';
};

echo "<br>[";
xdebug_debug_zval('someFunc');
echo "]<br>";

$someFuncB = $someFunc;
$someFuncC = $someFuncB;

echo "<br>[";
xdebug_debug_zval('someFunc');
echo "]<br>";

$someFuncC = function () {
    return 'something new';
};

echo "<br>[";
xdebug_debug_zval('someFuncC');
echo "]<br>";

echo "<br>[";
xdebug_debug_zval('someFuncB');
echo "]<br>";
