<?php


// #1: Global visibility
class AB {
    const SOME_A = '++SOME++';
}

var_dump(AB::SOME_A);

// #2: Array in constant
define('ANOTHER_CNST', ['b', 'c' => 'BMW E46 ZHP']);
const SOME_CONST = ['d', 'e' => 'BMW E92'];
class A {
    const SOME_CONST = ['a', 'b' => '451'];
}

var_dump(ANOTHER_CNST);

var_dump(A::SOME_CONST);
var_dump(SOME_CONST);

// #3: Case insensitive (before PHP 7.3.0 ONLY)
define('SOME_ANOTHER_CNST', ['b', 'c' => 'BMW E46 ZHP'], true);
var_dump(SoMe_ANOTHER_CNST);

// #4: private constants
class B {
    private const PRIVATE_CONST = ['a', 'b' => 'BMW E90'];
    protected const PROTECTED_CONST = ['Fa', 'b' => 'VG.72.76A'];

    public function getPrivate() {
        return self::PRIVATE_CONST;
    }
    public function getProtected() {
        return self::PROTECTED_CONST;
    }
}

// Cannot access private const B::SOME_CONST
//var_dump(B::SOME_CONST);

var_dump((new B)->getPrivate());
var_dump((new B)->getProtected());

// #5: Initialization constant with expression
class C {
    const SOME_CONST = 1 + 3;
//    const SOME_CONST_B = gmp_div(12, 3);
    const SOME_CONST_C = '1' . '3';
}
var_dump(C::SOME_CONST);
//var_dump(C::SOME_CONST_B);
var_dump(C::SOME_CONST_C);
