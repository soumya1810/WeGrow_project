<?php include 'includes/db.php';
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Job-Seeker Registration Form</title>
  <link rel="stylesheet" href="css/apl_reg.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
   <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap
    </a>
  </div>
</nav>
 <div class="container m-5">

  <form action="" method="post" enctype="multipart/form-data">
    <div class="cont" style="margin: auto; margin-top: 45%;">
      <h1 style="text-align: center; font-weight: 700;text-shadow: 1px 1px 2px white; color:#378595;"> We-Grow</h1>
     
      <h5 style="text-align: center;text-shadow: 1px 1px 2px white, 0 0 1em blue, 0 0 0.2em light-grey; color:darkslategrey">Registration form for Job Applicants</h5>

        <p style="text-align: center;color: rgb(39, 22, 55);">Please fill in this form to register and apply for your desired job.</p>

          <!-- ----------------- -->
          <label for="apl_name"><b>Name</b></label>
          <input type="text" name="apl_name" id="apl_name" placeholder="Enter your name" required>
          <label for="apl_username"><b>Username</b></label>
          <input type="text" name="apl_username" id="apl_username" placeholder="Enter a valid Username" required><br>
          <label for="apl_phone"><b>Phone</b></label>
          <input type="text" placeholder="Enter Phone Number" name="apl_phone" id="apl_phone" required><br>

          <label for="apl_password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="apl_password" id="apl_password" required><br>
          <label for="apl_conf_password"><b>Confirm Password</b></label>
          <input type="password" placeholder="Retype Password" name="apl_conf_password" id="apl_conf_password" required><br>

          <label for="apl_s_ques"><b>Security question</b></label>

   <select class="form-select"  aria-label="Default select example" id="apl_s_ques" name="apl_s_ques" required style="width:100%">

            <option value="" selected disabled>Select security question</option>
        <option value="In what city were you born?">In which city were you born?</option>
<option value="Your first car?">Your first car?</option>
<option value="Your favourite food?">Your favourite food?</option>
<option value="How many people are there in your family?">How many people are there in your family?</option>
<option value="What is your mother's name?">What is your mother's name?</option>


      </select><br>
        <label for="apl_s_ans" style="font-weight:bold">Security question answer</label>
            <input id="apl_s_ans" name="apl_s_ans" placeholder="Answer the above question" required="required" type="text"> 




          <div class="clearfix mt-3">

            <input type="submit" class="btn" style="color: white; font-weight: 400;box-shadow: rgba(18, 6, 6, 0.8) 0px 3px 3px, rgba(221, 221, 221, 0.952) 0px 3px 3px;background-color:#378595;" value="Register" name="apl_register" id="apl_submit">
          <p class="mt-2"></small>Already have an account? <a href="apl_login.php">Login</a></small></p>
          </div>
 </div>   
  </form>

 

</div>

</body>

</html>

<?php

 function getIPAddress_apl() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

 if(isset($_POST['apl_register'])){
  $apl_name=$_POST['apl_name'];
  $apl_username=$_POST['apl_username'];
   $apl_phone=$_POST['apl_phone'];
  $apl_password=$_POST['apl_password'];
  $apl_conf_password=$_POST['apl_conf_password'];
   $apl_s_ques=$_POST['apl_s_ques'];
    $apl_s_ans=$_POST['apl_s_ans'];
  $apl_ip=getIPAddress_apl();
$hash_apl_password = password_hash($apl_password, PASSWORD_BCRYPT, array('cost' => 12));
$apl_reg_date=date('Y-m-d');
#checking if username or email already exists
  $select_query="Select * from `applicant_register` where apl_username='$apl_username' or apl_phone='$apl_phone'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  if($row_count>0){
    echo "<script>alert('Username or phone already exists')</script>";
  }

  else if($apl_password!=$apl_conf_password){
    echo "<script>alert('Passwords do not match')</script>";
  }
  else{
  #insert query
  $insert_apl_query="insert into `applicant_register` (apl_name,apl_username,apl_phone,apl_password,apl_s_ques,apl_s_ans,apl_ip,apl_reg_date) values ('$apl_name','$apl_username','$apl_phone','$hash_apl_password','$apl_s_ques','$apl_s_ans','$apl_ip','$apl_reg_date')";

  if ($insert_apl_query) {
    $_SESSION['apl_username'] = $apl_username;
}

  $apl_result_query=mysqli_query($con,$insert_apl_query);
}
   if($apl_result_query){
     echo "<script>alert('Registration Successful')</script>";
    echo "<script>window.open('apl_login.php','_self')</script>";
   }
  else{
    die(mysqli_error($con));
  }

 }

?>