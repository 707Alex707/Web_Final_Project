<?php

session_start();
if(isset($_SESSION["user"]))
{
    ?>
    <html>

    <head>
        <title>Welcome </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/alex.css" rel="stylesheet">
    </head>

    <body>

    <div class="navbar">
        <ul class="navbar-block">
            <li><a href="home.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li class="navbar-store">NAME OF STORE</li>
            <li><a href="#" class="acc"> <?php echo $_SESSION["user"]; ?> <i class="material-icons" id="icon">person</i></a> </li>
        </ul>
    </div>

    <br>
    <div class= "welcomeblock">
        <div class= "topbar">
            <form method="GET">
                <p class="welcome mb-0"><Strong>Welcome <?php echo $_SESSION["user"] ?></Strong></p>

                <p class="content mt-0">
                    This is your account management page.
                </p>

                <button class="logout_btn" name ="logout">Logout</button>
                <input type="button" onclick="location.href='/orders/orderhistory2.php';" value="View Orders" />

            </form>
        </div>
    </div>
    </body>



    </html>

    <?php
} else {
    echo("<h3>Not Logged in, redirecting to login page shortly</h3>");
    header( "refresh:3;url=login.php" );
}


if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION["user"]);
    header('location: home.php');
}
if(isset($_GET['view'])){
    $_SESSION["user"];
    header('location: orders/orderhistory2.php');
}
?>
