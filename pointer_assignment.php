<?php

//======== Pointer Assignment ================================================================
function &collector() {
    static $collection = array();
    var_dump($collection);
    return $collection;
}
$arr = &collector();
array_push($arr, 'foo');
var_dump($arr);
collector();
