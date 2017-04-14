<?php


define('APP_PATH',__DIR__.'/../');

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__. '/../lib');

function autoloadPHPMailer($classname){
	echo "autoload_phpmailer";
	echo "<br/>";
	if($classname == 'PHPMailer'){
		include 'PHPMailer/class.phpmailer.php';
	}

}

function autoloadApp($classname){
	echo "autoload_app";
	echo "<br/>";
	include "../src/classes/$classname.php";
}

spl_autoload_register('autoloadPHPMailer');
spl_autoload_register('autoloadApp');

include APP_PATH. 'src/index.php';