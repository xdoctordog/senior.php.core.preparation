<?php

class A {

    private $a;

    // Can't create new B object when constructor is not public here
    /*private protected */public  function __construct($a) {
    $this->a = $a;
}

    public function some() {

        return 'A::some';
    }

}

class B extends A {

    private $b = 'default';
    private $someFromA = 'default';

}

var_dump((new B(201)));
