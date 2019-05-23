<!DOCTYPE html>

<html>

    <head>

        <title>Notre première instruction a VPS: echo</title>

        <meta charset="utf-8" />

    </head>

    <body>

        <h2>Affichage de texte avec PHP VPS</h2>

        

        <p>

           connexion a la bd.<br />
</p>
  <?php
try
{
	$bdd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
    echo('connexion reussie');
	
	echo ('insertion avec paramètres') . '<br/>';
	
	$stmt1 = $bdd->prepare("call InsertUser(?,?,?,?,?,?)" , ARRAY(PDO::ATTR_CURSOR , PDO::CURSOR_FWDONLY));
	

	$stmt1->bindParam(1,$pseudo);
	$stmt1->bindParam(2,$password);
	$stmt1->bindParam(3,$nom);
	$stmt1->bindParam(4,$prenom);
	$stmt1->bindParam(5,$adresse);
	$stmt1->bindParam(6,$isAdmin);
	
	$pseudo = 'Test';
	$password = 'Motdepasse10';
	$nom = 'Cousineau';
	$prenom = 'James';
	$adresse = 'allo@mail.com';
	$isAdmin = '1';

	
	//Executer requette
	$total = $stmt1->execute();
	
	
   }
 
   catch (PDOException $e)
{
       echo('Erreur de connexion: ' . $e->getMessage());
       
       exit();
        
} 
  
$bdd=null;
?>
            

        

    </body>

</html>