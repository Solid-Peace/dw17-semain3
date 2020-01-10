	<div class="section">
		<div class="section-title">
			<h3>Titres des films de rang 1 à 10</h3>
		</div>
		<div class="section-content">
			<?php 
			$filter = ['fields.rang' => ['$gte' => 1, '$lte' => 10]];
			$options = [
				'projection' => [ 
					'_id' => 0, 
					'fields.titre_avec_lien_vers_le_catalogue' => 1,
					'fields.rang' => 1
				], 
				'sort' => ['fields.rang' => 1]
			];

			$rows = $mh->getQuery($filter, $options);

			foreach ($rows as $r) {
				echo $r->fields->rang . " : " . $r->fields->titre_avec_lien_vers_le_catalogue . "<br>";
			}
			?>
		</div>
	</div>