<?php
session_start();
//Inscription
//Initialisation des variables
$pseudo = "";
$adresse = "";
$nom = "";
$prenom = "";
$password_1= "";
$password_2="";
$errors = array();

$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
    //echo('connexion reussie');

	if (isset($_POST['Sub_User'])) {
		
		$pseudo =$_POST['pseudo'];
		
  $password_1 =  $_POST['password_1'];
  $password_2 =  $_POST['password_2'];
  $nom =  $_POST['nom'];
  $prenom =  $_POST['prenom'];
  $adresse =  $_POST['adresse'];
		
   // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($pseudo)) { array_push($errors, "pseudonyme requis"); }
  if (empty($password_1)) { array_push($errors, "Mot de passe requis"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Les mots de passe ne sont pas identique");
  }
   if (empty($nom)) { array_push($errors, "nom requis"); }
    if (empty($prenom)) { array_push($errors, "prenom requis"); }
   if (empty($adresse)) { array_push($errors, "Adresse courriel requis"); }
   
   
    // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $stmt1 = $bdd->prepare("SELECT * FROM Membre WHERE pseudo='$pseudo' OR adresse='$adresse' LIMIT 1");
  
  
  $stmt1->execute([$pseudo,$adresse]); 
 
  $user = $stmt1->fetch();
  
  if ($user) { // if user exists
    if ($user['pseudo'] === $pseudo) {
      array_push($errors, "Ce pseudonyme existe deja");
    }

    if ($user['adresse'] === $adresse) {
      array_push($errors, "cette adresse courriel existe deja");
    }
  }
   
    if (count($errors) == 0) {
  $password = $password_1;
 
	  $stmt1 = $bdd->prepare("INSERT INTO Membre(pseudo, password, nom , prenom ,adresse , isAdmin) VALUES(?,?,?,?,?,?)");
	
	$stmt1->bindParam(1,$pseudo);
	$stmt1->bindParam(2,$password);
	$stmt1->bindParam(3,$nom);
	$stmt1->bindParam(4,$prenom);
	$stmt1->bindParam(5,$adresse);
	$stmt1->bindParam(6,$isAdmin);
	
	$isAdmin = 0;
  	$stmt1->execute(); 
	header('location: login.php');
	
  
   
	}
	}
   //Se Connecter
   if (isset($_POST['login_user'])) {
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];

  if (empty($pseudo)) {
  	array_push($errors, "Le pseudpnyme est requis");
  }
  if (empty($password)) {
  	array_push($errors, "Le mot de passe est requis");
  }

  if (count($errors) == 0) {
  	
  	
	$stmt1 = $bdd->prepare("SELECT * FROM Membre WHERE pseudo='$pseudo' AND password='$password'");
  
 $stmt1->execute([$pseudo,$adresse]); 
 
  $user = $stmt1->fetch();
  $results= $stmt1->rowCount();
  	
  	if ($results == 1) {
  	  $_SESSION['pseudo'] = $pseudo;
  	  $_SESSION['success'] = "Vous etes connecté";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Le pseudonyme ou le mot de passe est incorect");
  	}
  }
}

 


?>
   