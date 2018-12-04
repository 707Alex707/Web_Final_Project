<?php
    $servername = "vps4.uoit.tk";
    $server_username = "Project";
    $server_password = "Project!";
    $db_name = "Project";
   
    session_start();
    $x=1;
    $conn = mysqli_connect($servername,$server_username, $server_password ,$db_name );

    if(isset($_SESSION["user"]))
   { 
    $myusername=$_SESSION["user"];
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/infoValidation.js"></script>
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
      if(isset($_SESSION["counttotal"])){
       echo $_SESSION["counttotal"];
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
    <!---onsubmit="validInfo()" --->
    <div class="billing">
      <form method = "POST" onsubmit="validInfo()" action="OrderSubmit.php">
      <br>
      <br>
            <h3>Billing Address</h3>
            <label for="fname">Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John Smith"><br>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="johnsmith@example.com"><br>
            <label for="adr">Address</label>
            <input type="text" id="adr" name="address" placeholder="29 Mullord Ave"><br>
            <label for="city"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Ajax"><br>

            
              
                <label for="province">Province</label>
                <input type="text" id="state" name="province" placeholder="ON">
              </div>
              
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="L1Z1L1">
              </div>
            </div>
          </div>

         
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
             <p> img of cards </p>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John Smith"><br>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"><br>
            <label for="expmonth">Exp. Date</label>
            <input type="month" id="expdate" name="expdate" placeholder="September"><br>

            <div class="row">
              <div>
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352"><br>
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><br>
        <button type="submit" name="pay">Place Order</button>
      </form>
    </div>
  </div>
      </div>
  <div>
    <div>
      <h4>Cart 
        <span>
          <i class="fa fa-shopping-cart"></i> 
          <b><?php echo $_SESSION["count"];?></b>
        </span>
      </h4>
      <p> <?php foreach($_SESSION as $name => $value){
                  if ($value>0){
                      if (substr($name, 0, 4)=='cart'){
                          $id = substr($name, 4, (strlen($name)-4));
                          $get =  mysqli_query($conn, "SELECT * FROM `products` WHERE id_product='$id' ");
                            while($get_row = mysqli_fetch_assoc($get)){ ?>
                   
      <p>Product <?php echo $x; $x++;?> <span class="price">$<?php echo number_format($price =$get_row["price"]*$value, 2);?> Quantity: <?php  echo $value;?></span></p>
                   
<?php 
                            }
                      }
                  }
                }      
?>
      
      <p>Total <span class="price"><b><?php echo number_format($_SESSION["total"],2);?></b></span></p>
    </div>
  </div>
  <?php 
  
  } else {
    header('Location:register.php');
  }
  ?>
</div>


</body>
</html>
<?php

//Remove item
if(isset($_POST['delete'])){
    $_SESSION['cart'.$_POST['delete']]= '0';
    $value = $_SESSION['value'.$_POST['delete']];
    $counttotal = $_SESSION["counttotal"];
    $counttotal = $counttotal   -  $value;
    $_SESSION["count"] = $counttotal;
    header('Location: cart.php');
}
// Update quantity of item
if(isset($_POST['update'])){
    $_SESSION['cart'.$_POST['update']]= $_POST['qty'.$_POST['update']];//qty of the product
    $qty =  $_SESSION['cart'.$_POST['update']]; //qty of the product
    $counttotal =  $_SESSION["counttotal"] + $qty; //Total product number = quantity of products + otal product number
    $_SESSION["count"] = $counttotal; //Set to ouput count`
    header('Location: cart.php');
}
   // Checkout
   if(isset($_POST['checkout'])){
    if ($_SESSION["total"] == 0){
        echo "no products in your cart";
    }else{
        $_SESSION["user"] = $myusername;
        header('Location: purchase.php');
    }
}
?>
