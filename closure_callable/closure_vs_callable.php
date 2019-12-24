<?php

function runClosure(Closure $closure) {
    $closure();
}

function runCallable(Callable $callback) {
    $callback();
}

function some() {
    echo 'Hello, World!';
}

// Fatal error: Uncaught TypeError: Argument 1 passed to runClosure() must be an instance of Closure, string given
runClosure('some');

// Hello, World!
runCallable('some');
