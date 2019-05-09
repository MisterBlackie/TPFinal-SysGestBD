<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Connection</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Se Connecter</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Pseudonyme</label>
  		<input type="text" name="pseudo" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Se connecter</button>
  	</div>
  	<p>
  		Pas encore membre? <a href="register.php">S'inscrire</a>
  	</p>
  </form>
</body>
</html>