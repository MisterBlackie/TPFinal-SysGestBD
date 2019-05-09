<?php
session_start();

//Initialisation des variables
$pseudo = "";
$adresse = "";
$nom = "";
$prenom = "";
$errors = array();

//$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
$bdd = mysqli_connect("167.114.152.54", "equipe35", "264mqnh9", "dbequipe35");
    //echo('connexion reussie');
	
	//echo ('insertion avec paramètres') . '<br/>';
	if (isset($_POST['Sub_User'])) {
  // receive all input values from the form
  $pseudo = mysqli_real_escape_string($bdd, $_POST['pseudo']);
  $password_1 = mysqli_real_escape_string($bdd, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($bdd, $_POST['password_2']);
  $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
  $prenom = mysqli_real_escape_string($bdd, $_POST['prenom']);
  $adresse = mysqli_real_escape_string($bdd, $_POST['adresse']);
  
  
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
  $user_check_query = "SELECT * FROM Membre WHERE pseudo='$pseudo' OR adresse='$adresse' LIMIT 1";
  $result = mysqli_query($bdd, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
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
 
	  $query = "INSERT INTO Membre (pseudo, password, nom , prenom ,adresse , isAdmin) 
  			  VALUES('$pseudo','$password' , '$nom' , '$prenom' , '$adresse' , '0')";
  	mysqli_query($bdd, $query);
	echo($query);
  }
   
	}
   
   
   
   
   
   
   
   
   
   