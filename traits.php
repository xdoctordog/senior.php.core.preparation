<?php

/**
 * Trait SomeTrait
 *
 * Трейт перетирает унаследованные методы своими реализациями.
 * Но не трогает те методы которые уже определены в классе.
 */

trait SomeTrait {
    public function func() {
        echo __METHOD__ . "<br>";
    }
}

class Base {
    public function func() {
        echo __METHOD__ . "<br>";
    }
}

class Typical extends Base {
    use SomeTrait;
    public function func() {
        echo __METHOD__ . "<br>";
    }
}

$obj = new Typical;
$obj->func();
