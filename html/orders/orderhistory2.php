<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alexandre
 * Date: 11/27/2018
 * Time: 11:32 PM
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

//Gets user id from database
session_start();
$myusername=$_SESSION["user"];
$usercheck = mysqli_query($connection,"SELECT * FROM `Accounts` WHERE username='$myusername' LIMIT 1");
$user = mysqli_fetch_assoc($usercheck);
$userid=$user['id'];

//Calls method to lookup orders saves orders in list
$ordernum_array = array();
$ordernum_array = mysql_fetch("orders", "id='$userid'", "ordernum");

//Creates a 3D array containg all order information
//depth 1, order
//depth 2, products
//depth 3, product details
$orders = array();
for($b = 0; $b < sizeof($ordernum_array); $b++) {

    $order_products = array();
    $order_products = mysql_fetch("order_items", "ordernum='$ordernum_array[$b]'", "id_product");

    $order_data = array(array());
    for ($a = 0; $a < sizeof($order_products); $a++) {

        //Returns Array of one price there just add first element to larger list instead of having more dim to arraylist
        $temp = mysql_fetch("products", "id_product='$order_products[$a]'", "price");
        $order_data[$a][0] = $temp[0];

        ///Returns Array of one price there just add first element to larger list instead of having more dim to arraylist
        $temp = mysql_fetch("products", "id_product='$order_products[$a]'", "brand");
        $order_data[$a][1] = $temp[0];

        ///Returns Array of one price there just add first element to larger list instead of having more dim to arraylist
        $temp = mysql_fetch("products", "id_product='$order_products[$a]'", "name");
        $order_data[$a][2] = $temp[0];

        //Returns Array of one price there just add first element to larger list instead of having more dim to arraylist
        $temp = mysql_fetch("order_items", "ordernum='$ordernum_array[$b]' AND id_product='$order_products[$a]'", "qty");
        $order_data[$a][3] = $temp[0];

        //Calculates subtotal for each product
        $order_data[$a][4] = (double)$order_data[$a][0] * (double)$order_data[$a][3];

        //Initalizes value
        $order_data[$a][5] = 0;

        //Gets date and time of when order was placed
        mysql_fetch("orders", "ordernum='$ordernum_array[$b]'", "date");



    }
    //Adds all products of an order to a larger array containing all orders
    $orders[$b] = $order_data;

    //Not the best solution but works, adds order total
    for($c = 0; $c < sizeof($orders[$b][$c]);$c++){
        $orders[$b][0][5] = (double)$orders[$b][0][5] + (double)$orders[$b][$c][4];
    }

    //Gets date and time of when order was placed
    $temp = mysql_fetch("orders", "ordernum='$ordernum_array[$b]'", "date");
    $orders[$b][0][6] = $temp[0];
}



//Cycles through orders
for ($a = 0; $a < sizeof($ordernum_array); $a++){

    //Convert date format
    $date = new DateTime($orders[$a][0][6]);
    $day = $date->format('d-m-Y');
    $hours = $date->format('H:i:s');

    //Prints date order placed
    echo("<h3>Order #".$ordernum_array[$a]."</h3><h4>Placed on ".$day." at ".$hours."</h4>");

    //Cycles through all products
    echo("<table class='table-outline mb-0 mt-0'> <tr><td>Product</td><td>Brand</td><td>price/unit</td><td>qty</td><td>product subtotal</td></tr>");
    for ($b = 0; $b < sizeof($orders[$a][$b]); $b++){
        echo("<tr>");
        echo("<td>".$orders[$a][$b][2]."</td>");
        echo("<td>".$orders[$a][$b][1]."</td>");
        echo("<td>$".$orders[$a][$b][0]."</td>");
        echo("<td>".$orders[$a][$b][3]."</td>");
        echo("<td>$".$orders[$a][$b][4]."</td>");
        echo("</tr>");
    }

    //echo("<tr><td colspan=\"5\" class=\"text-right\">Subtotal:$".$orders[$a][0][5]."</td></tr>");
    //echo("<tr><td colspan=\"5\" class=\"text-right\">Tax:$".($orders[$a][0][5]*0.13)."</td></tr>");
    //echo("<tr><td colspan=\"5\" class=\"text-right\">Total:$".$orders[$a][0][5]*1.13."</td></tr>");
    echo("</table>");
    echo("<p class='mt-0 mb-0'>Subtotal $".$orders[$a][0][5]."</p>");
    echo("<p class='mt-0 mb-0'>Tax $".($orders[$a][0][5]*0.13)."</p>");
    echo("<p class='mt-0 mb-0'>Total $".$orders[$a][0][5]*1.13."</p><br>");

}


//Takes in the table id and a search pram and the col to add to array
function mysql_fetch($table, $search, $col){
    $sql = "SELECT * FROM ".$table." WHERE ".$search;
    global $connection;
    $res=mysqli_query($connection, $sql);
    //echo("<br>sql:".$sql);

    //Adds elements to an array
    $i = 0;
    $data = array();
    while($row = mysqli_fetch_assoc($res))
    {
        $data[$i] = $row[$col];
        $i++;
    }
    return $data;
}

?>

<html>
<head>
    <title>Order History</title>
    <link href="../css/alex.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
</html>
