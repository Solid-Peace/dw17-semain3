<a href="index.php"> << Retour >> </a>

<h3>Titres des films de rang 1 à 10</h3>

	<?php 

		$mh = new MongoHandler('quentin_vinot.documents');
		$titles = $mh->displayRangTitles();

		print_r($titles);

		foreach ($titles as $t) {

			echo $t->fields->rang . ":" . $t->fields->titre_avec_lien_vers_le_catalogue . "<br>";
		}
	?>