<?php

class A {
    private static $privateStaticVar = 1;
    private $privateVar = 2;
}

class B extends A {}

class C {}

// Позволяет создать функции для работы со скрытыми переменными класса
$funcA = static function &() {
    return static::$privateStaticVar;
    return self::$privateStaticVar;
};
$closure = Closure::bind($funcA, null, 'A');
$varStat = &$closure();
var_dump($varStat);
$varStat ++;
var_dump($varStat);
var_dump($closure());

var_dump('===========================================================================================================');

$funcB = function &() {
    return $this->privateVar;
};
$bObject = new B();
$closureB = Closure::bind($funcB,  $bObject, 'A');
$varB = &$closureB();
var_dump($varB);
$varB ++;
var_dump($varB);
var_dump($closureB());

var_dump('===========================================================================================================');
var_dump('===========================================================================================================');

$closureC = $funcA->bindTo(null, 'A');
$varC = &$closureC();
var_dump($varC);
$varC = '[' . $varC .']';
var_dump($varC);
var_dump($closureC());

var_dump('===========================================================================================================');
$closureD = $funcB->bindTo($bObject, 'B');
$varD = &$closureD();
var_dump($varD);
$varD = '[' . $varD .']';
var_dump($varD);
var_dump($closureD());
