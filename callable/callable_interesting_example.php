<?php

//======== Callable interesting example ====================================================================

class C {
    public function __invoke($name) {
        echo 'Hello ', $name, "\n";
    }
}
$c = new C();
call_user_func($c, 'PHP!');
echo "<br>";
echo "<br>";
