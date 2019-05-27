
<div class="HeaderLayout">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo ($_SERVER["DOCUMENT_ROOT"] . "/index.php"); ?>">Galerie Photo</a>
			</div>

			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Images</a></li>
			</ul>
			
			<?php
			if (!isset($_SESSION['pseudo'])) { 
			?>
			<ul class="nav navbar-nav">
				<li class="active"><a href="register.php">Se créer un compte</a></li>
				<li class="active"><a href="login.php">Se Connecter</a></li>
			</ul>
			<?php }
			else {
				include_once("DBFunction.php");
				if (isAdmin($_SESSION['pseudo'])) {
			?>
				<li class = "active"><a href = "Admin/Admin.php">Administration</a></li>
		<?php } ?>
			<a href="index.php?logout='1'" style="color: red;">Se Déconnecter</a>
			<?php }
			?>
			
		</div>
	</nav>
</div>