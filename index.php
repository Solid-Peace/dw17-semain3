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

<?php require_once 'pages/navigation.php'; ?>

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
	}

$connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$filter = array("fields" => array("titre_avec_lien_vers_le_catalogue" => "Dans la maison"));
$options = array();

$query = new MongoDB\Driver\Query($filter, $options);

$rows = $connection->executeQuery('quentin_vinot.documents', $query);

foreach($rows as $r){
   print_r($r);
}

?>

</body>
</html>