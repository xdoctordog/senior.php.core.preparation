<?php

class A {

    private $a;

    public function __construct($a) {
        $this->a = $a;
    }

    public function some() {

        return 'A::some';
    }

}

class B extends A {

    private $b;
    private $someFromA;

    public function __construct($b) {
        parent::__construct(101);
        $this->b = $b;

        $this->someFromA = parent::some();
    }
}

var_dump((new B(201)));
