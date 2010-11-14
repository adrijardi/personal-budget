<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <title>Personal Budget</title>
    </head>
    <body>
	  <header>  
         <h1>Page title</h1>  
      </header>  
      <nav>  
         <!-- Navigation -->  
         <ul>  
            <li><a href="#">Blog</a></li>  
            <li><a href="#">About</a></li>  
            <li><a href="#">Archives</a></li>  
            <li><a href="#">Contact</a></li>  
            <li class="subscribe"><a href="#">Subscribe via. RSS</a></li>  
         </ul>  
      </nav>  
      <section id="intro">  
         <!-- Introduction -->
         <p>Your personal budget!</p>
	       <?php
	       if($_POST["login"] == "invalid"){
	          echo "Invalid login";
	       }
	       ?>
	       <form action="login.php" method="POST">
	          <fieldset>
	             <legend>Access to your account:</legend>
	             <p><label>User: <input type="text" name="user"/></label></p>
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
      </section>  
      <section>  
         <!-- Main content area -->  
      </section>  
      <aside>  
         <!-- Sidebar -->  
      </aside>  
      <footer>  
         <!-- Footer -->
         <p>Created by: Stigma Soft 2010</p>
      </footer>
    </body>
</html>
