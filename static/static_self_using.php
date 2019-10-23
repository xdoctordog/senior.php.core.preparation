<?php

class A {
    public static function who() {
        echo "<br><br>";
        echo __CLASS__;
        echo "<br><br>";
    }
    public static function test() {
        self::who();
    }
    public static function testStatic() {
        static::who();
    }
}

class B extends A {
    public static function who() {
        echo "<br><br>";
        echo __CLASS__;
        echo "<br><br>";
    }
}

B::test();
B::testStatic();
