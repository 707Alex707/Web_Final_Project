<?php 
    session_start();
?>
    
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <title>Home</title>
</head>

<body>
    <!-- Navbar-->
    
  <div class="topnav">
  <ul class="navbar-block">
        
    <li><a href="home.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="aboutus.php">About</a></li>
    <li class="navbar-store">NAME OF STORE</li>

    <li> <a href="cart.php" class="icon"> <i class="fa fa-shopping-cart" >
    <?php 
      if(isset($_SESSION["count"])){
       echo $_SESSION["count"];
      }
    ?>
    </i></a></li>

    <li><a href="login.php" class="acc"> <?php 
      if(isset($_SESSION["user"])) {
        echo $_SESSION["user"];   
        }else{
          echo "Login"; 
        }
    ?>
    </a></li>

  </ul>
  </div>

    <!-- End of Navbar -->            


        
        <!--TEST -->
 
  <div class="w3-content" style="max-width:1500px">
   <!-- Photo Grid -->
  <div class="w3-row">
    <div class="w3-half">
      <img src="images/home34.jpg" style="width:100%">
      <img src="images/home20.jpg" style="width:100%">
      <img src="images/home35.jpg" style="width:100%">
      <img src="images/home44.jpg" style="width:100%">
    </div>

    <div class="w3-half">
      <img src="images/home15.jpg" style="width:100%">
      <img src="images/home42.jpg" style="width:100%">
    </div>
  </div>
  </div>
  
<!-- Zigzag -->
<div class="zig-container">
  <div class="zigrow">
    <div class="zigcolumn-1">
      <h1 class="zigtitle"> Shoe Store</h1>
      <p class="zig-content">PLS PUT SOMETHING HERE THANKS</p>
    </div>
    <div class="zigcolumn-2">
      <img class="zigimg" src="images/adidas.png" >
    </div>
  </div>
</div>




    <!--Footer-->
    <footer>
        <div class="foot-wrapper">
    <p> test</p>
        </div>
    </footer> 

<script src="js/cart.js"></script>
<script src="js/modal.js"></script>
</body>

</html>

