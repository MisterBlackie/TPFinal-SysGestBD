<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="style/style.css" rel="stylesheet" type="text/css">

<?php include('Layout/Header.php') ?>
</head>

<body>

<div class="title">
</div>
<?php
//$connection = mysqli_connect("167.114.152.54", "equipe35", "264mqnh9", "dbequipe35");
$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
if (isset($_GET['submit'])) {
$pseudo = $_GET['dpseudo'];
$password = $_GET['dpassword'];
$adresse = $_GET['dadresse'];


//$stmt1 = $connection->prepare("call updateProfil(?,?,?)");

$stmt1 = $bdd->prepare("call updateProfil(?,?,?)" , ARRAY(PDO::ATTR_CURSOR , PDO::CURSOR_FWDONLY));
	
	$stmt1->bindParam(1,$pseudo);
	$stmt1->bindParam(2,$password);
	$stmt1->bindParam(3,$adresse);
	//$stmt1->bind_Param('sss' , $pseudo , $password , $adresse);
	
		$total = $stmt1->execute();


}
if (isset($_GET['delete'])) {
	$pseudo = $_GET['dpseudo'];
	$stmt1 = $bdd->prepare("call deleteUser(?)");
	$stmt1->bindParam(1 , $pseudo);
	$total = $stmt1->execute();
	
	
}
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$stmt1 = $bdd->prepare("call getuserbypseudo(?)");
$stmt1->execute([$update]); 
while ($row1 = $stmt1->fetch()) {
echo "<form class='form' style='position:center' method='get'>";
echo "<h2>Modification de votre profil {$row1['prenom']}  {$row1['nom']}</h2>";
echo "<hr/>";
echo"<input class='input' type='hidden' name='dpseudo' value='{$row1['pseudo']}' />";
echo "<br />";
echo "<label>" . "password:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dpassword' value='{$row1['password']}' />";
echo "<br />";
echo "<label>" . "adresse:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dadresse' value='{$row1['adresse']}' />";
echo "</textarea>";
echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "<input class='submit' type='submit' name='delete' value='Supprimer votre Compte' />";
echo "<br />";
echo "<input class='submitz' type='submit' name='retour' value='retour au menu principal' />";
echo "</form>";

}
}
if (isset($_GET['submit'])) {
	echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Compte modifié avec succès!!</span>
<a href="index.php">retour</a></div>';
}
if (isset($_GET['delete'])) {
	echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Compte détruit avec succès!!</span>
<a href="login.php">retour</a></div>';


}

if (isset($_GET['retour'])) {
header('location:index.php');
}
?>
</div>
</div>
</div><?php

?>
</body>
<footer>
<?php include('Layout/Footer.php') ?>
</footer>
</html>