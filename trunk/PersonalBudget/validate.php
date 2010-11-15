<?php
error_reporting(E_ALL);
ini_set("display_errors","stderr");

@include_once 'config.php';
@include_once 'DBConnection.php';

if(isset ($_REQUEST["field"]) && isset ($_REQUEST["value"])){
   switch($_REQUEST["field"]) {
      case 'login':
         $conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
	 mysql_select_db($dbName, $conn);
         $exist = existLogin($_REQUEST["value"], $conn);
         mysql_close($conn);
         
         if($exist)
            echo "invalid";
         else
            echo "valid";
         break;
         
   }
}

?>
