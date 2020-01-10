<div class="section">
	<div class="section-title">
		<h3>Auteurs dont l'oeuvre commence par "N"</h3>
	</div>
	<div class="section-content">	
<?php 
	$filter = [
		'fields.titre_avec_lien_vers_le_catalogue' => ['$regex' => '^N']];
	$options = [
		'projection' => [ 
			'_id' => 0, 
			'fields.titre_avec_lien_vers_le_catalogue' => 1,
			'fields.auteur' => 1
		]
	];
	$rows = $mh->getQuery($filter, $options);

	foreach ($rows as $r) {
		if (isset($r->fields->auteur)) {
			echo $r->fields->auteur . " : " . $r->fields->titre_avec_lien_vers_le_catalogue . "<br>";
		}
	}
	?>
</div>
</div>

