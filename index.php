<?php 
session_start();
require 'vendor/autoload.php'; 
require 'MongoHandler.php';
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
	require_once 'pages/navigation.php'; 
	$mh = new MongoHandler('quentin_vinot.documents');
?>
<div class="main">
<?php 
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
	}
?>
</div>

</body>
</html>