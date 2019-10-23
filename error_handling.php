<?php

class ErrorHandler {
    public function handler($errno, $errstr){
        echo "<b>Error:</b> [$errno] $errstr";
    }
}
$handler = new ErrorHandler();
set_error_handler([$handler, 'handler']);
//trigger error
echo($test);
