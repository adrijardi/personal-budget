<?php
@include_once 'config.php';
@include_once 'DBConnection.php';

$conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
mysql_select_db($dbName, $conn);
$user = $_COOKIE[$userCookie];
$budget = $_REQUEST["budget"];

$budgets = getBudgetNames($user,$conn);

$totalAmmount = getBudgetAmmount($user, $budget, $conn);
$transactions = getBudgetTransactions($user, $budget, $conn);

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
         
         echo "<ul id='listBudgets'>";
         foreach ($budgets as $budget) {
            echo "<li><a class='budget' href='budget.php?budget=".$budget."'>".$budget."</a></li>";
         }
         echo "<li><a class='stdFolder' href='main.php'>Home</a></li>";
         echo "</ul>";
         
         echo "estas en budget <strong>".$user."</strong>.<br />";
         echo "The budget ".$budget." have a total of ".$totalAmmount."<br />";
         
         if(count($transactions) > 0) {
         
            echo "Transactions:<br />";
            echo "<table id='transactionTable' summary='Data of the transactions for this budget'><caption>Data of the transactions for this budget</caption><tr><th>id</th><th>name</th><th>ammount</th></tr>";
            foreach ($transactions as $trans) {
               echo "<tr><td>".$trans['id']."</td><td>".$trans['name']."</td><td>".$trans['ammount']."</td></tr>";
            }

            echo "</table>";
         } else {
            echo "This budget contains no transactions";  
         }
         ?>
      </article>
   
      <footer>
         <p>Created by: Stigma Soft 2010</p>
      </footer>
   </body>
</html>
