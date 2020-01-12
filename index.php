<?php 
session_start();
require 'vendor/autoload.php'; 
require 'MongoHandler.php';
require 'MongoHandlerClient.php';
require 'Login.php';
require 'Host.php';
$base_url = $_SERVER['SERVER_NAME']
?>

<!DOCTYPE html>
<html>
<head>
	<title>dw17 - semaine3</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

<?php 

	if(isset($_SESSION['session_start']) && !empty($_SESSION['session_start']))  {
		require_once 'pages/navigation.php'; 
		$host = new Host($_SESSION['dbName'], $_SESSION['mediaCollectionName'], $_SESSION['userCollectionName']);
		$mh = $host->mh;
		$mhc = $host->mhc;
	}else{
		require_once 'pages/connexionDB.php';
		var_dump($_SESSION['session_start']);
		var_dump($_POST);

	}
?>


<div class="main">
<?php 

//var_dump($_SESSION);
/*
echo '<br> <pre>';
var_dump($mhc);
echo "</pre>";
*/

	if (isset($_GET['output'])) {
		if ($_GET['output'] == "allTitles") {
			require_once 'pages/allTitles.php';
		}
		if ($_GET['output'] == "rangTitles") {
			require_once 'pages/rangTitles.php';
		}
		if ($_GET['output'] == "auteurN") {
			require_once 'pages/auteurN.php';
		}
		if ($_GET['output'] == "typeDocNot") {
			require_once 'pages/typeDocNot.php';
		}
		if ($_GET['output'] == "typeDoc") {
			require_once 'pages/typeDoc.php';
		}
		if ($_GET['output'] == "login") {
			require_once 'pages/login.php';
		}
		if ($_GET['output'] == "logout") {
			require_once 'pages/logout.php';
		}
		if ($_GET['output'] == "exit") {
			require_once 'pages/exit.php';
		}
	}
?>
</div>

</body>
</html>