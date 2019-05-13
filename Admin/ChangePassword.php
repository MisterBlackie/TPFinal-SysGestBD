<?php
	if (!isset($_GET["user"])) {
		exit();
	}
?>

<html>
	<head>
		<title>Changement de mot de passe - Galerie Photo</title>
	</head>
	
	<body>
		<main>
			<form method = "POST" action = "ChangePassword.php">
				<input type = "text" name = "User" value = "<?php echo $_GET["user"] ?>" style = "display: none;">
				Changer le mot de passe de <?php echo $_GET["user"] ?> <br/>
				<input type = "text" id = "PwdField" name = "newPassword"><br/>
				Confirmation: <br/>
				<input type = "text" id = "ConfirmPwd"><br/><br/>
				<input type = "submit" name = "ChangePassword.Change" value = "Submit" onclick = "return CheckPasswordAndConfirmation()">
			</form>
		</main>
	</body>
</html>

<script type = "text/javascript">
	function CheckPasswordAndConfirmation() {
		let pwd = document.getElementById('PwdField').value;
		let pwdConfirmation = document.getElementById("ConfirmPwd").value;
		
		if (pwd.trim() != "" && pwdConfirmation.trim() != "") {
			if (pwd.equals(pwdConfirmation)) {
				return true;
			} else {
				alert("Le mot de passe ne correspond pas à la confirmation.");
			}
		} else {
			// Erreur password vide
		}
		
		return false;
	}

</script>