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
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Shopping Cart</h1>
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
               ?> <form method="POST" oninput="x.value = qty.value *<?php echo $get_row['price'];?> "><?php
                    
                    while($get_row = mysqli_fetch_assoc($get)){ ?>
                    
                    <img src="<?php echo $get_row["image"]; ?>" alt="<?php echo $get_row["name"];?>" class="img">
                    <h4 class ="product_name"> <?php echo $get_row["brand"] . ' ' .$get_row["name"]; ?></h4> 
                    <h4 class ="product_price">CAD$ 
                    <output name="x"><?php  $price =$get_row["price"]* $value; echo number_format($price,2). '<br>'; ?></h4> 
                    <input type="number" id="qty" name="qty" value="<?php echo  $value ?>" min ="1" max="<?php echo $get_row["qty"] ?>"> 
                    <button type="submit" name="update" value="<?php echo $get_row["id_product"]; ?>">Update</button>
                    <button type="submit" name="delete" value="<?php echo $get_row["id_product"]; ?>">Remove</button><br>
                    
                    <?php
                    //Don't Touch buggy af
                    $total += $price;
                    $counttotal =  $value + $counttotal;
                    }
            }
               
        }
    }
    ?>
       
    
    <button type="submit" name="checkout">Checkout</button>
</form>
    <form method="POST">
    <button name="return" >Continue Shopping</button>
    </form>

    <?php 
    echo '<h3> Total: '.number_format($total,2).'</h3>';
    // To test counter lmao
    echo $counttotal;
    $_SESSION["total"] =$total;
    
    // ------------------------------------------------------------- End of the display of cart page -----------------------------------------------------------------------

        // Checkout
        if(isset($_POST['checkout'])){
            if ($_SESSION["total"] == 0){
                echo "no products in your cart";
            }else{
                $_SESSION["user"] = $myusername;
                header('Location: purchase.php');
            }
        }
        // Returns to product page
        if(isset($_POST['return'])){
            unset($_SESSION["count"]);
            $_SESSION["count"] = $counttotal;
            header('Location: products.php');
        }
        //Remove item
        if(isset($_POST['delete'])){
            $_SESSION['cart'.$_POST['delete']]= '0';
            $counttotal = $counttotal -  $value;
            $_SESSION["count"] = $counttotal;
            header('Location: cart.php');
        }
        // Update quantity of item
        if(isset($_POST['update'])){
            $_SESSION['cart'.$_POST['update']]= $_POST['qty'];
            header('Location: cart.php');
        }
        ?>

</body>
</html>