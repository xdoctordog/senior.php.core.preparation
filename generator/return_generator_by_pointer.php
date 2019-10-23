<?php

function &gen_reference() {
    $value = 3;
    while ($value > 0) {
        yield $value;
    }
}

$obj = gen_reference();
echo "<br>[";
xdebug_debug_zval('obj');
echo "]<br>";

var_dump($obj);
foreach ($obj as &$number) {
    $number--;
    echo $number . '... ';
}
