<?php
	session_start();
	include ("../DBFunction.php");
	
	if (!isAdmin($_SESSION['pseudo'])) {
		header("Location: AccessDenied.php");
		exit(); 
	}
	
	if (isset($_POST["DeleteUser"])) {
		$user = $_POST["DeleteUser"];
		deleteUser($user);
	}
	
	if (isset($_POST["ReloadPwd"])) {
		$user = $_POST["ReloadPwd"];
		header("Location: ChangePassword.php?user=$user");
		exit();
	}
	
	if (isset($_POST["ChangePassword"])) {
		$user = $_POST["User"];
		$newPwd = $_POST["newPassword"];
		
		if ($newPwd != null) {
			updatePassword($user, $newPwd);
		}
		
		header("Location: Admin.php");
		exit();
	}
?>