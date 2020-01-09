<a href="index.php"> << Retour >> </a>

<h3>Titres des films</h3>

	<?php 

		$mh = new MongoHandler('quentin_vinot.documents');
		$titles = $mh->displayTitleDocuments();

		foreach ($titles as $t) {
			echo $t->fields->titre_avec_lien_vers_le_catalogue . "<br>";
		}
	?>


<?php require_once 'footer.php'; ?>