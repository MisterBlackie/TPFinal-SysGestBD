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

DROP PROCEDURE IF EXISTS IsAdmin;
DELIMITER |
CREATE FUNCTION IsAdmin(PPseudo VARCHAR(30)) RETURNS BOOL
BEGIN
	DECLARE isAdmin TINYINT(4);
	SELECT Membre.isAdmin INTO isAdmin FROM Membre WHERE pseudo = PPseudo;
    
    IF isAdmin = 1 THEN
		RETURN TRUE;
    ELSE
		RETURN FALSE;
    END IF;
END |