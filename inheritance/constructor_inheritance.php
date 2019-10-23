<?php

class Temp {
    public function __construct($a){}
}

class Some extends Temp {
    public function __construct(){
    }
}

class OnceMoreSome extends Temp {
    public function __construct($a, $c){
    }
}

$objSome = new Some();
$objTemp = new Temp('d');

$objOnceMoreSome = new OnceMoreSome('d', 'dd');

var_dump($objSome);
var_dump($objTemp);
var_dump($objOnceMoreSome);
