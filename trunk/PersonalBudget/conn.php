<?php 
//check if a current session is in place and the user is correctly logged in 
//also check the calling page / domain to ensure the call only comes from 
//this domain -- this check may take a little configuration to get the 
//correct host name 

//echo "server is : ".$_SERVER['SERVER_NAME'];     //use this the first time to get the host name...then comment it out or delete to complete the security check 

//if (($_SERVER['SERVER_NAME']!="www.bastienkoert.net")){ 
    if (($_SERVER['SERVER_NAME']!="localhost")){ 
     echo "piss off, hackers!"; 
    die(); 
} 
function connect($sql) 
{ 
    /* 
    $username     = "bastien_guest"; 
    $pwd                = "guest"; 
    $host             = "localhost"; 
    $dbname         = "bastien_showguest"; 
*/    
    $username     = "budget"; 
    $pwd                = "kbudget32"; 
    $host             = "192.168.1.234"; 
    $dbname         = "budget_db"; 
/* 
    $username = "root"; 
    $pwd      = "rum31nt"; 
    $host       = "localhost";                                    
    $dbname     = "meds"; 
        
*/ 
    if (!($conn=mysql_connect($host, $username, $pwd)))  { 
       printf("error connecting to DB by user = $username and pwd=$pwd"); 
       exit; 
    } 
    $db=mysql_select_db($dbname,$conn) or die("Unable to connect to database1"); 
    
    $result = mysql_query($sql, $conn)or die("Unable to query local database <b>". mysql_error()."</b><br>$sql"); 
    if (!$result){ 
        echo "database query failed."; 
    }else{ 
        return $result; 
    }//end if 
}//end function 
?>