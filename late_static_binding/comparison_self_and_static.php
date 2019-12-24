<?php

class A {
    public function getStaticClass(){
        return static::class;
    }
    public function getSelfClass(){
        return self::class;
    }
}
class B extends A {}
class C extends B {}

$objC = new C;

var_dump($objC->getStaticClass());// C
var_dump($objC->getSelfClass());// A
