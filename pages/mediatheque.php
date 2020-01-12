<?php 
$user = new User($_SESSION['login']['user']);
$filter = [];
$options = [
	'projection' => [
		'_id' => 1, 
		'fields.titre_avec_lien_vers_le_catalogue' => 1, 
		'fields.auteur' => 1,
		'fields.type_de_document' => 1
	]];

	$rows = $mh->getQuery($filter, $options);
	if (isset($_GET['loan']) && !empty($_GET['loan'])) {
		$result = $user->addLoan($_GET['loan']);
		if($result) {
			header('Location:'.$_SERVER['PHP_SELF']);
		}
	}
	if (isset($_GET['unloan']) && !empty($_GET['unloan'])) {
		$result = $user->unLoan($_GET['unloan']);
		if($result) {
			header('Location:'.$_SERVER['PHP_SELF']);
		}
	}

	if(isset($user->loanDocuments) && !empty($user->loanDocuments))
	{

		echo "<h3> Vos emprunts </h3>";
		$loanDocuments = $user->loanDocuments;
		$_loan = [];
		foreach ($loanDocuments as $l) {
			$_loan[] = $l;
		}

			foreach ($_loan as $l) {
				$filter = ['_id' => new MongoDB\BSON\ObjectID($l)];
				$options = [
					'projection' => [
						'_id' => 1, 
						'fields.titre_avec_lien_vers_le_catalogue' => 1, 
						'fields.auteur' => 1,
						'fields.type_de_document' => 1
					]];
					$loans = $mh->getQuery($filter, $options);
					?>

					<?php foreach ($loans as $i): ?>
						<div>
							<span><?php echo $i->fields->titre_avec_lien_vers_le_catalogue; ?>
							</span> : 
							<span>	
								<form method="get" style="display: inline;">
										<button type="submit" name="unloan" value="<?php echo $l ?>">Rendre</button>
								</form>
							</span>
						</div>
					
								
							
					
				<?php endforeach ?>
				<?php
			}	
		}
		?>

		<h3>Bienvenue dans la médiathèque <?php echo $user->userName; ?></h3>
		<table>
			<tr>
				<th>Titre</th>
				<th>Autheur</th>
				<th>Type</th>
				<th>Action</th>
			</tr>

			<?php foreach ($rows as $r): ?>
				<?php $oid = $r->_id->__toString();?>

				<tr>
					<td><?php echo $r->fields->titre_avec_lien_vers_le_catalogue; ?></td>
					<td>
						<?php if (isset($r->fields->auteur)): ?>
							<?php echo $r->fields->auteur ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (isset($r->fields->type_de_document)): ?>
							<?php echo $r->fields->type_de_document ?>
						<?php endif ?>
					</td>
					<td>
						<?php if (isset($_loan)): ?>
							<?php if (in_array($oid, $_loan)): ?>
								<form method="get">
									<button type="submit" name="unloan" value="<?php echo $oid ?>">Rendre</button>
								</form>
								<?php else: ?>
									<form method="get">
										<button type="submit" name="loan" value="<?php echo $oid ?>">Emprunter</button>
									</form>
								<?php endif ?>
								<?php else: ?>
									<form method="get">
										<button type="submit" name="loan" value="<?php echo $oid ?>">Emprunter</button>
									</form>
								<?php endif ?>
							</td>
						</tr>
					<?php endforeach ?>
				</table>