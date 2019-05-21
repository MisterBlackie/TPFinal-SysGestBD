<?php 
  session_start(); 
 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['pseudo']);
  	header("location: login.php");
  }
  
  if (isset($_SESSION['pseudo'])) { 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
<?php include('Layout/Header.php') ?>
	<title>Page Principal</title>
	
		<p>Modifier votre profil :
		
		
<?php
$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
$profil = $_SESSION['pseudo'];


$stmt1 = $bdd->prepare("call getuserbypseudo(?)" , ARRAY(PDO::ATTR_CURSOR , PDO::CURSOR_FWDONLY));
	$stmt1->bindParam(1,$pseudo);
	$pseudo = $_SESSION['pseudo'];

$stmt1->execute([$pseudo]); 
while ($row = $stmt1->fetch()) {
echo "<b><a href='update.php?update={$row['pseudo']}'>{$row['prenom']} {$row['nom']}</a></b>";
echo "<br />";
}

?>
</div>
</div>
<p> <a href="index.php?logout='1'" style="color: red;">Se Déconnecter</a> </p>
		
</head>
<body>

<div class="header">
	<h2>La gallerie d'images</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['pseudo'])) : ?>
    	<p>Bienvenue <strong><?php echo $_SESSION['pseudo']; ?></strong></p>
    	
		
		
    <?php endif ?>
	
	<?php
	if (isset($_POST['ajouter']))
	{
			unset($_POST['ajouter']);
	$rep = 'Image/';
	$fich = $rep . basename($_FILES['fichier']['name']);

	if (move_uploaded_file($_FILES['fichier']['tmp_name'], $fich)) {
}
else
{
	echo"error";
}


$stmt1 = $bdd->prepare("call InsertImage(?,?,?,?)" , ARRAY(PDO::ATTR_CURSOR , PDO::CURSOR_FWDONLY));
	

	$stmt1->bindParam(1,$titre);
	$stmt1->bindParam(2,$description);
	$stmt1->bindParam(3,$url);
	$stmt1->bindParam(4,$Membre_pseudo);
	
	
	$titre = $_POST['titre'];
  $description =  $_POST['description'];
  $url =  $fich;
  $Membre_pseudo =  $_SESSION['pseudo'];
	

	
	//Executer requette
	

	$total = $stmt1->execute();

	}
	
	
	
	?>
	
	
	<?php 
	
	$stmt1 = $bdd->prepare("call afficherimage" );
	$total = $stmt1->execute();
	echo "<div class='grid-container'>";
	while ($donnees = $stmt1->fetch())
		{
			$test = $donnees[3]; 
			$image = $test;
			$imageData = base64_encode(file_get_contents($image));
			echo "<div class='grid-item'>";
			echo '<img src="data:image/jpeg;base64,'.$imageData.' "style="width:200px;height:150px; padding:0px 10px 0px 10px;">';
			echo "<br>";
			echo "titre :".$donnees[1] ."<br> description :". $donnees[2] . "<br> usager :". $donnees[4]  . "<br> Date :". $donnees[5];
			
			echo "</div>";
}
	echo "</div>";
$stmt1->closeCursor();
?>
	</div>
	<form action="index.php" method="post"
        enctype="multipart/form-data" >
    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
    Fichier : <input name="fichier" size="35" type="file" required="required">	
	<div class="input-group">
  		<label>titre</label>
  		<input type="text" name="titre" required="required" >
  	</div>
  	<div class="input-group">
  		<label>description</label>
  		<input type="textarea" name="description" required="required">
  	</div>
	<div class="input-group">
	<button type="submit" class="btn" name="ajouter">Ajouter une photo</button>
    </div>
	</form>
	
  <?php } 
else {
	
	
	?>
	<?php include('Layout/Header.php') ?>
	<title>Page Principal</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
		
		
		
	<div class="header">
	<h2>La gallerie d'images</h2>
</div>
	<?php
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
$stmt1 = $bdd->prepare("call afficherimage" );
	$total = $stmt1->execute();
	echo "<div class='grid-container'>";
	while ($donnees = $stmt1->fetch())
		{
			$test = $donnees[3]; 
			$image = $test;
			$imageData = base64_encode(file_get_contents($image));
			echo "<div class='grid-item'>";
			echo '<img src="data:image/jpeg;base64,'.$imageData.' "style="width:200px;height:150px; padding:0px 10px 0px 10px;">';
			echo "<br>";
			echo "titre :".$donnees[1] ."<br> description :". $donnees[2] . "<br> usager :". $donnees[4]  . "<br> Date :". $donnees[5];
			
			echo "</div>";
}
	
}  
  ?>
  </div>
  
	
	

	

		
</body>
<footer>
<?php include('Layout/Footer.php') ?>
</footer>
</html>
