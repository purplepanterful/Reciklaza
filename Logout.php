<?php 
	if (isset($_POST['status']) && $_POST['status']=="izlogovan") {
	session_start();
	//echo "nestooo";
	session_unset();
	session_destroy();
	$_SESSION = array();
	}

	

 ?>