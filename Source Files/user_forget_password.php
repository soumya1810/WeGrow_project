<?php include 'includes/db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login-Page</title>
  <link rel="stylesheet" href="css/login.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  <div class="container m-5" style="width:50%; height: 2%">
      <div class="item-container text-center">
          <h2 class="log-in"> We-Grow</h2>
      </div>
     
      <div class="item-container text-center">
          <p><small>Password Reset page for Users</small></p>
      </div>
      <form class="p-4" action="" method="post">
        <div class="form-input">
              <label for="user_username" class="label" >&ensp;Enter Username</label>
             
              <input type="text" id="user_username" style="width: 95%; height: 30%;" required="required" name="user_username">
          </div>
          <br>
          <div class="form-input">
              <label for="user_new_password" class="label" >&ensp;Enter new Password</label>
              
              <input type="password" id="user_new_password" style="width: 95%; height: 30%;" required="required" name="user_new_password">
          </div>
          <br>
          <div class="form-input">
              <label for="conf_user_new_password" class="label">&ensp;Confirm new Password</label>
             
              <input type="password" name="conf_user_new_password" id="conf_user_new_password" required="required" style="width: 95%; height: 30%;" >
          </div>
          <br>
           
              <input type="submit" class="btn" style="font-size: large; font-weight: 700; background-color: #FFA384; color: white; border-color: white;" value="Reset" name="user_reset">
          
          <div class="display-space-between">
              <p style="font-size:75%">New user? &nbsp;<a href="user_registration.php">Register here</a></p>   

          </div>
        
         
       
      </form>

  </div>
</body>
</html>

<?php



 if(isset($_POST['user_reset'])){
 $user_username=$_POST['user_username'];
  $user_new_password=$_POST['user_new_password'];
   $conf_user_new_password=$_POST['conf_user_new_password'];
 if($user_new_password==$conf_user_new_password){
  $hash_user_new_password = password_hash($user_new_password, PASSWORD_BCRYPT, array('cost' => 12));
 $update_user_fp="update `users` set user_password='$hash_user_new_password'  where user_username='$user_username' ";
 $run_user_fp=mysqli_query($con,$update_user_fp);
 if($run_user_fp){
   echo "<script>alert('Password updated successfully.')</script>";
    echo "<script>window.open('user_login.php','_self')</script>";
 }
 else{
 // echo "<script>alert('Unable to update password. Try again later.')</script>";
  die(mysqli_error($con));
 }
 

}else{
  // echo "<script>alert('Passwords do not match. Retype your password.')</script>";
  die(mysqli_error($con));
 }
}
  

 else{
    die(mysqli_error($con));
 }

?>
<!-- 123@user1 -->