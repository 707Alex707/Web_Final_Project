<?php

   session_start();
   if(isset($_SESSION["user"]))
   {
?>
<html>
   
   <head>
      <title>Welcome </title>
      <link rel="stylesheet" type="text/css" href="assignment3.css">
   </head>
   
   <body>
   <div class= "welcomeblock">
      <div class= "topbar">
   <form method="GET">
      <p class="welcome" align="center"><Strong>Welcome <?php echo $_SESSION["user"] ?></Strong></p> 

      <p class="content">
      This is <?php echo $_SESSION["user"] ?>'s account page.
      </p>
      
      <img src"" alt = "User Wallpaper Picture" width = "auto" height = "540px"> /* User should be able to upload profile image and wallpaper image to his acount database or choose one from defaults*/
      <img src"" alt = "User Profile Picture Here" width = "200px" height= "200px"> 
      <div>
               <p>Your Recent Activity</p> /* From Cookies we should be able to look at history and show what user has looked at.*/
         <ul>
            <li>You looked @ img 1</li> 
            <li>You looked @ img 2</li>
            <li>You looked @ img 3</li>
         </ul>
      </div>
     


      <button class="logout_btn" name ="logout">Logout</button>
   </form>
   </div>
   </div>
   </body>
   
</html>

<?php
}
if(isset($_GET['logout'])){
   session_destroy();
   unset($_SESSION["user"]);
   header('location: home.php');
}
?>     
