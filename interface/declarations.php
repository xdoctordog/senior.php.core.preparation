<?php

interface iSome {
    public function get($some=7);
    public function getA($some=7);
}

class Some implements iSome {
    public function get($another = 707) {
        return $another;
    }
    // The value by the default can be different
    public function getA($arg = 'Dogg') {
        return $arg;
    }
}

$oof = new Some;

var_dump($oof->get());
var_dump($oof->getA());
