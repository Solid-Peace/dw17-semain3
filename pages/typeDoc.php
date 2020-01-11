<div class="section">
	<div class="section-title">
		<h3>Différents types de Document</h3>
	</div>
	<div class="section-content">	
<?php 
	$filter = [
		'fields.type_de_document' => ['$exists' => true]];
	$options = [
		'projection' => ['_id' => 0, 'fields.type_de_document' => 1], 
		'sort' => ['fields.type_de_document' => 1]
	];

	$rows = $mh->getQuery($filter, $options);
	$type_exists = ["init"];
	//var_dump($rows);

	foreach ($rows as $r) {
			//var_dump($r);
			foreach ($type_exists as $t) { 
				if (in_array($r->fields->type_de_document, $type_exists)) {
					continue;
				}else{
					$type_exists[] = $r->fields->type_de_document;
					echo $r->fields->type_de_document . "<br>";
				}
			}
		}
	?>
</div>
</div>
