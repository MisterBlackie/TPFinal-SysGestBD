<!DOCTYPE html>

<html>

    <head>

        <title>Notre premi�re instruction a VPS: echo</title>

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
	
	echo ('insertion avec param�tres') . '<br/>';
	
	$stmt1 = $bdd->prepare("call InsertImage(?,?,?,?)" , ARRAY(PDO::ATTR_CURSOR , PDO::CURSOR_FWDONLY));
	

	$stmt1->bindParam(1,$titre);
	$stmt1->bindParam(2,$description);
	$stmt1->bindParam(3,$url);
	$stmt1->bindParam(4,$Membre_pseudo);
	
	
	$titre = 'Test de photo';
	$description = 'petit test pour voir si sa marche';
	$url = '\Image\ ';
	$Membre_pseudo = 'james';
	

	
	//Executer requette
	$total = $stmt1->execute();
	echo('total insertion est ' . $total);
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