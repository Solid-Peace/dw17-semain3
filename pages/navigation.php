<nav class="nav">
		<a href="index.php?output=allTitles">
			<div>
				<span>Tous les titres</span>
			</div>	
		</a>
		<a href="index.php?output=rangTitles">
			<div>
				<span>Top 10</span>
			</div>	
		</a>
		<a href="index.php?output=auteurN">
			<div>
				<span>Auteurs</span>
			</div>	
		</a>
		<a href="index.php?output=typeDocNot">
			<div>
				<span>Not Doc Type</span>
			</div>	
		</a>
		<a href="index.php?output=typeDoc">
			<div>
				<span>Types de Doc</span>
			</div>	
		</a>
<?php if (isset($_SESSION['session']) && !empty($_SESSION['session'])): ?>
		<a class='login' href="index.php?output=logout">
			<div>
				<span><?php echo $_POST['user']; ?></span>
				<span>Deconnexion</span>
			</div>
		</a>
<?php else: ?>
		<a class='login' href="index.php?output=login">
			<div>
				<span>Connexion</span>
			</div>	
		</a>
<?php endif ?>
		<a href="index.php?output=exit">
			<div>
				<span>Exit</span>
			</div>	
		</a>

	

	</nav>
