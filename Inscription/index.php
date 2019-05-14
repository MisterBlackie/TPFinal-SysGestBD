<?php 
  session_start(); 

  if (!isset($_SESSION['pseudo'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['pseudo']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page Principal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
		<p>Modiffier votre profil :
		
		
		<?php
$connection = mysqli_connect("167.114.152.54", "equipe35", "264mqnh9", "dbequipe35");
$profil = $_SESSION['pseudo'];
if (isset($_GET['submit'])) {
$pseudo = $_GET['dpseudo'];
$password = $_GET['dpassword'];
$nom = $_GET['dnom'];
$prenom = $_GET['dprenom'];
$adresse = $_GET['dadresse'];
$query = mysqli_query($connection ,"update Membre set
password='$password', adresse='$adresse' where pseudo='$pseudo'");
}
$query = mysqli_query($connection , "select * from Membre where pseudo = '$profil' ");
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href='update.php?update={$row['pseudo']}'>{$row['prenom']} {$row['nom']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysqli_query($connection , "select * from Membre where pseudo='$update'");
while ($row1 = mysqli_fetch_array($query1)) {
echo "<form class='form' method='get'>";
echo "<h2>Update Form</h2>";
echo "<hr/>";
echo"<input class='input' type='hidden' name='dpseudo' value='{$row1['pseudo']}' />";
echo "<br />";
echo "<label>" . "password:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dpassword' value='{$row1['password']}' />";
echo "<br />";
echo "<label>" . "nom:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dnom' value='{$row1['nom']}' />";
echo "<br />";
echo "<label>" . "prenom:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dprenom' value='{$row1['prenom']}' />";
echo "<br />";
echo "<label>" . "adresse:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dadresse' value='{$row1['adresse']}' />";
echo "</textarea>";
echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";
}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysqli_close($connection);
?>
		
</head>
<body>

<div class="header">
	<h2>Page Principal</h2>
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
    	<p> <a href="index.php?logout='1'" style="color: red;">Se Déconnecter</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>