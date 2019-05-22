USE dbequipe35;

CREATE TABLE `dbequipe35`.`Commentaires` (
    `IdCommentaire` INT NOT NULL AUTO_INCREMENT,
    `pseudoMembre` VARCHAR(30) NOT NULL,
    `IdImage` INT(11) NOT NULL,
    `Commentaire` TINYTEXT NOT NULL,
    `Date` DATETIME NOT NULL,
    FOREIGN KEY FK_Membre(pseudoMembre) REFERENCES Membre(pseudo),
    FOREIGN KEY FK_IdImage(IdImage) REFERENCES Image(idImage),
    PRIMARY KEY (`IdCommentaire`)
) ENGINE = InnoDB

DROP PROCEDURE IF EXISTS getUsers;
DELIMITER |
CREATE PROCEDURE getUsers()
BEGIN
	SELECT pseudo, nom, prenom, adresse, isAdmin FROM Membre;
END |

DELIMITER |
CREATE FUNCTION checkUserPassword(Ppseudo VARCHAR(30), PPassword VARCHAR(45)) RETURNS BIT
BEGIN
	DECLARE UserPwd VARCHAR(45);
	DECLARE Result BIT;
    
    SELECT password INTO UserPwd FROM Membre WHERE pseudo=Ppseudo;
    IF UserPwd = PPassword THEN
		set Result = 1;
    ELSE
		set UserPwd = 0;
    END IF;
    
    RETURN Result;
END |

DELIMITER |
CREATE PROCEDURE deleteUser(IN Ppseudo VARCHAR(30))
BEGIN
	DELETE FROM membre WHERE pseudo=Ppseudo;
END |


DROP FUNCTION IF EXISTS IsAdmin;
DELIMITER |
CREATE FUNCTION IsAdmin(PPseudo VARCHAR(30)) RETURNS TINYINT
BEGIN
	DECLARE isAdmin TINYINT(4);
	SELECT Membre.isAdmin INTO isAdmin FROM Membre WHERE pseudo = PPseudo;
    return isAdmin;
END |

DROP PROCEDURE IF EXISTS UpdatePassword;
DELIMITER |
CREATE PROCEDURE UpdatePassword(IN PPseudo VARCHAR(30), IN PPassword VARCHAR(45))
BEGIN
	UPDATE Membre SET Password = PPassword WHERE Pseudo = PPseudo;
END |

DROP PROCEDURE IF EXISTS getUser;
DELIMITER |
CREATE PROCEDURE getUser(IN PPseudo VARCHAR(30))
BEGIN
	SELECT Pseudo, Prenom, Nom, Adresse, IsAdmin FROM Membre;
END |

DROP PROCEDURE IF EXISTS getImage;
DELIMITER |
CREATE PROCEDURE getImage(IN PIdImage INT(11))
BEGIN
	SELECT Titre, Description, Url, Membre_Pseudo, DatePoster FROM Image WHERE idImage = PIdImage;
END |

DROP PROCEDURE IF EXISTS getCommentaires;
DELIMITER |
CREATE PROCEDURE getCommentaires(IN PIdImage INT(11))
BEGIN
	SELECT IdCommentaire, pseudoMembre, Commentaire, Date FROM Commentaires WHERE IdImage = PIdImage ORDER BY Date DESC;
END |

DROP PROCEDURE IF EXISTS insertCommentaire;
DELIMITER |
CREATE PROCEDURE insertCommentaire(IN PIdImage INT(11), IN PPseudo VARCHAR(30), IN PCommentaire TINYTEXT)
BEGIN
	INSERT INTO Commentaires(IdImage, pseudoMembre, Commentaire, Date) VALUES(PIdImage, PPseudo, PCommentaire, NOW());
END |