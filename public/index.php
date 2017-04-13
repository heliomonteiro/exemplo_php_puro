<?php

//chdir(dirname(__DIR__));
define('APP_PATH',__DIR__.'/../');

//echo get_include_path();
set_include_path(get_include_path().PATH_SEPARATOR.__DIR__. '/../lib/PHPMailer');
echo get_include_path();

include APP_PATH. 'src/index.php';