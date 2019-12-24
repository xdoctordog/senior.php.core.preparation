<?php

function error_handler($errNo, $errStr, $errFile, $errLine) {
    var_dump(
        [
            '$errNo' => $errNo,
            '$errStr' => $errStr,
            '$errFile' => $errFile,
            '$errLine' => $errLine,
        ]
    );

    return false;
}

set_error_handler('error_handler');

trigger_error('I am user notice', E_USER_NOTICE);

$a = 4;
var_dump($a);

trigger_error('I am user warning', E_USER_WARNING);

$a = 5;
var_dump($a);

trigger_error('I am user deprecated', E_USER_DEPRECATED);

$a = 6;
var_dump($a);

// Только после вызывания пользовательской ошибки останавливается выполнение скрипта
trigger_error('I am user error', E_USER_ERROR);

$a = 7;
var_dump($a);
