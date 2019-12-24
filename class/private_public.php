<?php

class A {
    private function temp() {
        return __METHOD__;
    }
}

class B extends A {
    protected function temp() {
        return __METHOD__;
    }
}

class C extends B {
    public function temp() {
        return __METHOD__;
    }
}

$c = new C;

var_dump($c->temp());
