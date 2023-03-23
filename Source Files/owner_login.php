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
  <?php

if(isset($_POST['owner_fp']))
{
  $owner_email_fp = $_POST['owner_email_fp'];
    $check_email_query="Select owner_email from `owners` where owner_email='$owner_email_fp'";
  $check_email_result=mysqli_query($con,$check_email_query);
  // $email_check_query
  // $check_email = mysqli_query($con,"select email from tbl_student where email='$email'");
  $res = mysqli_num_rows($check_email_result);
  if($res>0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br>
     <p><a href="http://localhost/ip_front_copy_copy/owner_forget_password.php?secret='.base64_encode($owner_email_fp).'">Click to Reset Password</a></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p><br><br>
     <p>Regards, </p>
     <p>Team WeGrow</p>
    </div>';

include_once("SMTP/src/PHPMailer.php");
include_once("SMTP/src/SMTP.php");
$email = $owner_email_fp; 
  $mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "soumyasingh.2019@vitbhopal.ac.in";   //Enter your username/emailid
$mail->Password = "glpbkkvqdvmecqrm";   //Enter your password
$mail->FromName = "WeGrow";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  $msg = "We have e-mailed your password reset link!";
}
}
else
{
  $msg = "We can't find a user with that email address";
}
}

?>

  <div class="container pb-0" style="width:50%; height:2%">
      <div class="item-container">
          <h2 class="log-in text-center"> We-Grow</h2>
      </div>
      
      <div class="item-container text-center">
          <p>Login for Retailers</p>
      </div>
      <form class="p-4" action="" method="post">
          <div class="form-input">
              <label for="owner_username" class="label" >&ensp;Username</label>
             
              <input type="text" id="owner_username" style="width: 95%;" required="required" name="owner_username">
          </div>
        <br>
          <div class="form-input">
              <label for="owner_password" class="label">&ensp;Password</label>
           
              <input type="password" name="owner_password" id="owner_password" required="required" style="width: 95%;" >
          </div>
          <br>
           
              <input type="submit" class="btn" style="font-size: large; font-weight: 700; background-color: #FFA384; color: white; border-color: white;" value="Login" name="owner_login">
          
          <div class="display-space-between mb-0">
              <p style="font-size:75%" class="mb-2">New retail owner? &nbsp;<a href="owner_registration.php">Register here</a></p>         
          </div>
          <div class="display-space-between mt-0">
            <p style="font-size:75%">Forget Password?&nbsp;<a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Click here</a></p> 
          </div>     
          
        
             <p class="error text-center"><small><?php if(!empty($msg)){ echo $msg; } ?></small></p>
          <br>
      </form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title fs-5 " id="exampleModalLabel" style="font-style: italic;"><small>Fill in the details to reset your password.</small></p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
          <form  action="" method="post">
       <label for="owner_email_fp" class="label" >&ensp;Enter Email</label>
              <br>
              <input type="text" id="owner_email_fp" style="width: 95%;" required="required" name="owner_email_fp"><br>
              
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn " style="background-color: #FFA384;" value="Send reset link" name="owner_fp">
      </div>
    </form>
    </div>
  </div>
  </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php



 if(isset($_POST['owner_login'])){
  $owner_username=$_POST['owner_username'];
  $owner_password=$_POST['owner_password'];
 

  $select_query="Select * from `owners` where owner_username='$owner_username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
 $select_query_1="Select * from `admin` where owner_username='$owner_username'";

$result_1=mysqli_query($con,$select_query_1);
  $count_1=mysqli_num_rows($result_1);

if($count_1==0){
  if($row_count>0){
     $_SESSION['owner_username'] = $row_data['owner_username'];
     $owner_uname=$_SESSION['owner_username'];
    if(password_verify($owner_password, $row_data['owner_password'])){
     
      // echo "<script>alert('Login Successful')</script>";
    echo "<script>window.open('dashboard_owner.php?owner_uname=$owner_uname','_self')</script>";
      // echo "<script>window.open('ip_form.php?owner_uname=$owner_uname','_self')</script>";
      

    }else{
      echo "<script>alert('Invalid Credentials')</script>";
  }

  }}else{
           echo "<script>alert('Account not activated.')</script>";
  }


  // else{

  //     echo "<script>alert('Invalid Credentials 2')</script>";
 
  //  }

 }

?>