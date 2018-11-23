<?php
    $servername = "vps4.uoit.tk";
    $server_username = "Project";
    $server_password = "Project!";
    $db_name = "Project";
   
    session_start();
    
    $conn = mysqli_connect($servername,$server_username, $server_password ,$db_name );
    $id = mysqli_real_escape_string($conn,$_POST['add']);

    function cart(){
        
    }
    
?> 
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Beta Shopping Cart</h1>
   <?php
   $result = mysqli_query($conn,"SELECT * FROM `products` WHERE `id_product` = '$id' ");
   $_SESSION["row"] = mysqli_fetch_array($result);
   
   //When add to cart button is clicked increment quantity by 1 for each cart
   if(isset($_POST['add'])){
    $quantity = mysqli_query($conn, "SELECT `id_product`, `qty` FROM `products` WHERE id_product='$id' ");
    while($quantity_row = mysqli_fetch_assoc($quantity)){
        if ($quantity_row['qty']!= $_SESSION['cart'.$_POST['add']]){
            $_SESSION['cart'.$_POST['add']] +=1;
            $_SESSION["count"] += 1;
            $_SESSION ["price"] = $_SESSION ["price"] + $_SESSION["row"]["price"];
        }
    header('Location: products.php');
    
    }
}
        //When check cart is clicked, display something
        if(isset($_POST['check'])){ 
        foreach($_SESSION as $name => $value){
            if ($value>0){
                if (substr($name, 0, 4)=='cart'){
                    $id = substr($name, 4, (strlen($name)-4));
                    $get =  mysqli_query($conn, "SELECT * FROM `products` WHERE id_product='$id' ");
                    while($get_row = mysqli_fetch_assoc($get)){ ?>
                    <form method="POST">
                    <img src="<?php echo $get_row["image"]; ?>" alt="<?php echo $get_row["name"];?>" class="img">
                    <h5 class ="product_name"> <?php echo $get_row["brand"] . ' ' .$get_row["name"]; ?></h5> 
                    <h5 class ="product_price">CAD$ 
                    <?php  $price =$get_row["price"]*$value;
                     echo $price. '<br>';
                    ?></h5> 
                    <input type="number" name="qty" value="<?php echo $value ?>"><br>  
                    <?php
                      
                    }
            }
            }
        }
?>
       
 
<button type="submit" name="checkout">Checkout</button>

<?php 
}

    // Checkout
    if(isset($_POST['checkout'])){
    
       session_unset();
       header('Location: products.php');
    }

       ?>

</body>
</html>