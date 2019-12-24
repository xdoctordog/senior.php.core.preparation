<?php

/**
 * REQUEST HOST: http://y.x.blog.example.com/pub/
 */

var_dump($_COOKIE);

// Success for both Chrome & FireFox. Path is: /pub
$value = 'Some-value-eApub';
setcookie("Some-key-eApub", $value, time() + 3600, "/pub", "x.blog.example.com");

// Success for both Chrome & FireFox. Path is: /pub/
$value = 'Some-value-eBpub';
setcookie("Some-key-eBpub", $value, time() + 3600, "/pub/", "x.blog.example.com");

// Success for both Chrome & FireFox. Path is: /pub
$value = 'Some-value-eCpub';
setcookie("Some-key-eCpub", $value, time() + 3600, "pub/", "x.blog.example.com");

// Success for both Chrome & FireFox. Path is: /pub
$value = 'Some-value-eDpub';
setcookie("Some-key-eDpub", $value, time() + 3600, "pub", "x.blog.example.com");

// Also works in both Chrome & FireFox. Path is: /pub
$value = 'Some-value-eEpub';
setcookie("Some-key-eEpub", $value, time() + 3600, "#pub", "x.blog.example.com");

// Also works in both Chrome & FireFox. Path is: /pub
$value = 'Some-value-fEpub';
setcookie("Some-key-fEpub", $value, time() + 3600, "#pub&", "x.blog.example.com");

// Родительский Path может установить куку для родительского URL
$value = 'Some-value-eFpub';
setcookie("Some-key-eFpub", $value, time() + 3600, "/", "x.blog.example.com");

// Родительский Path может установить куку для родительского Path и эта кука будет действовать и на текущем Path
$value = 'Some-value-HFpub';
setcookie("Some-key-HFpub", $value, time() + 3600, "/", "y.x.blog.example.com");

/**
 * Summary: На вложенном дочернем уровне действуют родительские cookie.
 * Т.е. куки которые прилетели для дочернего урла при вызове родительского.
 * Они сохраняются и начинают действовать при переходе на соответствующий дочерний урл.
 *
 * Похоже при невозможности распознать Path - его значение устанавливается в текущий Path запроса.
 *
 * Path любого уровня может установить куку для Path любого уровня,
 * при переходе на который она будет срабатывать, а именно браузер будет отправлять эту куку на сервер в заголовке.
 */

