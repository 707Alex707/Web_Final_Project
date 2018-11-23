<?php
    
    $servername = "vps4.uoit.tk";
    $server_username = "Project";
    $server_password = "Project!";
    $db_name = "Project";
   
    session_start();
    
    $conn = mysqli_connect($servername,$server_username, $server_password ,$db_name );
    $id = mysqli_real_escape_string($conn,$_POST['add']);
    
?> 
<html>
<head>
</head>
<body>
    <h1>Beta Shopping Cart</h1>
   <?php
   $result = mysqli_query($conn,"SELECT * FROM `products` WHERE `id_product` = '$id' ");
   $_SESSION["row"] = mysqli_fetch_array($result);
      
   if(isset($_POST['add'])){
    $_SESSION["count"] += 1;
    $_SESSION ["price"] = $_SESSION ["price"] + $_SESSION["row"]["price"];
    header('Location: products.php');

}
if(isset($_POST['check'])){
    echo $_SESSION["count"]; ?><br><?php
   echo $_SESSION["total"] = $_SESSION ["price"] +$_SESSION["total"] ;
 


?>
   <form method="POST">
   <img src="<?php echo $_SESSION["row"]["image"]; ?>" alt="<?php echo $row["name"];?>" class="img">
    <h5 class ="product_name"> <?php echo $_SESSION["row"]["brand"] . ' ' .$_SESSION["row"]["name"]; ?></h5> 
    <h5 class ="product_price">CAD$ <?php echo $_SESSION["row"]["price"]; ?></h5>   
   <button type="submit" name="checkout">Checkout</button>

<?php 

    }
    if(isset($_POST['checkout'])){
    
       session_unset();
       header('Location: products.php');
    }

       ?>

</body>
</html>