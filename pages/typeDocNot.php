<div class="section">
	<div class="section-title">
		<h3>Toutes les informations des documents ne possédants pas de type</h3>
	</div>
	<div class="section-content">	
<?php 
	$filter = [
		'fields.type_de_document' => ['$exists' => false]];
	$options = [];
	$rows = $mh->getQuery($filter, $options);
	//$_t = $rows->toArray();
	

	foreach ($rows as $r) {
		$r = $r->fields; 
		foreach ($r as $key => $value) {
			echo $key . " : " . $value . "<br>";
		}

		echo "<br> --- <br>";
	}
?>
</div>
</div>

