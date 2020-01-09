<a href="index.php"> << Retour >> </a>

<h3>Titres des films</h3>

	<?php 

		$mh = new MongoHandler('quentin_vinot.documents');
		$titles = $mh->displayTitleDocuments();
				//print_r($titles);

		foreach ($titles as $t) {
			var_dump($t);
			echo $t->fields->titre_avec_lien_vers_le_catalogue . "<br>";
		}
	?>