<?php
$s = stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);
var_dump($s);
echo "$errno $errstr";
