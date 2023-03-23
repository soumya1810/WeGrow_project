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
 <!--  <nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
    </a>
  </div>
</nav> -->
  <div class="container m-5" style="width:50%; height: 2%">
      <div class="item-container">
          <h2 class="log-in text-center"> We-Grow</h2>
      </div>
     
      <div class="item-container text-center">
          <p><small>Reset Password page for Job Applicants</small></p>
      </div>
      <form class="p-4" action="" method="post">
        <div class="form-input">
              <label for="apl_username" class="label" >&ensp;Enter Username</label>
           
              <input type="text" id="apl_username"  required="required" name="apl_username" style="width: 95%; height: 30%;" >
          </div>
          <br>
          <div class="form-input">
              <label for="apl_new_password" class="label" >&ensp;Enter new Password</label>
              
              <input type="password" id="apl_new_password"  required="required" name="apl_new_password" style="width: 95%; height: 30%;" >
          </div>
          <br>
          <div class="form-input">
              <label for="conf_apl_new_password" class="label">&ensp;Confirm new Password</label>
             
              <input type="password" name="conf_apl_new_password" id="conf_apl_new_password" required="required"  style="width: 95%; height: 30%;">
          </div>
          <br>
           
              <input type="submit" class="btn" style="font-size: large; font-weight: 700; background-color: #FFA384; color: white; border-color: white;" value="Reset" name="apl_reset">
          
          <div class="display-space-between">
              <p style="font-size:75%">New applicant? &nbsp;<a href="apl_registration.php">Register here</a></p>   

          </div>
        
         
       
      </form>

  </div>
</body>
</html>

<?php



 if(isset($_POST['apl_reset'])){
 $apl_username=$_POST['apl_username'];
  $apl_new_password=$_POST['apl_new_password'];
   $conf_apl_new_password=$_POST['conf_apl_new_password'];
 if($apl_new_password==$conf_apl_new_password){
  $hash_apl_new_password = password_hash($apl_new_password, PASSWORD_BCRYPT, array('cost' => 12));
 $update_apl_fp="update `applicant_register` set apl_password='$hash_apl_new_password'  where apl_username='$apl_username' ";
 $run_apl_fp=mysqli_query($con,$update_apl_fp);
 if($run_apl_fp){
   echo "<script>alert('Password updated successfully.')</script>";
    echo "<script>window.open('apl_login.php','_self')</script>";
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