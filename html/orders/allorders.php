<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alexandre
 * Date: 11/29/2018
 * Time: 11:11 PM
 */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order History</title>
    <link href="../css/alex.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!-- Navbar-->
<div class="topnav">
    <ul class="navbar-block">
        <li><a href="../home.php">Home</a></li>
        <li><a href="../products.php">Products</a></li>
        <li><a href="../aboutus.php">About</a></li>
        <li><a href="../faq.php">FAQ</a></li>
        <li class="navbar-store">NAME OF STORE</li>

        <li><a href="../cart.php" class="icon"> <i class="fa fa-shopping-cart">
                    <?php
                    if (isset($_SESSION["count"])) {
                        echo $_SESSION["count"];
                    }
                    ?>
                </i></a></li>

        <li><a href="../login.php" class="acc"> <?php
                if (isset($_SESSION["user"])) {
                    echo $_SESSION["user"];
                } else {
                    echo "Login";
                }
                ?>
            </a></li>
    </ul>
</div>
<!-- End of Navbar -->

<div class="w-90 mr-auto ml-auto">
    <?php
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

    //Checks if user is set
    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user'] == '') {
        echo("<p>Orders not available, please login</p>");
    } else {
        echo("<h2>Displaying ALL Orders</h2>");


        $myusername = $_SESSION["user"];
        $usercheck = mysqli_query($connection, "SELECT * FROM `Accounts` WHERE username='$myusername' LIMIT 1");
        $user = mysqli_fetch_assoc($usercheck);
        $userid = $user['id'];

//Calls method to lookup orders saves orders in list

        $maxOrderNum = mysqli_query($connection, "SELECT MAX(ordernum) FROM `orders`");
        $orderNum =  mysqli_fetch_assoc($maxOrderNum);
        $number = $orderNum['MAX(ordernum)'];

        $ordernum_array = array();
        for($a = 1; $a <= $number;$a++){
            $ordernum_array[$a - 1] = $a;
            echo($ordernum_array[$a]);
        }

//Creates a 3D array containg all order information
//depth 1, order
//depth 2, products
//depth 3, product details
        $orders = array();
        for ($b = 0; $b < sizeof($ordernum_array); $b++) {

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
            for ($c = 0; $c < sizeof($orders[$b][$c]); $c++) {
                $orders[$b][0][5] = (double)$orders[$b][0][5] + (double)$orders[$b][$c][4];
            }

            //Gets date and time of when order was placed
            $temp = mysql_fetch("orders", "ordernum='$ordernum_array[$b]'", "date");
            $orders[$b][0][6] = $temp[0];
        }


//Cycles through orders
        for ($a = 0; $a < sizeof($ordernum_array); $a++) {

            //Convert date format
            $date = new DateTime($orders[$a][0][6]);
            $day = $date->format('d-m-Y');
            $hours = $date->format('H:i:s');

            //Prints date order placed
            echo("<h3>Order #" . $ordernum_array[$a] . "</h3><h4>Placed on " . $day . " at " . $hours . "</h4>");

            //Cycles through all products
            echo("<table class='table-outline mb-0 mt-0'> <tr><td>Product</td><td>Brand</td><td>Price/Unit</td><td>Qty</td><td>Product Subtotal</td></tr>");
            for ($b = 0; $b < sizeof($orders[$a][$b]); $b++) {
                echo("<tr>");
                echo("<td>" . $orders[$a][$b][2] . "</td>");
                echo("<td>" . $orders[$a][$b][1] . "</td>");
                echo("<td>$" . $orders[$a][$b][0] . "</td>");
                echo("<td>" . $orders[$a][$b][3] . "</td>");
                echo("<td>$" . $orders[$a][$b][4] . "</td>");
                echo("</tr>");
            }

            //echo("<tr><td colspan=\"5\" class=\"text-right\">Subtotal:$".$orders[$a][0][5]."</td></tr>");
            //echo("<tr><td colspan=\"5\" class=\"text-right\">Tax:$".($orders[$a][0][5]*0.13)."</td></tr>");
            //echo("<tr><td colspan=\"5\" class=\"text-right\">Total:$".$orders[$a][0][5]*1.13."</td></tr>");
            echo("</table>");
            echo("<p class='mt-0 mb-0'>Subtotal $" . $orders[$a][0][5] . "</p>");
            echo("<p class='mt-0 mb-0'>Tax $" . ($orders[$a][0][5] * 0.13) . "</p>");
            echo("<p class='mt-0 mb-0'>Total $" . $orders[$a][0][5] * 1.13 . "</p><br>");

        }
    } //end of user logged in or not


    //Takes in the table id and a search pram and the col to add to array
    function mysql_fetch($table, $search, $col)
    {
        $sql = "SELECT * FROM " . $table . " WHERE " . $search;
        global $connection;
        $res = mysqli_query($connection, $sql);
        //echo("<br>sql:".$sql);

        //Adds elements to an array
        $i = 0;
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[$i] = $row[$col];
            $i++;
        }
        return $data;
    }


    ?>
</div>


</body>
</html>
