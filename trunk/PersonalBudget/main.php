<?php
@include_once 'config.php';
@include_once 'DBConnection.php';

$conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
mysql_select_db($dbName, $conn);
$user = $_COOKIE[$userCookie];

$budgets = getBudgetNames($user,$conn);

?>

<!DOCTYPE HTML>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Main</title>
      <link rel="stylesheet" type="text/css" href="css/style.css"/>
   </head>
   <body>
      <header>
       header
       </header>
      <article>
         <?php
         echo "estas en main <strong>".$user."</strong>.<br \>";
         echo "You have ".count($budgets)." budgets";
         
         echo "<ul>";
         foreach ($budgets as $budget) {
            echo "<li>".$budget."</li>";
         }
         
         echo "</ul>";
         ?>
      </article>
   
      <footer>
         <p>Created by: Stigma Soft 2010</p>
      </footer>
   </body>
</html>
