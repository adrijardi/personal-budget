<?php
require_once 'config.php';
require_once 'DBConnection.php';

if(isset ($_REQUEST["budgetName"]) && isset ($_REQUEST["transactionAmmount"]) && isset ($_REQUEST["transactionName"])){
   $conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
   mysql_select_db($dbName, $conn);
   
   $param = "?budget=".$_REQUEST["budgetName"];
   
   if(!createNewTransaction($_COOKIE[$userCookie], $_REQUEST["budgetName"], $_REQUEST["transactionName"], $_REQUEST["transactionAmmount"], $conn))
      $param += "&error=2";
   mysql_close($conn);
   
   header("HTTP/1.1 200 Ok");
   header("Location: budget.php".$param);
   
}else{
   header("HTTP/1.1 403 Forbidden");
   header("Location: main.php");
}
?>
