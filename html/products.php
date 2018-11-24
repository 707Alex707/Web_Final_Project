<?php
    
    $servername = "vps4.uoit.tk";
    $server_username = "Project";
    $server_password = "Project!";
    $db_name = "Project";

    $conn = mysqli_connect($servername,$server_username, $server_password ,$db_name );

    session_start();
    
?> 

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

<title>Product Page</title>
</head>
<body>

    <div class="container">
        <h2>Products</h2>
        <p id="demo"><?php 
         if(isset($_SESSION["count"]))
         {
        
        echo $_SESSION["count"];
        
         }?></p>
        <table>
          
                <tr>
        <?php
            $result = mysqli_query($conn,"SELECT * FROM `products` WHERE 1 ");
            $count = mysqli_num_rows($result);
            $columns = 0;
           if($count>0){
            
            while($row = mysqli_fetch_array($result)){
                if ($columns < 3){
                    
                ?>
                <form method="POST" action="cart.php">
            <td>
            <div class="product">
            <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"];?>" class="img">
            <h5 class ="product_name"> <?php echo $row["brand"] . ' ' .$row["name"]; ?></h5> 
            <h5 class ="product_price">CAD$ <?php echo $row["price"]; ?></h5>   
            <button name="add" id="cart" value="<?php echo $row["id_product"]; ?>"> Add to Cart</button><br><br>
                    
            </div>


 
<!-- The Modal -->
<div class="modal">


  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <img  src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"];?>" class="modal_image">
    <h5 class ="product_name"> <?php echo $row["brand"] . ' ' .$row["name"]; ?></h5> 
    <h5 class ="product_price">CAD$ <?php echo $row["price"]; ?></h5>
    
  </div>

</div>

            
           
            </td>
            

          <?php  
            ++$columns;
            }else{
                $columns = 0;
                ?>
                </tr>
           <?php }
            } ?>
              <tr>
                <button type="submit" name="check">Check cart</button>
      
            </tr>
            </form>
            <?php
            }
            cart();
        ?>
        
        </table>
        </div>  

   <script src="modal.js"></script>
   <script src="cart.js"></script>

</body>
</html>