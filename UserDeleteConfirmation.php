<?php
	require("DBFunction");
	
	function ConfirmDelete($Pseudo) {
		deleteUser($Pseudo);
	}
	
	function Redirect() {
		
	}
?>

<html>
	<head>
		<title>Confirmation - Galerie Photo</title>
	</head>
	
	<body>
		<main>
			Voulez-vous vraiment supprimer ce membre ?
			<button type="button">Confirmer</button>
		</main>
	<body>
</html>