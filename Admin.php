<?php
	include("DBFunction.php");
	
	function listUsers() {
		$users = getUsers();
		
		foreach($users as $user) {
			echo("<tr>");
			echo("<td>$user[0]</td>");
			echo("<td>$user[1]</td>");
			echo("<td>$user[2]</td>");
			echo("<td><button type='button' class = 'btn'><span class='glyphicon glyphicon-refresh'/></button></td>");
            echo("<td><button type='button' class = 'btn'><span class='glyphicon glyphicon-remove'/></button></td>");
			echo("</tr>");
		}
		
	}
?>

<html>
	<head>
		<title>Section administrateur - Galerie image</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<main>
			<table>
				<th>Pseudo</th>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Actions</th>
				<?php listUsers(); ?>
			</table>
		</main>
	</body>
</html>