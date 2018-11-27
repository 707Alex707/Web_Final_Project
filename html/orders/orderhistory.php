<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexandre
 * Date: 27/11/18
 * Time: 3:05 PM
 */


//Database connection information
$servername = "vps4.uoit.tk";
$username = "Project";
$password = "Project!";
$database = "Project";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    }
    //echo "Connected successfully to database";


$userid = 1;


//Finds Order numbers based on user id
$sql= "SELECT * FROM orders WHERE id='$userid'";
$res=mysqli_query($connection,$sql);

if (mysqli_num_rows($res) >= 1){
    echo("Orders Found for the userid ".$userid);
} else {
    echo("No Orders Found for the userid ".$userid);
    exit();
}

//Adds order numbers to an array
$i = 0;
$ordernum_array = array();
while($row = mysqli_fetch_assoc($res))
{
    $ordernum_array[$i] = $row['ordernum'];
    $i++;
}

//Prints order numbers
echo("<br>");
echo("Orders:");
for ($count = 0; $count < sizeof($ordernum_array); $count++){
    echo($ordernum_array[$count]." ");
}


//Get products in order based on order number
for($i = 0; $i < sizeof($ordernum_array); $i ++){
    $sql= "SELECT * FROM order_items WHERE ordernum='$ordernum_array[$i]'";
    $res=mysqli_query($connection,$sql);

    while($row = mysqli_fetch_assoc($res))
    {
        echo("ProductID:".$row['id_product']." Qty".$row['qty']."<br>");
    }

}


//create method pass order number to it, print out data




mysqli_close($connection);





?>

<html>
    <head>
        <title>Order History</title>
    </head>

    <body>
        <div id="order"></div>
    </body>



</html>

