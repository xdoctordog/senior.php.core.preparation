<?php

$h = fopen('lorem.txt', 'r');
// Appending filter to stream
stream_filter_append($h, 'convert.base64-encode');
fpassthru($h);
fclose($h);
