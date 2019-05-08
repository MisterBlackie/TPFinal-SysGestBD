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