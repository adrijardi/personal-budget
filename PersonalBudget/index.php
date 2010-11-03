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
       <form action="login.php" method="POST">
          <fieldset>
             <legend>Access to your account:</legend>
             <p><label>Email: <input type="text" name="email"/></label></p>
             <p><label>Password: <input type="password" name="password"/></label></p>
             <p><button>Login</button></p>
          </fieldset>
       </form>
       <br />
       <form action="register.php" method="POST">
          <fieldset>
             <legend>Or create a new one:</legend>
             <p><label>Email: <input type="text" name="email"/></label></p>
             <p><button>Register</button></p>
          </fieldset>
       </form>
    </article>
    <footer>
      <p>Created by: Stigma Soft 2010</p>
    </footer>
    

    </body>
</html>
