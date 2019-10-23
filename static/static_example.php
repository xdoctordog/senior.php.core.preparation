<?php

class A {
    private function foo() {
        echo "success!<br>";
    }
    public function test() {
        $this->foo();
        static::foo();
    }
}

class B extends A {
    /* foo() будет скопирован в В, следовательно его область действия по прежнему А,
       и вызов будет успешным */
}

class C extends A {
    private function foo() {
        echo "FOO!<br>";
        /* исходный метод заменен; область действия нового метода - С */
    }
}

$b = new B();
$b->test();
$c = new C();
$c->test();
