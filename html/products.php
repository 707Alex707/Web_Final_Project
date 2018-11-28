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
<link rel="stylesheet" type="text/css" href="style.css">
<link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<title>Product Page</title>
</head>

<body>
    <!-- Navbar-->
    
    <div class="topnav">
    <ul>
        
        <li><a  href="home.php">Home</a></li>
        <li><a class="active" href="products.php">Shoes</a></li>
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

    <div class="left-sidebar">
        <p></p>
    </div>
    <!-- Container for all products -->
    <div class="container">
    <h2>Products</h2>
        <p id="demo">
        <?php 
         if(isset($_SESSION["count"]))
         {
            echo $_SESSION["count"];
         }
         ?>
         </p>

        <table>
            <tr>
            <?php
            $result = mysqli_query($conn,"SELECT * FROM `products` WHERE 1 ");
            $count = mysqli_num_rows($result);
            $columns = 0;
                if($count>0){
                    while($row = mysqli_fetch_array($result)){
                        if ($columns < 2){       
            ?>
                        <form method="POST" action="cart.php">
                    <td>
                        <!-- Container for each product -->
                        <div class="product">
                            <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"];?>" onclick="showModal(<?php echo $row['id_product']; ?>);" class="img">
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
                        <div class="product">
                        <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"];?>" onclick="showModal(<?php echo $row['id_product']; ?>);" class="img">
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
                        <h5 class ="product_name"> <?php echo $row["brand"] . ' ' .$row["name"]; ?></h5> 
                        <h5 class ="product_price">CAD$ <?php echo $row["price"]; ?></h5>
                        <button name="add" id="cart" value="<?php echo $row["id_product"];?>"> Add to Cart</button><br><br>
                    </div>
                </div>
           <?php } ?>
        
            
                <tr>
                    <button name="check" >Check cart</button>

                </tr>
            </form>
            <?php } ?>
        </table>
    </div>  

<script src="modal.js"></script>
<script src="cart.js"></script>

</body>
</html>