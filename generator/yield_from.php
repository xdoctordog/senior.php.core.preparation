<?php
/**
 * yield from перекрывает те значения которые были yield'нуты ранее
 * а также дополняет с конца те yield'ы которые идут после yield from
 * если внутри импортированного generator-function количество yield'ов
 * превышает количество yield'ов в родительской generator-function
 */
function inner() {
    yield 0;
    yield 0;
    yield 0;
    yield 0;
    yield 0;
    yield 0;
    yield 0;
    yield 0;
    yield 0;
    yield 0;
    yield 0;
}

function gen() {
    yield 1;
    yield 1;
    yield 1;
    yield 1;
    yield 1;
    yield 1;
    yield 1;
    yield 1;
    yield from inner();
    yield 1;
    yield 1;
}

$gen_obj = gen();
var_dump(iterator_to_array($gen_obj));
