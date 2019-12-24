<?php

class C {
    public function __invoke($name){
        return 101;
    }
}
$c = new C;
$result = call_user_func($c, 'PHP');

var_dump($result);
