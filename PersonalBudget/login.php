<?php
@include_once 'DBConection.php';

if(isset ($_REQUEST["user"]) && isset ($_REQUEST["password"])){
   $conn = getConection();
   $user = $_REQUEST["user"];
   if(login($user, $_REQUEST["password"])){
      setcookie($cookieName, $user, time() + 172800000);
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
