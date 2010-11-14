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
      <?php require 'header.php';?>
      <article>
         <?php
         echo "estas en main <strong>".$user."</strong>.<br />";
         echo "You have ".count($budgets)." budgets";
         
         echo "<ul id='listBudgets'>";
         foreach ($budgets as $budget) {
            echo "<li><a class='budget' href=budget.php?budget=".$budget.">".$budget."</a></li>";
         }
         echo "<li><a class='stdFolder' href='logout.php'>Logout</a></li>";
         echo "</ul>";
         
         // Show form errors
         if( isset($_REQUEST['error'])){
            echo "<ul id='msgErrors'><li>";
            switch($_REQUEST['error']){
               case 1:
                  echo $errorCreateBudget;
            }
            echo "</li></ul>";
         }
         ?>
         <form action="newBudget" method="POST">
            <fieldset>
               <legend>Create new budget:</legend>
               <p><label>Name: <input type="text" name="budgetName" /></label></p>
               <p><button>Create</button></p>
            </fieldset>
         </form>
      </article>
      <?php require 'footer.php';?>
   </body>
</html>
