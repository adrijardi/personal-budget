<?php 
include("conn.php"); 
$sql = "select * from users"; 
$result = connect($sql); 
if ($result){ 
   echo 'holaaa';
}//end if 
?>