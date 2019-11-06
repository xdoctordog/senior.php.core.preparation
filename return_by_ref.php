<?php

class ConfigObj
{
    private $values;

    // using ArrayObject rather than array
    public function __construct() {
        $this->values = new ArrayObject();
    }

    public function getValues() {
        return $this->values;
    }
}

$config = new ConfigObj();

// Обьект отдается в данном случае по ссылке даже без указания
// Поэтому этот код будет работать.
// Т.е. по факту функция ConfigObj::getValues() работает так как если бы
// перед именем был указан символ амперсанд public function &getValues().

// Возвращать же ссылку на массив либой же обьект ( который и так возвращается по ссылке )
// плохая идея -- потому как это нарушает принципы инкапсуляции
$config->getValues()['test'] = 'test';
var_dump($config->getValues()['test']);


class Config
{
    private $values = ['oneValue', 'oneValueB'];

    public function &getValuesByRef() {
        return $this->values;
    }

    public function getValues() {
        return $this->values;
    }

    public function debug_zval_dump() {
        echo "<pre><br>";
        debug_zval_dump($this->values);
        echo "<br></pre>";
    }
    public function _unset() {

        unset($this->values);
    }
}

$config = new Config();
$config->debug_zval_dump();
$config->getValues()['test'] = 'test';
$values = $config->getValues();
$values['test'] = 'test';
$config->debug_zval_dump();
$values = ['oneValue', 'oneValueB'];
$values['test'] = 'test';
echo "<pre><br>";
debug_zval_dump($values);
echo "<br></pre>";
var_dump($config->getValues()['test']);

// Returning by reference
$config->getValuesByRef()['test'] = 'test';
var_dump($config->getValues()['test']);
