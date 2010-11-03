<?php
@include 'config.php';

if(isset ($_REQUEST["email"]) && isset ($_REQUEST["password"])){
   switch ($_REQUEST["email"]) {
      case "adrijardi@gmail.com":
         echo "Hi adrijardi";
         break;
      case "einevea@gmail.com":
         echo "Hi einevea";
         break;

      default:
         echo "I don't know you";
         break;
   }
   
}else{
   header("HTTP/1.1 403 Forbidden");
   header("Location: index.php");
}
?>
