<?php
@include_once 'config.php';
@include_once 'DBConnection.php';

if(isset ($_REQUEST["register"])){
   $errorMsg = validateCreateUserData($_REQUEST["login"], $_REQUEST["email"], $_REQUEST["name"],
   	   $_REQUEST["lastName"], $_REQUEST["password"]);
   if(count($errorMsg)==0){
      $conn = mysql_connect($dbHost, $dbUser, $dbPass) or die ('Error connecting to mysql');
	  mysql_select_db($dbName, $conn);
   	  createUser($_REQUEST["login"], $_REQUEST["email"], $_REQUEST["name"],
   	   $_REQUEST["lastName"], $_REQUEST["password"], $conn);
          
          mysql_close($conn);
   	  header("Location: index.php");
   }
}

?>
<!DOCTYPE HTML>
<html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script type="text/javascript" src="js/jquery-1.4.4.js"></script>
        
        <script type="text/javascript">
        
        var loginState = null;
        var loginMsg;
        
        // Wait for the document to be ready
        $(document).ready(function(){
           
            /*$("#login").change(function() {
               
               if($("#login").val().length < 3) {
                  $("#loginMsg").text("Login too short");
                  $("#loginMsg").show("slow", null);
               } else if( $("#login").val().length >= 20 ) {
                  $("#loginMsg").text("Login too long");
                  $("#loginMsg").show("slow", null);
               } else {
                  $("#loginMsg").hide("slow", function(){$("#loginMsg").text("");});
               }
            });*/
            
            $("#login").keyup(function() {
              // alert("loginState");
               if($("#login").val().length < 3) {
                  if(loginState == null || loginState != "short"){
                     loginState = "short";
                     loginMsg = "Login too short";
                     fadeLogin();
                  }
               } else if( $("#login").val().length >= 20 ) {
                  if(loginState == null || loginState != "long"){
                     loginState = "long";
                     loginMsg = "Login too long";
                     fadeLogin();
                  }
               } else {
                
                  $.post("validate.php", {field: "login", value: $("#login").val()} , function(data) {
                     
                     if(data === "valid") {
                        if(loginState == null || loginState != "valid"){
                           loginState = "valid";
                           loginMsg = "Ok";
                           fadeLogin();
                        }
                     } else {
                        if(loginState == null || loginState != "unvalid"){
                           loginState = "unvalid";
                           loginMsg = "Login not available";
                           fadeLogin();
                        }
                     }



                  });
               }
            });
     
        });
        
        function fadeLogin() {
           $("#loginMsg").fadeOut("slow", function(){
              $("#loginMsg").text(loginMsg);
              $("#loginMsg").fadeIn("slow");
           });
        }
   
     
        </script>
        
        <title>Personal Budget</title>
    </head>
    <body>
    <header>
       header
    </header>
    <article>
       <p>Your personal budget!</p>
       <?php
         if(isset ($errorMsg)){
            echo "<ul>";
            foreach ($errorMsg as $error){
               echo "<li>".$error."</li>";
            }
            echo "</ul>";
         }
       ?>
       <form action="register.php" method="POST">
          <fieldset>
             <legend>Personal data:</legend>
             <p><label>Login: <input type="text" id="login" name="login"/></label> <span style="display: none;" id="loginMsg">caca</span></p>
             <p><label>Email: <input type="text" name="email" value="<?php echo $_REQUEST['email']; ?>"/></label></p>
             <p><label>Name: <input type="text" name="name"/></label></p>
             <p><label>Last name: <input type="text" name="lastName"/></label></p>
             <p><label>Password: <input type="password" name="password"/></label></p>
             <p><button>Create account</button></p>
             <input type="hidden" name="register" value="true"/>
          </fieldset>
       </form>
    </article>
    <footer>
      <p>Created by: Stigma Soft 2010</p>
    </footer>
    </body>
</html>
