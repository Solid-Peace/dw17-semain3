<?php  

	if (isset($_POST['submit']) && !empty($_POST['submit'])) {
		if ((
			(isset($_POST['user']) && !empty($_POST['user'])) &&
			(isset($_POST['password']) && !empty($_POST['password']))
		)) {
			$session = new Connexion($_POST['submit'], $_POST['user'], $_POST['password']);
			echo $session->message;
		} else {
			echo 'error';
			var_dump($_POST);
		}	
	}

	$test = new MongoHandlerClient();
	$test1 = $test->newUserCollection('quentin_vinot');

?>

<form method="POST" action="index.php?output=login">
	<h3>Connexion</h3>

	<label for="user">Utilisateur : 
			<input type="text" name="user" id="user">
	</label>

	<label for="passw">Mot de passe : 
		<input id="passw" type="password" name="password">
	</label>
	
	<button type="submit" name="submit" value="login">Connexion</button>
</form>

<form method="POST" action="index.php?output=login">
	<h3>Incription</h3>

	<label for="user">Nouvel Utilisateur : 
			<input type="text" name="user" id="user">
	</label>

	<label for="passw">Mot de passe : 
		<input id="passw" type="password" name="password">
	</label>
	
	<button type="submit" name="submit" value="signin">inscripton</button>
</form>