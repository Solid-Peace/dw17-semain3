<?php 
session_start();

session_unset();
unset($_POST);
header('Location: /dw17/index.php');
 ?>