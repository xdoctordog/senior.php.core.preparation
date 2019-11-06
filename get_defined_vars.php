<?php

$b = null;
if (array_key_exists('b', get_defined_vars() )) {
    var_dump($b);
}

$someArr = [
    'someKey' => null,
];
$definedVars = get_defined_vars();
if (array_key_exists('someArr', $definedVars)) {
    if (array_key_exists('someKey', $definedVars['someArr'])) {
        var_dump($someArr['someKey']);
    }
}
