<?php

class A {

    public static function test() {
        echo 'A::test' . "<br>";
    }

    public static function ceesome() {
        echo 'A::ceesome' . "<br>";
    }

    public static function cee() {
        echo 'A::cee' . "<br>";
    }
}

class B extends A {

    public static function some() {
        parent::test();
    }

    public static function cee() {
        echo 'B::cee' . "<br>";
    }
}

B::test();

class C extends  B {

    public static function ceesome() {

        return parent::ceesome();
    }
}
C::ceesome();
C::cee();
