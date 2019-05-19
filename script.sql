USE dbequipe35;

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
	SELECT Titre, Description, Url, Membre_Pseudo, DatePoster FROM Image;
END |