<?php
	function getUsers() {
		$conn = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
		
		$call = $conn->prepare("CALL getUsers()", array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
		$call->execute();
		
		return $call->fetchAll();
		$conn->close();
	}
	
	function deleteUser($Pseudo) {
		$conn = $conn = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
		
		$call = $conn->prepare("CALL deleteUser(?)");
		$call->bindParam(1, $Pseudo);
		
		$call->execute();
		
		$conn->close();
	}
	
	function isAdmin($Pseudo) {
		$conn = $conn = new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
		
		$call = $conn->prepare("CALL IsAdmin(?)");
		$call->bindParam(1, $Pseudo);
		
		$call->execute();
		
		$conn->close();
	}
?>