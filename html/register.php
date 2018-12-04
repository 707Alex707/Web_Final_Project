
<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" type="text/css" href="css/assignment3.css">
    </head>
    <body>
    <div class= "block">

    <div class="sideblock"></div>

    <div class = "main">

        <p id="label"><strong>Register</strong></p>
       
        <form method="POST" action="checkuser.php">
        
        Username:<br>
        <input type="text" class="text" name="user"><br>
        Password:<br>
        <input type="password" class="text" name="pass"><br>
        Confirm Password:<br>
        <input type="password" class="text" name="pass2"><br><br>
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
   
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
    </div>
    </body>
</html>