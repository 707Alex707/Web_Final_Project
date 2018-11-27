<<<<<<< HEAD
<html>
<body>
=======
>>>>>>> a46e4aa44c45bf8c6a58083d1bf2a5c34ee78e94
<?php
session_start();
$_SESSION["servername"] = "vps4.uoit.tk";
$_SESSION["server_username"] = "Project";
$_SESSION["server_password"] = "Project!";
$_SESSION["db_name"] = "Project";

<<<<<<< HEAD
$errorLogin =array();
$errorRegister =array();
=======
$errors =array();


$conn = mysqli_connect($_SESSION["servername"],$_SESSION["server_username"], $_SESSION["server_password"] ,$_SESSION["db_name"] );
   $myusername = mysqli_real_escape_string($conn,$_POST['user']);
   $mypassword = mysqli_real_escape_string($conn,$_POST['pass']);

// Login Form
if(isset($_POST['login'])){
   
$result = mysqli_query($conn,"SELECT * FROM `Accounts` WHERE `username` = '$myusername' && `password` = '$mypassword'");
$count = mysqli_num_rows($result);

if ($count==1){

   $_SESSION["user"]= $myusername;
   header('Location: welcome.php');
   
}
else{
<<<<<<< HEAD
   array_push($errorLogin, "Invalid Username/Password");
   $_SESSION['errorLogin']=$errorLogin;
=======
   array_push($errors, "Invalid Username/Password");
   $_SESSION['errors']=$errors;
>>>>>>> a46e4aa44c45bf8c6a58083d1bf2a5c34ee78e94
   header('Location: home.php');
}
}



// Register form
if(isset($_POST['register'])){
   $confirm_pass=mysqli_real_escape_string($conn,$_POST['pass2']);
   $usercheck = mysqli_query($conn,"SELECT * FROM `Accounts` WHERE username='$myusername' LIMIT 1");
   $user = mysqli_fetch_assoc($usercheck);

   if(empty($myusername)){
<<<<<<< HEAD
      array_push($errorRegister, "Enter Username");
         $_SESSION['errorRegister']=$errorRegister;
   }
   if(empty($mypassword)){
      array_push($errorRegister, "Enter Password");
         $_SESSION['errorRegister']=$errorRegister;
   }
   
   if($user['username'] === $myusername){
     array_push($errorRegister, "Username taken");
      $_SESSION['errorRegister']=$errorRegister;
=======
      array_push($errors, "Enter Username");
         $_SESSION['errors']=$errors;
   }
   if(empty($mypassword)){
      array_push($errors, "Enter Password");
         $_SESSION['errors']=$errors;
   }
   
   if($user['username'] === $myusername){
     array_push($errors, "Username taken");
      $_SESSION['errors']=$errors;
>>>>>>> a46e4aa44c45bf8c6a58083d1bf2a5c34ee78e94
     
   }
  
   if($mypassword != $confirm_pass){
<<<<<<< HEAD
      array_push($errorRegister, "Passwords do not match");
      $_SESSION['errorRegister']=$errorRegister;
   }

   if(count($errorRegister)== 0 && count($errorLogin)==0){
   $register = mysqli_query($conn, "INSERT INTO `Accounts` (`id`, `username`, `password`) VALUES (NULL, '$myusername', '$mypassword')");
   $_SESSION["user"]= $myusername;
   header('Location: welcome.php');
   }elseif(count($errorRegister)>0){
        $_SESSION['errorRegister']=$errorRegister;
      header('Location: home.php');
   }elseif(count($errorLogin)>0){
    $_SESSION['errorLogin']=$errorLogin;
    
    header('Location: home.php');
 }
}




?>

<script src="modal.js"></script>
</body>

</html>
=======
      array_push($errors, "Passwords do not match");
      $_SESSION['errors']=$errors;
   }

   if(count($errors)== 0){
   $register = mysqli_query($conn, "INSERT INTO `Accounts` (`id`, `username`, `password`) VALUES (NULL, '$myusername', '$mypassword')");
   $_SESSION["user"]= $myusername;
   header('Location: welcome.php');
   }else{
      header('Location: home.php#modal-login');
   }
}

?>
>>>>>>> a46e4aa44c45bf8c6a58083d1bf2a5c34ee78e94
