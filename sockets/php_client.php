<?php

$host = "127.0.0.1";
$port = 9000;
// No Timeout
set_time_limit(0);

$message = $argv[1] ?? 'we are!';

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect toserver\n");
socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n" . socket_strerror(socket_last_error($socket)) . "\n");
$result = socket_read ($socket, 1024) or die("Could not read server response\n");
echo "Reply From Server  :".$result;
socket_close($socket);
