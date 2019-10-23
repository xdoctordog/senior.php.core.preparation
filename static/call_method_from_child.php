<?php

class A {

    public static function test() {
        static::some();
    }
}

class B extends A {

    public static function some() {
        echo "I am some in B class <br>";
    }
}

B::test();
//A::test();// Error!
