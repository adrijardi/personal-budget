<?php
$fail = false;
if(!isset ($_REQUEST["name"]))
   $fail = true;
if(!isset ($_REQUEST["lastName"]))

?>
<!DOCTYPE HTML>
<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <title>Personal Budget</title>
    </head>
    <body>
    <header>
       header
    </header>
    <article>
       <p>Your personal budget!</p>
       <form action="register.php" method="POST">
          <fieldset>
             <legend>Personal data:</legend>
             <p><label>Name: <input type="text" name="name"/></label></p>
             <p><label>Last name: <input type="text" name="lastName"/></label></p>
             <p><label>Email: <input type="text" name="email"/></label></p>
             <p><label>Password: <input type="password" name="password"/></label></p>
             <p><button>Create account</button></p>
          </fieldset>
       </form>
    </article>
    <footer>
      <p>Created by: Stigma Soft 2010</p>
    </footer>
    

    </body>
</html>
