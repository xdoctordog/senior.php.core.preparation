<?php

class MyClass
{
    const CONSTANT = 'some value';

    function showConstant() {
        return self::CONSTANT . "<br>";
    }
}

$class = new MyClass();
echo $class->showConstant();

echo $class::CONSTANT."<br>"; // начиная с PHP 5.3.0

echo MyClass::CONSTANT . "<br>";

$classname = "MyClass";
echo $classname::CONSTANT . "<br>"; // начиная с PHP 5.3.0
