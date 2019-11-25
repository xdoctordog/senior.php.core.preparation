<?php

var_dump($_COOKIE);

/**
 * REQUEST HOST: http://y.x.blog.example.com/
 */
//======================================================================================================================
/**
 * Something about: 4.3.2  Rejecting Cookies (https://tools.ietf.org/html/rfc2109#section-4.3.2)
 *
 * To prevent possible security or privacy violations, a user agent
 * rejects a cookie (shall not store its information) if any of the
 * following is true:
 *
 * (1) The value for the Path attribute is not a prefix of the request-URI. [FAILED]
 *
 */
// Chrome & FireFox set Path to /
$value = 'Some-value';
setcookie("Some-key", $value, time() + 3600, "*^@%#*&^#%@*&^%#*&^/pp", ".y.x.blog.example.com");

// Missing first dot in Domain parameter is added by Chrome & FireFox. Path is: /
$value = 'Some-value-a';
setcookie("Some-key-a", $value, time() + 3600, "*^@%#*&^#%@*&^%#*&^/pp", "y.x.blog.example.com");

// Success for both Chrome & FireFox. Path is: /
$value = 'Some-value-b';
setcookie("Some-key-b", $value, time() + 3600, "*^@%#*&^#%@*&^%#*&^/pp", ".x.blog.example.com");

// Success for both Chrome & FireFox. Path is: /
$value = 'Some-value-c';
setcookie("Some-key-c", $value, time() + 3600, "*^@%#*&^#%@*&^%#*&^/pp", "x.blog.example.com");

// Success for both Chrome & FireFox. Path is: /
$value = 'Some-value-d';
setcookie("Some-key-d", $value, time() + 3600, "*^@%#*&^#%@*&^%#*&^pp", "x.blog.example.com");

// Success for both Chrome & FireFox. Path is: /
$value = 'Some-value-e';
setcookie("Some-key-e", $value, time() + 3600, "*", "x.blog.example.com");

// REJECTED by both Chrome & FireFox.
$value = 'Some-value-eA';
setcookie("Some-key-eA", $value, time() + 3600, "/pub", "x.blog.example.com");

// REJECTED by both Chrome & FireFox.
$value = 'Some-value-eB';
setcookie("Some-key-eB", $value, time() + 3600, "/pub/", "x.blog.example.com");

// Success for both Chrome & FireFox. But Path is: /
$value = 'Some-value-eC';
setcookie("Some-key-eC", $value, time() + 3600, "pub/", "x.blog.example.com");

/**
 * Really can't imagine some incorrect Path which will be ignored by Chrome & FireFox
 */

// Even this variant works well. Success for both Chrome & FireFox. Path is: /
$value = 'Some-value-f';
setcookie("Some-key-f", $value, time() + 3600, "", "x.blog.example.com");
//======================================================================================================================
/**
 * (2) The value for the Domain attribute contains no embedded dots or does not start with a dot. [?WORKS]
 *
 * It works because Domain parameter should be as requested host or its part from the dot to the end.
 */

// Rejected by both Chrome & FireFox.
$value = 'Some-value-g';
setcookie("Some-key-g", $value, time() + 3600, "/", "x_blog_example_com");

// Rejected by both Chrome & FireFox.
$value = 'Some-value-h';
setcookie("Some-key-h", $value, time() + 3600, "/", "x_blog_example.com");

// Rejected by both Chrome & FireFox.
$value = 'Some-value-i';
setcookie("Some-key-i", $value, time() + 3600, "/", "x_blog.example.com");

// Works well for both Chrome & FireFox.
$value = 'Some-value-k';
setcookie("Some-key-k", $value, time() + 3600, "/", "blog.example.com");
//======================================================================================================================
/**
 * (3) The value for the request-host does not domain-match the Domain attribute. [WORKS]
 */

//======================================================================================================================
/**
 * (4) The request-host is a FQDN (not IP address) and has the form HD, [WORKS]
 * where D is the value of the Domain attribute, and H is a string
 * that contains one or more dots.
 */

// Rejected by both Chrome & FireFox.
$value = 'Some-value-m';
setcookie("Some-key-m", $value, time() + 3600, "/", "z.y.x.example.com");

// Rejected by both Chrome & FireFox.
$value = 'Some-value-n';
setcookie("Some-key-n", $value, time() + 3600, "/", ".z.y.x.example.com");

// Rejected by both Chrome & FireFox.
$value = 'Some-value-o';
setcookie("Some-key-o", $value, time() + 3600, "/", "p.z.y.x.example.com");

/**
 * Summary: Path может быть все что угодно -- тогда оно конвертируется в текущий Path ( тут это корневой Path / )
 * Domain должен быть такой же как и запрашиваемый хост либо любой уровнем выше (Родительский домен),
 * ! Но запрещено устанавливать cookie для дочернего домена,
 * т.е. example.com не может установаить cookie для site.example.com -- Такая кука будет реджектнута браузером.
 */
