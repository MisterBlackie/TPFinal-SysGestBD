<?php
	include("server.php");
	
	function listUsers() {
		$users = getUsers();
		
		foreach($users as $user) {
			if ($user[0] == $_SESSION['pseudo'])
				continue;
			
			echo("<tr>");
			echo("<td>$user[0]</td>");
			echo("<td>$user[1]</td>");
			echo("<td>$user[2]</td>");
			echo("<td><button type = 'submit' form = 'AdminForm' class = 'btn' name = 'ReloadPwd' value = '$user[0]'><span class='glyphicon glyphicon-refresh'/></button></td>");
			echo("<td><button type = 'submit' form = 'AdminForm' class = 'btn' name = 'DeleteUser' value = '$user[0]' onclick = 'return ConfirmDelete(\"$user[0]\")'><span class='glyphicon glyphicon-remove'/></button></td>");
			echo("</tr>");
		}
	}
	
	function OrderBy($users) {
		
	}
?>

<html>
	<head>
		<title>Section administrateur - Galerie image</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel = "stylesheet" href = "../style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<main>
			<form id = "AdminForm" method = "POST" action = "Admin.php" style = "display: hidden;"></form>
				<table>
					<th>Pseudo</th>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Actions</th>
					<th></th>
					<?php listUsers(); ?>
				</table>
		</main>
		
		<?php include("../layout/footer.php"); ?>
	</body>
</html>

<script type = "text/javascript">
	
	function ConfirmDelete(pseudo) {
		if (confirm("Êtes-vous sûr de vouloir supprimer " + pseudo)) {
			return true;
		} else {
			return false;
		}
	}
</script>