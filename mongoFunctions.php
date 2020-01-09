<?php 
// Variable déstinée à être globale pour les autres fonctions dans le script
$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

function initQuery(array $filter, array $options) {
	return new MongoDB\Driver\Query($querry);
}

function getTitreDocuments() {
	
	global $mng;	

	$query = new MongoDB\Driver\Query([], [
		"titre_avec_lien_vers_le_catalogue" => 1, 
		"_id" => 0]);

	return $mng->executeQuery("quentin_vinot.documents", $query);
}

function displayTitreDocuments() {
	$rows = getTitreDocuments();

	foreach ($rows as $r) {
		echo $r->fields->titre_avec_lien_vers_le_catalogue . "<br>";
	}
}


?>