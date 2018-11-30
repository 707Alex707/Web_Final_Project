<?php
    session_start();
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <title>Frequently Asked Questions</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
<br>
<div  class="w-100 bg-grey span-vh">
    <div class="bg-grey span-vh m-auto w-90">
        <div>
            <h3>What products do we sell?</h3>
            <p>Stuff</p>
        </div>
        <div>
            <h3>Why should we shop at [Shoe Store Name]?</h3>
            <p>Because</p>
        </div>
        <div>
            <h3>What seperates this store from the others?</h3>
            <p>Because</p>
        </div>
        <div>
            <h3>How do I purchase items on the website?</h3>
            <p>Click on [Products], and a list of our products will be brought up.<br>
            To add an item to the cart, click on the image of the item, and click [Add to Cart].<br>
            When you're done, click on the Cart Icon on the top-right, beside your account name.<br>
            Review your order. Then click on [Checkout].<br>
            Enter your billing address and payment information. All fields must be filled.<br>
            Once you're done, click on [Place Order] to submit your order.</p>
        </div>
        <div>
            <h3>How can I review my previous orders?</h3>
            <p>Click on your account name in the top-right<br>
            Click on [View Orders] to see a list of your previous orders</p>
        </div>
    </div>
</div>
</body>
</html>