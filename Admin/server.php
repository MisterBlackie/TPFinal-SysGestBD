<?php
	session_start();
	
	if (isset($_POST["DeleteUser"])) {
		$user = $_POST["DeleteUser"];
		echo("$user");
	}
	
	if (isset($_POST["ReloadPwd"])) {
		$user = $_POST["ReloadPwd"];
		header("Location: ChangePassword.php?user=$user");
		exit();
	}
	
	if (isset($_POST["ChangePassword.Change"])) {
		
	}
?>