<?php

class A {
    private $a;

    public function setA($a) {
        $this->a = $a;
    }
}

class B extends A {
    protected $a;

    public function getA() {
        return $this->a;
    }
}

$b = new B;

$b->setA(1101);
var_dump($b->getA());// null
