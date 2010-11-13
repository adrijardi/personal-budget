DROP PROCEDURE IF EXISTS addTransaction;

DELIMITER //

CREATE PROCEDURE addTransaction (IN p_user VARCHAR(20), IN p_budget VARCHAR(20), IN p_name VARCHAR(20), IN p_newAmmount INT)
BEGIN
   INSERT INTO transactions (bname, luser, name, ammount) VALUES (p_budget , p_user , p_name , p_newAmmount);
   UPDATE budgets SET ammount = ammount + p_newAmmount WHERE name = p_budget AND luser = p_user;
END//

DELIMITER ;
