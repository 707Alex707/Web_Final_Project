<?php
    $servername = "vps4.uoit.tk";
    $server_username = "Project";
    $server_password = "Project!";
    $db_name = "Project";
   
    session_start();
    $conn = mysqli_connect($servername,$server_username, $server_password ,$db_name );


    if(isset($_SESSION["user"])){   
    $myusername=$_SESSION["user"];
    $usercheck = mysqli_query($conn,"SELECT * FROM `Accounts` WHERE username='$myusername' LIMIT 1");
    $user = mysqli_fetch_assoc($usercheck);
    $userid=$user['id']; // username id
    $user = mysqli_fetch_assoc($usercheck);
    $genOrderNum = mysqli_query($conn, "INSERT INTO `orders`(`id`, `date`, `ordernum`) VALUES ('$userid',NULL,NULL)");
    $queOrder = mysqli_query($conn, "SELECT MAX(ordernum) FROM `orders`");
    $orderNum =  mysqli_fetch_assoc($queOrder);
    $number = $orderNum['MAX(ordernum)'];
        foreach($_SESSION as $name => $value){
        if ($value>0){
        if (substr($name, 0, 4)=='cart'){
            $id = substr($name, 4, (strlen($name)-4));
            $get =  mysqli_query($conn, "SELECT * FROM `products` WHERE id_product='$id' ");   
        while($get_row = mysqli_fetch_assoc($get)){ 
            $insert = mysqli_query($conn, "INSERT INTO `order_items` (`linenum`, `id_product`, `ordernum`, `qty`) VALUES (NULL, '$id', '$number', '$value' )");
?>
        <p>Product <?php echo $x; $x++;?> <span class="price">$<?php echo number_format($price =$get_row["price"]*$value, 2);?> Quantity: <?php  echo $value;?></span></p>
               

<?php 
        unset($_SESSION['cart'.$id]);
        unset($_SESSION["counttotal"]);
    
                            }
                    }
                }
            }     
            echo 'Order #'.$number;
?>
      
    <p>Total <span class="price"><b><?php echo number_format($_SESSION["total"],2);?></b></span></p>
    <a href="home.php">home</a>
<?php
  

    }



?>