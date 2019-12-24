<?php


class A {
    protected $b;
    private $c;

    public function setAB($valueB) {
        $this->b = $valueB;
    }

    public function setAC($valueC) {
        $this->c = $valueC;
    }
}

$objA = new A;

// Fatal error: Uncaught Error: Cannot access protected property A::$b in /var/www/example.com/index.php on line 24
// Error: Cannot access protected property A::$b in /var/www/example.com/index.php on line 24
//$objA->b = 10;
//var_dump($objA);

class B extends A {
    public $b;
    protected $c;

    public function setBB($valueB) {
        $this->b = $valueB;
    }

    public function setBC($valueC) {
        $this->c = $valueC;
    }
}
$objB = new B;

$objB->b = 10;
var_dump($objB);

$objB->setAB('=AB=');
$objB->setAC('=AC=');
$objB->setBB('=BB=');
$objB->setBC('=BC=');

var_dump($objB);
