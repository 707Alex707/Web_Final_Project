<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Home</title>
</head>

<body>
    <!-- Navbar-->
    <div class="topnav">
    <ul>
        <li><a class="active" href="home.php">Home</a></li>
        <li><a href="products.php">Shoes</a></li>
        <li><a href="">About</a></li>
        
        <span class = "login"><li><button id="loginBtn" class="login-btn" >Account</button></li></span>
    </ul>
    </div>
    <!--Modal for login-->
    <div id="modal-login" class="modal-login">
        <!-- Login form content -->
        <div class="modal-login-content">
            <span class="loginClose">&times;</span>
                <h1> Login </h1>
                <form method="POST" action="checkuser.php">
                <input type="text" class="text" name="user" placeholder ="Username"><br><br>
                <input type="password" class="text" name="pass" placeholder = "Password"><br><br>
                <?php 
                session_start();
                if(isset($_SESSION['errors']))
                {
                if (count($_SESSION['errors']) > 0) : ?>
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                <p class="error"><?php echo $error ?></p>
                <?php endforeach ?>
                <?php 
                unset ($_SESSION['errors']);
                session_destroy();
                endif;
                }
                ?>
                <button type="submit"  name ="login">Login</button><br>
                
                <p>Don't have an account? <a href="#modal-register" id="registerBtn">Register here</a>.</p>
                </form>
        </div>
    </div>

    <!--Register form content -->
    <div id="modal-register" class="modal-register">
        <div class="modal-register-content">
            <span class="registerClose">&times;</span>
            <form method="POST" action="checkuser.php">
            <input type="text" class="text" name="user" placeholder="Username"><br>
            <input type="password" class="text" name="pass" placeholder="Password"><br>
            <input type="password" class="text" name="pass2" placeholder="Confirm Password"><br><br>
            <?php 
            session_start();
            if(isset($_SESSION['errors']))
            {
            if (count($_SESSION['errors']) > 0) : ?>
            <?php foreach ($_SESSION['errors'] as $error) : ?>
            <p class="error"><?php echo $error ?></p>
            <?php endforeach ?>
            <?php 
            unset ($_SESSION['errors']);
            session_destroy();
            endif;
            }
            ?>
            <button type="submit" name ="register">Sign up</button>
    
            <p>Already have an account? <a href="#modal-login"  id="loginBtn">Login here</a>.</p>
            </form>
        </div>
    <div>
                


        
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




















<script src="modal.js"></script>
</body>

</html>