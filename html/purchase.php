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
</head>
<body>


      <form method = "POST" action="OrderSubmit.php">
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
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September"><br>

            <div class="row">
              <div>
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018"><br>
              </div>
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
  <?php if (isset($_POST['pay'])){
     
        header('Location: products.php');   //Change to proper order history page
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
//Remove item
if(isset($_POST['delete'])){
    $_SESSION['cart'.$_POST['delete']]= '0';
    $counttotal = $counttotal   -  $value;
    $_SESSION["count"] = $counttotal;
    header('Location: cart.php');
}
// Update quantity of item
if(isset($_POST['update'])){
    $_SESSION['cart'.$_POST['update']]= $_POST['qty'];
    header('Location: cart.php');
}
  
  
  
  } else {
    header('Location:register.php');
  }
  ?>
</div>
</body>
</html>
