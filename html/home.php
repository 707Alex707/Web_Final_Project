<?php 
    session_start();
?>
    
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <title>Home</title>
</head>

<body>
    <!-- Navbar-->
    
    <div class="topnav">
    <ul>
        
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="products.php">Shoes</a></li>
        <li><a href="aboutus.html">About</a></li>
        <li><a href="login.php" class="acc"> <?php 
         if(isset($_SESSION["user"])) {
             echo $_SESSION["user"]; 
             
        }else{
              echo "Login"; 
        }
        ?><i class="material-icons" id="icon">person</i></a> </li>
        <li class="navbar-store">NAME OF STORE</li>

    </ul>
    </div>

    <!-- End of Navbar -->            


        
        <!--TEST -->
        <div class="w3-row">
    <div class="w3-half">
      <img src="" style="width:100%">
      <img src="" style="width:100%">
      <img src="" style="width:100%">
    </div>

    <div class="w3-half">
      <img src="images/home1.jpg" style="width:100%">
      <img src="" style="width:100%">
    </div>
  </div>

    <!-- Content-->
    <div class="home-container">
        <div class="row">
            <div class="column-1">
                
            </div>
            <div class="column-2">
                
            </div>
        </div>
    </div>

    <div class="home-container">
        <div class="row">
            <div class="column-2">
                
            </div>
            <div class="column-1">
                
            </div>
        </div>
    </div>

  
    <!--Footer-->
    <div class="footer">

    </div>
    
















<script src="modal.js"></script>
</body>

</html>

