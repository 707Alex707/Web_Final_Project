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
        $userid=$user['id']; // username id 1
        $allOrders = mysqli_query($conn,"SELECT * FROM `orders` INNER JOIN order_items ON orders.ordernum = order_items.ordernum WHERE orders.id = '$userid'");
        //output 1 order number
        


            
        while($rowall = mysqli_fetch_array($allOrders)){
            $unique = $rowall['ordernum'];
            echo "Order Number";
            echo $unique;z
            echo "<br>";
            $ordernum = mysqli_query($conn,"SELECT * FROM `orders` INNER JOIN order_items ON orders.ordernum = order_items.ordernum WHERE orders.ordernum = '$unique'");
            while($row = mysqli_fetch_array($ordernum)){

            echo "ID PRODUCT: ";
            echo $row['id_product'];
            $id=$row['id_product'];
            echo "QTY: ";
            echo $row['qty'];
            echo "       |   ";
            $product = mysqli_query($conn,"SELECT * FROM `products` WHERE id_product='$id'");
            $price = mysqli_fetch_assoc($product);
            echo $price["price"];
            echo "       |  Total: ";
            echo $price["price"]*$row['qty'];
            echo"<br>";
            }
        }
        
             
        
    }

        
     
    