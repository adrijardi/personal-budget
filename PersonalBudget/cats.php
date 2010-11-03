<?php
if(isset ($_REQUEST["kill"])){
   $selected = rand(0, 7);

   switch ($selected) {
      case 0:
         $url = "http://www.weirdthings.org.uk/wp-content/uploads/2008/03/kill-the-cat.jpg";
         $msg = "God, are you sure I've got to do that?";
         break;
      case 1:
         $url = "http://www.deanguitars.com/userpics/lib5/CatKill.jpg";
         $msg = "Just die fucking cat";
         break;
      case 2:
         $url = "http://www.clumsycrooks.com/media/files16/pictures/suicide_cat_bomber.jpg";
         $msg = "I'll kill you!";
         break;
      case 3:
         $url = "http://images.icanhascheezburger.com/completestore/2008/12/7/128731905647276288.jpg";
         $msg = "Help! I my leg is traped.";
         break;
      case 4:
         $url = "http://eyesonkenmore.com/wp-content/uploads/2009/08/tire-cat-2.jpg";
         $msg = "Mariah, close the door and lets go.";
         break;
      case 5:
         $url = "http://farm2.static.flickr.com/1036/1374324329_51bd0f6a24.jpg?v=0";
         $msg = "Look, a cow!";
         break;
      case 6:
         $url = "http://www.catherineseven.com/wp-content/uploads/2009/01/happy-cat.jpeg";
         $msg = "Not dead … already";
         break;
   }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Personal Budget</title>
    </head>
    <body>
       <?php
       if(!isset ($url)){
          ?>
       <p>Hello my friend, just don't push the bottom please, if you do it I will never know, but every time you do it god kills a cat :(</p>
       <form action="cats.php" method="POST">
          <input type="hidden" name="kill" value="true">
          <input type="submit" value="Please god, kill this fucking cat!"/>
       </form>
       <?php
       }else{?>
       <p><?php echo $msg ?></p>
       <img src="<?php echo $url ?>" alt="your fault!" width="600"/>
        <?php
       }
        ?>
    </body>
</html>
