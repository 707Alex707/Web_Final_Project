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
      <p class="welcome"><Strong>Welcome <?php echo $_SESSION["user"] ?></Strong></p> 

      <p class="content">
      This is <?php echo $_SESSION["user"] ?>'s account page.
      </p>

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
<<<<<<< HEAD
   header('location: home.php');
=======
   header('location: login.php');
>>>>>>> a46e4aa44c45bf8c6a58083d1bf2a5c34ee78e94
}
?>     
