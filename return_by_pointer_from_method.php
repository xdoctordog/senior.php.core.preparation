<?php

class foo {
    public $value = 1;
    // Here is ampersand-symbol
    public function &getValue() {
        return $this->value;
    }
}
$obj = new foo;
// Here is ampersand-symbol also
$myValue = &$obj->getValue();
var_dump($myValue);
$obj->value = 2;
var_dump($obj->value);
var_dump($myValue);
