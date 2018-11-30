<?php
    //Database
    $servername = "vps4.uoit.tk";
    $server_username = "Project";
    $server_password = "Project!";
    $db_name = "Project";
   
    session_start();

    $conn = mysqli_connect($servername,$server_username, $server_password ,$db_name );
    $id = mysqli_real_escape_string($conn,$_POST['add']);
    $myusername=$_SESSION["user"];
    echo $myusername;

?> 
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Navbar-->
    
    <div class="topnav">
  <ul class="navbar-block">
        
    <li><a href="home.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="aboutus.php">About</a></li>
    <li><a href="faq.php">FAQ</a></li>
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

    <h1><br>Shopping Cart</h1>
    <?php
    //When add to cart button is clicked increment quantity by 1 for each cart
    if(isset($_POST['add'])){
        $quantity = mysqli_query($conn, "SELECT `id_product`, `qty` FROM `products` WHERE id_product='$id' ");
            while($quantity_row = mysqli_fetch_assoc($quantity)){
                if ($quantity_row['qty']!= $_SESSION['cart'.$_POST['add']]){
                    $_SESSION['cart'.$_POST['add']] +=1;
                    $_SESSION["count"] += 1;
                }
            header('Location: products.php');
            }
        
    }
    // -------------------------------------------------------------------------- Main display of cart page ------------------------------------------------------------
    foreach($_SESSION as $name =>  $value){
        if ( $value>0){
            if (substr($name, 0, 4)=='cart'){
                $id = substr($name, 4, (strlen($name)-4));
                $get =  mysqli_query($conn, "SELECT * FROM `products` WHERE id_product='$id' ");
               
                    
                    while($get_row = mysqli_fetch_assoc($get)){ ?>
                    <form id="productform" method="POST" action="purchase.php" oninput="x.value = qty.value *<?php echo $get_row['price'];?> ">
                    <img src="<?php echo $get_row["image"]; ?>" alt="<?php echo $get_row["name"];?>" class="img">
                    <h4> <?php echo $get_row["brand"] . ' ' .$get_row["name"]; ?></h4> 
                    <h4>CAD$ 
                    <output name="x"><?php  $price =$get_row["price"]* $value; echo number_format($price,2). '<br>'; ?></h4> 
                    <input type="number" id="qty" name="qty<?php echo $get_row["id_product"]; ?>" value="<?php echo  $value ?>" min ="1" max="<?php echo $get_row["qty"] ?>"> 
                    <button type="submit" name="update" value="<?php echo $get_row["id_product"]; ?>">Update</button>
                    <button type="submit" name="delete" value="<?php echo $get_row["id_product"]; ?>">Remove</button><br>
                    </form>
                    <?php
                   
                    //Don't Touch buggy af
                    $_SESSION['value'.$get_row["id_product"]] = $value;
                    $total += $price;
                    $counttotal =  $value + $counttotal;
                    
                    }
            }
               
        }
    }
                ?>
       
                    <form method="POST" action="purchase.php">
                    <button type="submit" name="checkout" form="productform">Checkout</button>
                    </form>
    <form method="POST">
    <button name="return" >Continue Shopping</button>
    </form>

    <?php 
    echo '<h3> Total: '.number_format($total,2).'</h3>';
    // To test counter lmao
    echo $counttotal;
    $_SESSION["counttotal"]= $counttotal;
    $_SESSION["total"] =$total;
    
    // ------------------------------------------------------------- End of the display of cart page -----------------------------------------------------------------------
                // Returns to product page
                if(isset($_POST['return'])){
                    unset($_SESSION["count"]);
                    $_SESSION["count"] = $counttotal;
                    header('Location: products.php');
                    
                }

        ?>

</body>
</html>