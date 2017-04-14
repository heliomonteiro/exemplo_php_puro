<?php

define('APP_PATH',__DIR__.'/../');

include APP_PATH . 'lib/SplClassLoader.php';

$loader = new SplClassLoader('Guzzle',APP_PATH . 'lib/vendor/guzzle/src');
$loader->register();

$loader = new SplClassLoader('SON',APP_PATH . 'src');
$loader->register();

include APP_PATH. 'src/index.php';