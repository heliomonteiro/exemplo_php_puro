<?php
	if (isset($_GET['arquivo'])) {
		include $_GET['arquivo']. ".php";
	}else{
		include "home.php";
	}
?>