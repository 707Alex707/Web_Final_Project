<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexandre
 * Date: 28/11/18
 * Time: 4:00 PM
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

//Stores data in database
$sql = "INSERT INTO orders (id) VALUES ('{$connection->real_escape_string($userid)}')";
$insert = $connection->query($sql);


if ($insert == True){
    echo("Order number generated");
} else {
    echo("An error occurred <br>");
    die("Error: $connection->error");

}

$order_num = array();
$order_num = mysql_fetch("orders", "id='$userid'", "ordernum");
$lorder = sizeof($order_num) - 1;
echo("<br>Last Order Number ".$order_num[$lorder]);




$connection->close();



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