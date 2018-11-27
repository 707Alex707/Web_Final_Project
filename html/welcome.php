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
      
      <img src="images/34.jpg" alt = "User Wallpaper Picture" width = "1890px" height = "540px"> 
      <hr>
      
      <div align="left">
      			<img src="images/34.jpg" alt = "User Profile Picture Here" width = "200px" height= "200px"> 
               <h1 align="center">Your Recent Activity</h1> 
               <hr>
               <img src="images/34.jpg" alt="Img1" height="300px" width="300px" align="left">
               <img src="images/34.jpg" alt="Img2" height="300px" width="300px" align="">
               <img src="images/34.jpg" alt="Img2" height="300px" width="300px" align=""><img src="images/34.jpg" alt="Img2" height="300px" width="300px" align="">
               <img src="images/34.jpg" alt="Img2" height="300px" width="300px" align="">              
               <img src="images/34.jpg" alt="Img3" height="300px" width="300px" align="right">

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
