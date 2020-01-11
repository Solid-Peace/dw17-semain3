<?php 
	unset($_POST['user']);
	unset($_POST['password']);
	unset($_SESSION['connected']);
	header('Location:'.$_SERVER['PHP_SELF']);
 ?>