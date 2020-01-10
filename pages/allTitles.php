<div class="section">
	<div class="section-title">
		<h3>Titres des films</h3>
	</div>

	<div class="section-content">
		<?php 
		$filter = [];
		$options = ['projection' => ['_id' => 0, 'fields.titre_avec_lien_vers_le_catalogue' => 1]];

		$rows = $mh->getQuery($filter, $options);

		foreach ($rows as $r) {
			echo $r->fields->titre_avec_lien_vers_le_catalogue . "<br>";
		}
		?>
	</div>
</div>