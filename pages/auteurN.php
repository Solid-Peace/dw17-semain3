<a href="index.php"> << Retour >> </a>

<h3>Auteurs dont l'oeuvre commence par "N"</h3>

	<?php 

		$mh = new MongoHandler('quentin_vinot.documents');
		$titles = $mh->displayAuteurN();

		print_r($titles);

		foreach ($titles as $t) {

			echo $t->fields->auteur . ":" . $t->fields->titre_avec_lien_vers_le_catalogue . "<br>";
		}
	?>