<?php

    function getNewConnection() {
        return new PDO('mysql:host=167.114.152.54;dbname=dbequipe35;charset=utf8', 'equipe35', '264mqnh9');
    }
	// getUsers: retourne la liste des membres
	function getUsers() {
		$conn = getNewConnection();
		
		$call = $conn->prepare("CALL getUsers()", array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
		$call->execute();
		
		return $call->fetchAll();
		$conn = null;
	}
	
	// deleteUser: supprime le membre dans la base de donnée
	function deleteUser($Pseudo) {
		$conn = getNewConnection();
		
		$call = $conn->prepare("CALL deleteUser(?)");
		$call->bindParam(1, $Pseudo);
		
		$call->execute();
		
		$conn = null;
	}
	
	// isAdmin: retourne un booléen qui indique si un membre est admin ou non
	function isAdmin($Pseudo) {
		$conn = getNewConnection();
		
		$call = $conn->prepare("SELECT IsAdmin(?)");
		$call->bindParam(1, $Pseudo);
		
		$call->execute();
		$conn = null;
		
		while ($isAdmin = $call->fetch()) {
			return $isAdmin[0];
		}
	}
	
	// Change le mot de passe d'un membre
	function updatePassword($Pseudo, $NewPwd) {
		$conn = getNewConnection();
		
		$call = $conn->prepare("CALL UpdatePassword(?,?)");
	

		$call->bindParam(1, $Pseudo);
		$call->bindParam(2, $NewPwd);
		
		$call->execute();
		
		$conn = null;
	}

	function getImage($idImage) {
	    $conn = getNewConnection();

	    $call = $conn->prepare("CALL getImage(?)", array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));

	    $call->bindParam(1, $idImage);

	    $call->execute();

	    $conn = null;
	    return $call->fetchAll();
    }

    function getComments($idImage) {
        $conn = getNewConnection();

        $call = $conn->prepare("CALL getCommentaires(?)", array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
        $call->bindParam(1, $idImage);

        $call->execute();

        $conn = null;
        return $call->fetchAll();
    }

    function insertCommentaire($idImage, $pseudo, $commentaire) {
        $conn = getNewConnection();

        $call = $conn->prepare("CALL insertCommentaire(?, ?, ?)");

        $call->bindParam(1, $idImage);
        $call->bindParam(2, $pseudo);
        $call->bindParam(3, $commentaire);

        $call->execute();

        $conn = null;
    }
?>