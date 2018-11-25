<?php
session_start();
$_SESSION["servername"] = "vps4.uoit.tk";
$_SESSION["server_username"] = "Project";
$_SESSION["server_password"] = "Project!";
$_SESSION["db_name"] = "Project";

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
   array_push($errors, "Invalid Username/Password");
   $_SESSION['errors']=$errors;
   header('Location: home.php');
}
}



// Register form
if(isset($_POST['register'])){
   $confirm_pass=mysqli_real_escape_string($conn,$_POST['pass2']);
   $usercheck = mysqli_query($conn,"SELECT * FROM `Accounts` WHERE username='$myusername' LIMIT 1");
   $user = mysqli_fetch_assoc($usercheck);

   if(empty($myusername)){
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
     
   }
  
   if($mypassword != $confirm_pass){
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
