<?php
require_once 'config.php';
require_once 'DBConnection.php';

if(isset ($_REQUEST["budgetName"])){
   $conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
   mysql_select_db($dbName, $conn);
   
   if(!createNewBudget($_COOKIE[$userCookie], $_REQUEST["budgetName"], $conn))
      $param = "?error=1";
   mysql_close($conn);
   
   header("HTTP/1.1 200 Ok");
   header("Location: main.php".$param);
   
}else{
   header("HTTP/1.1 403 Forbidden");
   header("Location: main.php");
}
?>
