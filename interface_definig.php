<?php

interface ISome {
//    private function getPrivate();
//    protected function getProtected();
    public function getPublic(int $param);

    public function getSome() : int;
}

interface IAnother extends ISome{

    public function getPublic($param);

    public function getSome();
}

class A implements /*IAnother*/ ISome{
    public function getPublic($param) {

        return 'Hooray, ' . $param . '!';
    }

    public function getSome() {

        return 'some';
    }
}

var_dump((new A) ->getPublic('Harry'));
var_dump((new A) ->getSome());
