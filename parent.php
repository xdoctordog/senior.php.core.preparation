<?php

class ZeroAA {
    public static function test() {
        echo "<br>";
        echo __METHOD__;
        echo "<br>";
    }
}

class ZeroA extends ZeroAA {
    public static function test() {
        echo "<br>";
        echo __METHOD__;
        echo "<br>";
    }
}

class A extends ZeroA {

    public static function test() {
        parent::test();
    }

    public static function testB() {
        ZeroA::test();
    }
}

A::test();
ZeroA::test();

A::testB();