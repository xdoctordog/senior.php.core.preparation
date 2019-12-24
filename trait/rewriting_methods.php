<?php

trait SomeT {
    public function test() {
        return 'from trait';
    }

    protected function testProtected() {
        return 'from trait::testProtected';
    }

    protected function testPrivate() {
        return 'from trait::testPrivate';
    }
}

class A {
    public function test() {
        return 'from A';
    }

    protected function testProtected() {
        return 'from A::testProtected';
    }

    public function runTestProtected() {
        return $this->testProtected();
    }

    protected function testPrivate() {
        return 'from A::testPrivate';
    }

    public function runTestPrivate() {
        return $this->testPrivate();
    }
}

class B extends A {
    use SomeT;
//    public function test() {
//        return 'from B';
//    }
}

$b = new B;

var_dump($b->test());
var_dump($b->runTestProtected());
var_dump($b->runTestPrivate());

/**
 * Методы обьявленые в текущем классе имеют приоритет над методами что обьявлены в трейте с тем же именем.
 * Методы из трейта имеют приоритет над методами базового класса с тем же именем.
 */