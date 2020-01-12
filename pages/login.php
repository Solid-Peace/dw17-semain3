<?php  

	if (isset($_POST['submit']) && !empty($_POST['submit'])) {
		if ((
			(isset($_POST['user']) && !empty($_POST['user'])) &&
			(isset($_POST['password']) && !empty($_POST['password']))
		)) {
			$login = new Login($_POST['submit'], $_POST['user'], $_POST['password']);
			echo $login->message;
		} else {
			echo 'error';
			var_dump($_POST);
		}	
	}

?>

<form method="POST" action="index.php?output=login">
	<h3>Login</h3>

	<label for="user">Utilisateur : 
			<input type="text" name="user" id="user">
	</label>

	<label for="passw">Mot de passe : 
		<input id="passw" type="password" name="password">
	</label>
	
	<button type="submit" name="submit" value="login">Login</button>
</form>

<form method="POST" action="index.php?output=login">
	<h3>SignIn</h3>

	<label for="user">Nouveau Utilisateur : 
			<input type="text" name="user" id="user">
	</label>

	<label for="passw">Mot de passe : 
		<input id="passw" type="password" name="password">
	</label>
	
	<button type="submit" name="submit" value="signin">SignIn</button>
</form>