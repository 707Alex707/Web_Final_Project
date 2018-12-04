<?php
include 'modal.php';
    //Database
    $servername = "vps4.uoit.tk";
    $server_username = "Project";
    $server_password = "Project!";
    $db_name = "Project";
    $conn = mysqli_connect($servername,$server_username, $server_password ,$db_name );
    session_start();
    $myusername=$_SESSION["user"];
    echo $myusername;
?> 

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Alice' rel='stylesheet'>
<title>Product Page</title>
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

    <div class="left-sidebar">
    
        <h3 class="sidebar-title">Filter</h3>
            
        <div class="side-content">
            <ul>
            <li><span class="side-brand">Brand</span></li>
                <ul>
                    <li>Nike</li>
                    <li>Adidas</li>
                    <li>Puma</li>
                    <li>Vans</li>
                </ul>
            </ul>
        </div>
    
    </div>
    <!-- Container for all products -->
    <div class="prod-container">
    <h2>Shoes</h2>


        <table>
        <tr>
        <?php
        $result = mysqli_query($conn,"SELECT * FROM `products` WHERE 1 ");
        $count = mysqli_num_rows($result);
        $columns = 0;
            if($count>0){
            while($row = mysqli_fetch_array($result)){
                if ($columns < 3){       
        ?>
            <form method="POST" action="cart.php">
        <td>
            <!-- Container for each product -->
            <div class="product" onclick="showModal(<?php echo $row['id_product']; ?>);" class="divmodal">
            <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"];?>" class="img">
            <h5 class ="product_name"> <?php echo $row["brand"] . ' ' .$row["name"]; ?></h5> 
            <h5 class ="product_price">CAD$ <?php echo $row["price"]; ?></h5>   
            </div>
        </td>

        <?php  
        ++$columns;
        }else{
        $columns = 0;
        ?>  <td>
            <!-- Container for each product -->
            <div class="product" onclick="showModal(<?php echo $row['id_product']; ?>);" class="img">
            <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"];?>" class="img" >
            <h5 class ="product_name"> <?php echo $row["brand"] . ' ' .$row["name"]; ?></h5> 
            <h5 class ="product_price">CAD$ <?php echo $row["price"]; ?></h5>   
            </div>
    
            <td> 
            </tr>

        <?php } ?>
            <!-- The Pop up for each product-->
            <div class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <img  src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"];?>" class="modal_image">
                <h5 class ="modal-name"> <?php echo $row["brand"] . ' ' .$row["name"]; ?></h5>                     
                <h5 class ="modal-price">CAD$ <?php echo $row["price"]; ?></h5>
                <button name="add" id="cart" value="<?php echo $row["id_product"];?>"> Add to Cart</button><br><br>
            </div>
            </div>
       <?php } ?>

            </form>
        <?php } ?>
        </table>
    </div>  

<script src="js/modal.js"></script>
<script src="js/cart.js"></script>

</body>
</html> 