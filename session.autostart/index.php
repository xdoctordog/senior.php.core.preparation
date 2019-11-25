<?php

/**
 * If we are using the another session name, so all the session data will be accessible only when
 * you are set the same session name before session_start() calling.
 */

session_name('TEMP');
session_start();
$_SESSION['foo'] = 'bar';

var_dump($_SESSION);
