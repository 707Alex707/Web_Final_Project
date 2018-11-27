
     <!------------------------------- Start of HTML--------------------------------------->
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    
    <!--<script src="live-validation.js"></script>-->

    <title>Home</title>
</head>

<body>
    <!-- Navbar-->
    <div class="topnav">
    <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="products.php">Shoes</a></li>
        <li><a href="aboutus.html">About</a></li>
        
        <span class = "login"><li><button id="loginBtn" onclick="login();" class="login-btn" >Account</button></li></span>
    </ul>
    </div>

    <!--Modal for login-->
    <div id="modal-login" class="modal-login">
        <!-- Login form content -->
        <div class="modal-login-content">
            <span class="loginClose">&times;</span>
                <h1> Login </h1>
                <form method="POST" action="checkuser.php">
                
                <input type="text" class="text" id="username" name="user" placeholder ="Username" required><br>
            
                <br>

                <input type="password" id="password" class="text" name="pass" placeholder = "Password" required><br>
 
                <br>
            

            <?php 
            session_start();
            if(isset($_SESSION['errorLogin']))
            {
            if (count($_SESSION['errorLogin']) > 0) : ?>
            <?php foreach ($_SESSION['errorLogin'] as $error) : ?>
            <p class="error"><?php echo $error ?></p>
            <?php endforeach ?>
            <?php 
            unset ($_SESSION['errorLogin']);
            session_destroy();
            endif;
            }
            ?>


                <button type="submit"  name ="login">Login</button><br>
                <p>Don't have an account? <a href="javascript:void(0)" onclick="register();" id="registerBtn">Register here</a>.</p>
                </form>
        </div>
    </div>

    <!--Register form content -->
    <div id="modal-register" class="modal-register">
        <div class="modal-register-content">
            <span class="registerClose">&times;</span>

            <h1> Sign up </h1>
            <form method="POST" action="checkuser.php"  id="registration">
            <input type="text" id="regUsername" class="text" name="user" placeholder="Username" min="4" required><br> 
            <input type="password" id="regPassword" class="text" name="pass" placeholder="Password" min="8" max="20"required><br>
            <input type="password" class="text" name="pass2" placeholder="Confirm Password" required><br><br>

            <?php 
            session_start();
            if(isset($_SESSION['errorRegister']))
            {
            if (count($_SESSION['errorRegister']) > 0) : ?>
            <?php foreach ($_SESSION['errorRegister'] as $error) : ?>
            <p class="error"><?php echo $error ?></p>
            <?php endforeach ?>
            <?php 
            unset ($_SESSION['errorRegister']);
            session_destroy();
            endif;
            }
            ?>

        
            <button type="submit" name ="register">Sign up</button>
    
            <p>Already have an account? <a href="javascript:void(0)" onclick="login();" id="loginBtn">Login here</a>.</p>
            </form>
        </div>
    <div>
    <!-- End of Navbar -->            


        
        <!--TEST -->
        <div class="w3-row">
    <div class="w3-half">
      <img src="" style="width:100%">
      <img src="" style="width:100%">
      <img src="" style="width:100%">
    </div>

    <div class="w3-half">
      <img src="" style="width:100%">
      <img src="" style="width:100%">
    </div>
  </div>

    <!-- Content-->
    <div class="container">
        <div class="row">
            <div class="column-1">
                
            </div>
            <div class="column-2">
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="column-2">
                
            </div>
            <div class="column-1">
                
            </div>
        </div>
    </div>

  
    <!-- Bottom bar-->


















<<<<<<< HEAD
=======


>>>>>>> a46e4aa44c45bf8c6a58083d1bf2a5c34ee78e94
<script src="modal.js"></script>
</body>

</html>

