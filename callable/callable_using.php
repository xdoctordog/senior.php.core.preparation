<?php

//======== Callable using ====================================================================
class A {
    public static function who() {
        echo "A\n";
        echo "<br>";
    }
}
class B extends A {
    public static function who() {
        echo "B\n";
        echo "<br>";
    }
}
call_user_func(array('B', 'parent::who'));

