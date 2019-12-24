<?php

class A {
    private $c;

    public function setAC($valueC) {
        $this->c = $valueC;
    }
}

class B extends A {
    protected $c;

    public function setBC($valueC) {
        $this->c = $valueC;
    }
}
$objB = new B;
$objB->setAC('=AC=');
$objB->setBC('=BC=');
var_dump($objB);