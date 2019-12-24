<?php

class A {
    public function method(){
        return __METHOD__;
    }
}


class B extends A {
    public function method(){
        return __METHOD__;
    }
}


class C extends B {
    public function method(){
        return parent::method();
    }
}

$objC = new C;
var_dump($objC->method());
