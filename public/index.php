<?php
// echo dirname(__FILE__);
require_once(dirname(__FILE__) . '/../src/config/config.php');

$uri = urldecode($_SERVER['REQUEST_URI']);

if ($uri == '/cms/' || $uri == ''){
    $uri = 'login.php';
}

require_once(dirname(__FILE__) . "/../src/controllers/$uri");