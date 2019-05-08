<?php
	include("DBFunction.php");
	
	function listUsers() {
		$users = getUsers();
		
		foreach($users as $user) {
			echo("<tr>");
			echo("<td>$user[0]</td>");
			echo("<td>$user[1]</td>");
			echo("<td>$user[2]</td>");
			echo("<td><img>")
			echo("</tr>");
		}
		
	}
?>

<html>
	<head>
		<title>Section administrateur - Galerie image</title>
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