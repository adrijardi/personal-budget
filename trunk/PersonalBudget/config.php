<?php
   $dbhost = '192.168.1.234';
   $dbuser = 'budget';
   $dbpass = 'kbudget32';

   $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

   $dbname = 'budget_db';
   mysql_select_db($dbname);
?>
