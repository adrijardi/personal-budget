<?php
@include_once 'config.php';

function getConnection(){
	$conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
	mysql_select_db($dbName);
	return $conn;
}

function validateUser($login){
	
}

function createUser($login, $email, $name, $surename, $password){
	mysql_query("INSERT INTO users (login, email, name, surename, password) VALUES(
   	   '".$login."','".$email."','".$name."','".$login."','".$login."')") or die(mysql_error());
}
   
?>