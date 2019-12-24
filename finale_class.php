<?php

final class AFinale {
    private $a = 1;
}

class SimpleA {
    private $a = 1;
}

// Can't extends final class
class Some extends SimpleA /*extends AFinale*/ {
    private $a = 10;

    public function getA() {

        return $this->a;
    }
}

var_dump((new Some) ->getA());

