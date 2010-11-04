<?php
@include_once 'config.php';
@include_once 'DBConection.php';

if(isset ($_REQUEST["user"]) && isset ($_REQUEST["password"])){
   $conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
   mysql_select_db($dbName, $conn);
   $user = $_REQUEST["user"];
   echo $user;
   echo login($user, $_REQUEST["password"], $conn);
   if(login($user, $_REQUEST["password"], $conn)){
      //setcookie($cookieName, $user, time() + 172800000);
      header("HTTP/1.1 200 Ok");
      header("Location: main.php");
   }else{
      $_POST["login"] = "invalid";
      header("HTTP/1.1 200 Ok");
      header("Location: index.php");
   }
}else{
   header("HTTP/1.1 403 Forbidden");
   header("Location: index.php");
}
?>
