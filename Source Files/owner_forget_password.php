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
 
  <div class="container" style="width:50%; height: 2%">
      <div class="item-container">
          <h2 class="log-in text-center"> We-Grow</h2>
      </div>
     
      <div class="item-container text-center">
          <p><small>Reset Page for Retailers</small></p>
      </div>
      <form class="p-4" action="" method="post">
   <div class="form-input">
              <label for="owner_username" class="label" >&ensp;Enter Username</label>
             
              <input type="text" id="owner_username" style="width: 95%; height: 30%;" required="required" name="owner_username">
          </div>
           <br>
          <div class="form-input">
              <label for="owner_new_password" class="label" >&ensp;Enter new Password</label>
              <br>
              <input type="password" id="owner_new_password" style="width: 95%;height: 30%;" required="required" name="owner_new_password"  data-parsley-type="owner_new_password" data-parsley-trigg
       er="keyup">
          </div>
          <br>
          <div class="form-input">
              <label for="conf_owner_new_password" class="label">&ensp;Confirm new Password</label>
             
              <input type="password" name="conf_owner_new_password" id="conf_owner_new_password" required="required" style="width: 95%;height: 30%;" data-parsley-type="conf_owner_new_password" data-parsley-trigg
       er="keyup">
          </div>
          <br>
           
              <input type="submit" class="btn" style="font-size: large; font-weight: 700; background-color: #FFA384; color: white; border-color: white;" value="Reset" name="owner_reset">
          
          <div class="display-space-between">
              <p style="font-size:75%">New applicant? &nbsp;<a href="owner_registration.php">Register here</a></p>   

          </div>
        
         
          <br>
      </form>

  </div>

</body>
</html>

<?php



 if(isset($_POST['owner_reset'])){
 
 $owner_username=$_POST['owner_username'];
  $owner_new_password=$_POST['owner_new_password'];
   $conf_owner_new_password=$_POST['conf_owner_new_password'];
 if($owner_new_password==$conf_owner_new_password){
  $hash_owner_new_password = password_hash($owner_new_password, PASSWORD_BCRYPT, array('cost' => 12));
 $update_owner_fp="update `owners` set owner_password='$hash_owner_new_password'  where owner_username='$owner_username' ";
 $run_owner_fp=mysqli_query($con,$update_owner_fp);
 if($run_owner_fp){
   echo "<script>alert('Password updated successfully.')</script>";
    echo "<script>window.open('owner_login.php','_self')</script>";
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