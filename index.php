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
	}
	?>

</body>
</html>