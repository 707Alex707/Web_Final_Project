
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="assignment3.css">
    </head>
    <body>
    
    
    <div class= "block">

    <div class="sideblock"></div>

    <div class = "main">
    <p id="label"><strong>Login</strong></p>

        
        <form method="POST" action="checkuser.php">
        Username:<br>
        <input type="text" class="text" name="user"><br><br>
        Password:<br>
        <input type="password" class="text" name="pass"><br><br>
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
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </form>
    
    </div>
    </div>
    
        
   
    </body>
</html>