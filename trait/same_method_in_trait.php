<?php

trait SomeT
{
    public function test()
    {
        return 'from trait A test()';
    }

    public function bigTest()
    {
        return 'from trait A bigTest()';
    }
}

trait SomeTB
{
    public function test()
    {
        return 'from trait B';
    }

    public function bigTest()
    {
        return 'from trait B bigTest()';
    }
}

class B
{
    use SomeT, SomeTB{
        SomeT::test insteadof SomeTB;
        SomeTB::bigTest insteadof SomeT;
        SomeT::bigTest as bbt;
    }
}

$b = new B;

var_dump($b->test());
var_dump($b->bigTest());
var_dump($b->bbt());
