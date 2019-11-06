<?php

echo "PHP SERVER: started\n";

$host = "127.0.0.1";
$port = 9000;
// No Timeout
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1) or die(socket_strerror(socket_last_error($socket)));
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");

$input = '';

while ($input !== 'exit') {
    $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
    var_dump($spawn);
    $input = socket_read($spawn, 1024) or die("Could not read input\n" . socket_strerror(socket_last_error($socket)) . "\n");
    var_dump($input);
    $output = $input . "\n";
    socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
}

socket_close($spawn);
socket_close($socket);
echo "PHP SERVER: stoped\n";
