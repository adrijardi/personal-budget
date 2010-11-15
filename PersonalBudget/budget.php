<?php
@include_once 'config.php';
@include_once 'DBConnection.php';

$conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
mysql_select_db($dbName, $conn);
$user = $_COOKIE[$userCookie];
$selectedBudget = $_REQUEST["budget"];

$budgets = getBudgetNames($user,$conn);

$totalAmmount = getBudgetAmmount($user, $selectedBudget, $conn);
$transactions = getBudgetTransactions($user, $selectedBudget, $conn);

mysql_close($conn);

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
      <?php require 'navigation.php';?>
      <article>
         <?php
         
         echo "<ul id='listBudgets'>";
         foreach ($budgets as $budget) {
            if($budget === $selectedBudget)
               echo "<li><span class='activeBudget'>".$budget."</span></li>";
            else
               echo "<li><a class='budget' href='budget.php?budget=".$budget."'>".$budget."</a></li>";
         }
         echo "</ul>";
         
         echo "estas en budget <strong>".$user."</strong>.<br />";
         echo "The budget ".$selectedBudget." have a total of ".$totalAmmount."<br />";
         
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
         
         // Show form errors
         if( isset($_REQUEST['error'])){
            echo "<ul id='msgErrors'><li>";
            switch($_REQUEST['error']){
               case 2:
                  echo $errorCreateTransaction;
            }
            echo "</li></ul>";
         }
         ?>
         
         <form action="newTransaction" method="POST">
            <fieldset>
               <legend>Create new transaction:</legend>
               <p><label>Name: <input type="text" name="transactionName" /></label></p>
               <p><label>Ammount: <input type="text" name="transactionAmmount" /></label></p>
               <input type="hidden" name="budgetName" value="<?php echo $selectedBudget;?>"/>
               <p><button>Create</button></p>
            </fieldset>
         </form>
      </article>
   
      <footer>
         <p>Created by: Stigma Soft 2010</p>
      </footer>
   </body>
</html>
