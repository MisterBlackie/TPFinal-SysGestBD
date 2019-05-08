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
	
	$stmt1 = $bdd->prepare("call InsertCommentaire(?,?,?)" , ARRAY(PDO::ATTR_CURSOR , PDO::CURSOR_FWDONLY));
	

	$stmt1->bindParam(1,$enonce);
	$stmt1->bindParam(2,$pseudo);
	$stmt1->bindParam(3,$idImage);

	
	
	$enonce = 'wow';
	$pseudo = 'james';
	$idImage = '1';

	
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