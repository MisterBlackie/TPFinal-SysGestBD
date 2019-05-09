<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<h2>Inscription</h2>
</div>

<form method="post" action="register.php">
<?php include('errors.php');?>
<div class="input-group">
<label>Pseudonyme</label>
<input type="text" name="pseudo" value="<?php echo $pseudo;?>">
</div>
<div class="input-group">
<label>Mot de passe</label>
<input type="password" name="password_1">
</div>
<div class="input-group">
<label>Confirmer Mot de passe</label>
<input type="password" name="password_2">
</div>
<div class="input-group">
<label>Nom</label>
<input type="text" name="nom" value="<?php echo $nom;?>">
</div>
<div class="input-group">
<label>Prenom</label>
<input type="text" name="prenom" value="<?php echo $prenom;?>">
</div>
<div class="input-group">
<label>Adresse courriel</label>
<input type="email" name="adresse" value="<?php echo $adresse;?>">
</div>
<div class="input-group">
<button type="submit" class="btn" name="Sub_User">S'inscrire</button>
</div>
<p>
	Deja un membre? <a href = "login.php">se connecter</a>
</p>
</form>
</body>
</html>