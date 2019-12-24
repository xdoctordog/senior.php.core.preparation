<?php

class A {
    public function sayHooray() {

        return 'Hooray!';
    }

    // Overloading method with another input parameters is not allowed in php
//    public function sayHooray($param) {
//
//        return 'Hooray, ' . $param . '!';
//    }
}

class B extends A {

    // Overriding is allowed in php
    public function sayHooray($param) {

        return 'Hooray, ' . $param . '!';
    }
}

var_dump((new A) ->sayHooray());
var_dump((new B) ->sayHooray('Doggy'));

