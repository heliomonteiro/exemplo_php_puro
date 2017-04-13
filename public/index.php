<?php


define('APP_PATH',__DIR__.'/../');

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__. '/../lib');

function __autoload($classname){
	//echo $classname;
	if($classname == 'PHPMailer'){
		include 'PHPMailer/class.phpmailer.php';
	}

}

include APP_PATH. 'src/index.php';