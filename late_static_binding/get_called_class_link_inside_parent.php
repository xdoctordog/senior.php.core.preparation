<?php

class A {
    public function getClass(){
        return static::class;
    }
}
class B extends A {}
class C extends B {}

$objC = new C;

var_dump($objC->getClass());
