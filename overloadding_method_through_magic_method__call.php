<?php
//======== Overloadding: Magic methods =======================================================
//======== Overloadding method through using the magic method __call() =======================
class Temp {
    private function privateFunc(){
        var_dump("I am private");
    }

    public function publicFunc(){
        var_dump("I am public");
    }
}
class SomeNew extends Temp {
    public function __call($name, $arguments) {
        var_dump($name, $arguments);
    }
}
$a = new SomeNew;
$a->privateFunc();
$a->publicFunc();
