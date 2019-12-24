<?php

class A {
    public $varPublic = 'public_value';
    public $varPublicA = 'public_valueA';
    public $varPublicB = 'public_valueB';
    protected $varProtected = 'public_protected';
    private $varPrivate = 'public_private';
}

$a = new A;

$query = http_build_query($a, $prefix = '_pref_', $separator = '|');
var_dump($query);
