<?php
require_once 'config.php';
require_once 'DBConnection.php';

if(isset ($_REQUEST["user"]) && isset ($_REQUEST["password"])){
   $conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
   mysql_select_db($dbName, $conn);
   if (login($_REQUEST["user"], $_REQUEST["password"], $conn)){
      setcookie($userCookie, $_REQUEST["user"], time() + 172800000);
      header("HTTP/1.1 200 Ok");
      header("Location: main.php");
   }else{
   	  $_POST["login"] = "invalid";
      header("HTTP/1.1 200 Ok");
      header("Location: index.php");
   }

   mysql_close($conn);
}else{
   header("HTTP/1.1 403 Forbidden");
   header("Location: index.php");
}
?>
