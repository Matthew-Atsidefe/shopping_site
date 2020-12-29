<?php 
	session_start();

	if (isset ($_SESSION['admin'])) {
		include("cpanel.php");
	} else {
		include("login.php");
	}
	

 ?>