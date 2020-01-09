<?php 
	require 'vendor/autoload.php'; 
	require 'MongoHandler.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>dw17 - semaine3</title>
</head>
<body>

	<h3>Titres des films</h3>

	<?php 

		$mh = new MongoHandler('quentin_vinot.documents');
		$titles = $mh->displayTitleDocuments();

		foreach ($titles as $t) {
			echo $t->fields->titre_avec_lien_vers_le_catalogue . "<br>";
		}
	?>

</body>
</html>