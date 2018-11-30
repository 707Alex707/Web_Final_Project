<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alexandre
 * Date: 11/30/2018
 * Time: 1:33 AM
 */
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/alex.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Buenard' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="w-100">

    <!-- Navbar-->
    
    <div class="topnav">
  <ul class="navbar-block">
        
    <li><a href="home.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="aboutus.php">About</a></li>
    <li><a href="faq.php">FAQ</a></li>
    <li class="navbar-store">NAME OF STORE</li>

    <li> <a href="cart.php" class="icon"> <i class="fa fa-shopping-cart" >
    <?php 
      if(isset($_SESSION["count"])){
       echo $_SESSION["count"];
      }
    ?>
    </i></a></li>

    <li><a href="login.php" class="acc"> <?php 
      if(isset($_SESSION["user"])) {
        echo $_SESSION["user"];   
        }else{
          echo "Login"; 
        }
    ?>
    </a></li>

  </ul>
  </div>

    <!-- End of Navbar -->      

    <div class="w-100 bg-grey span-vh">

        <div class="bg-grey span-vh m-auto w-90">

            <br>
            <div>
                <h3 class="mb-0 mt-0">Contact Information</h3>
                <p class="mb-0 mt-0">Number: 123 456 7890</p>
                <p class="mb-0 mt-0">Email: contactus@shoes.uoit.tk</p>
            </div>

            <div>
                <h3 class="mb-0 mt-0">Warehouse Location</h3>
                <p class="mb-0 mt-0">Address: 2000 Simcoe St N Oshawa, ON L1G 4S9</p>
                <div id="map"></div>
                <script>
                    // Initialize and add the map
                    function initMap() {
                        // The location of Uluru
                        var location = {lat: 43.9455141, lng: -78.8978382};
                        // The map, centered at Uluru
                        var map = new google.maps.Map(
                            document.getElementById('map'), {zoom: 16, center: location});
                        // The marker, positioned at Uluru
                        var marker = new google.maps.Marker({position: location, map: map});
                    }
                </script>
                <!--Load the API from the specified URL
                * The async attribute allows the browser to render the page while the API loads
                * The key parameter will contain your own API key (which is not needed for this tutorial)
                * The callback parameter executes the initMap() function
                -->
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeaiNPaw4Dw5A-ZBi4hpZxCzDzEIpihT4&callback=initMap"></script>
            </div>

            <div>
                <h3>History</h3>
                <p>We are an online shoe store founded in 2018. We specialize in providing hard to find shoes at discount
                    prices.</p>
            </div>
        </div>
    </div>
</body>
</html>
