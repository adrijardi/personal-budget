<?php
function validateCreateUserData($login, $email, $name, $surename, $password){
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

function createUser($login, $email, $name, $surename, $password, $conn){
	mysql_query("INSERT INTO users (login, email, name, surename, password) VALUES(
   	   '".$login."','".$email."','".$name."','".$surename."','".$password."')", $conn) or die(mysql_error());
}

function login($login, $password, $conn){
	$result = mysql_query("SELECT password FROM users WHERE login = '".$login."'");
	return ($password == result);	
}
?>