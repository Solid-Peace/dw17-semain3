<?php 
	unset($_POST['user']);
	unset($_POST['password']);
	unset($_SESSION['login']);
	header('Location:'.$_SERVER['PHP_SELF']);
 ?>