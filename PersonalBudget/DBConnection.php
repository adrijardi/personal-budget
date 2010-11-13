<?php

function validateCreateUserData($login, $email, $name, $surename, $password) {
   if(empty($login))
      $errorMsg[0] = "Login not specified";
   if(empty($name))
      $errorMsg[count($errorMsg)] = "Name not specified";
   if(empty ($surename))
      $errorMsg[count($errorMsg)] = "Last name not specified";
   if(empty ($email))
      $errorMsg[count($errorMsg)] = "Email not specified";
   if(empty ($password))
      $errorMsg[count($errorMsg)] = "Password not specified";
   return $errorMsg;
}

function createUser($login, $email, $name, $surename, $password, $conn) {
	mysql_query("INSERT INTO users (login, email, name, surename, password) VALUES(
   	   '".$login."','".$email."','".$name."','".$surename."','".$password."')", $conn) or die(mysql_error());
}

function login($login, $password, $conn) {
   $result = mysql_query("SELECT password FROM users WHERE login = '".$login."'", $conn) or die(mysql_error());
   $row = mysql_fetch_array($result) or die(mysql_error());
   return strcmp($password, $row['password']) == 0;
}

function getBudgetNames($user, $conn) {
   $result = mysql_query("SELECT name FROM budgets WHERE luser = '".$user."'", $conn) or die(mysql_error());
   
   $index = 0;
   while($row = mysql_fetch_array($result)) {
      $ret[$index++] = $row['name'];
   }
   
   return $ret;
}

function getBudgetAmmount($user, $budgetName, $conn) {
   $result = mysql_query("SELECT ammount FROM budgets WHERE luser = '".$user."' AND name = '".$budgetName."'", $conn) or die(mysql_error());
   $row = mysql_fetch_array($result) or die(mysql_error());
   return $row['ammount'];
}

function getBudgetTransactions($user, $budgetName, $conn) {
   $result = mysql_query("SELECT id, name, ammount FROM transactions WHERE luser = '".$user."' AND bname = '".$budgetName."'", $conn) or die(mysql_error());
   
   $index = 0;
   while($row = mysql_fetch_array($result)) {
      $ret[$index]['id'] = $row['id'];
      $ret[$index]['name'] = $row['name'];
      $ret[$index++]['ammount'] = $row['ammount'];
   }
   
   return $ret;
}

function createNewBudget($user, $budgetName, $conn) {
   return mysql_query("INSERT into budgets (name, luser) VALUES ('".$budgetName."' , '".$user."')", $conn);
}

function createNewTransaction($user, $budgetName, $transName, $ammount, $conn) {
   return mysql_query("INSERT into transactions (bname, luser, name, ammount) VALUES ('".$budgetName."' , '".$user."' , '".$transName."' , '".$ammount."')", $conn);
}

?>