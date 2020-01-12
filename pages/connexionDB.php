<?php 

if (isset($_POST['submit']) && !empty($_POST['submit'] && $_POST['submit'] == 'connexion')) {
		if ((
			(isset($_POST['dbName']) && !empty($_POST['dbName'])) &&
			(isset($_POST['mediaCollectionName']) && !empty($_POST['mediaCollectionName'])) &&
			isset($_POST['userCollectionName']) && !empty($_POST['userCollectionName']))
		){

				$host = new Host($_POST['dbName'], $_POST['mediaCollectionName'], $_POST['userCollectionName']);
				$host->connexion();

		} else {
			echo 'error';
			var_dump($_POST);
		}	
	}

 ?>

<form method="POST" action="index.php?output=connexion">
	<h3>Connexion a votre base de donnée</h3>

	<label for="dbName">Nom de la Base de Donnée : 
			<input type="text" name="dbName" id="dbName">
	</label>

	<label for="mediaCollectionName">Nom de la collection des médias : 
		<input id="mediaCollectionName" type="text" name="mediaCollectionName">
	</label>

	<label for="userCollectionName">Nom de la collection des utilisateurs de la médiathèque (sera créée si n'existes pas déjà) : 
		<input id="userCollectionName" type="text" name="userCollectionName">
	</label>

	<label for="hostAddress">Adresse de la base de donnée. Par default : 'mongodb://localhost:27017'
		<input id="hostAddress" type="text" name="hostAddress">
	</label>
	
	<button type="submit" name="submit" value="connexion">Connexion</button>
</form>