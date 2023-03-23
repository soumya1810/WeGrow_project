<?php include 'includes/db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/user_reg2.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/user_reg1.css" media="all" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
</head>
<body >
  <style>
    body{
   background: #EFE7BC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #D4D3DD, #EFE7BC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #D4D3DD, #EFE7BC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
  </style>
<div class="container m-5">


			<style type="text/css">
     input:focus{
      border-color: silver;
      border-width: 0.2px;
      border-style: solid;
     }   
      </style>
      
           
            <div class="form" style="background-color: transparent;">

                <h1 class="font-weight-bold" style="color:#378595;margin-left:3%; margin-bottom: 1%; text-shadow: 0px 1px 1px rgba(255,255,255,0.8);font-size: 45px; font-weight: 900;"><strong>We-Grow</strong></h1>


        <h1 style="color:darkslategrey;margin-left:4%;text-shadow: 0px 1px 1px rgba(255,255,255,0.8);font-size: 20px;  font-weight: bold;margin-bottom: 3%;">Sign Up - Users</h1>


      <div  class="form" style=" border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">


    		<form id="contactform" action="" method="post" enctype="multipart/form-data">
    			<p class="contact" style="font-family: 'Montserrat', sans-serif;"><label for="user_name">Name</label></p>    			<input id="user_name" name="user_name" placeholder="First and last name" required="required" tabindex="1" type="text" >

          <p class="contact"><label for="user_username" style="font-family: 'Montserrat', sans-serif;">Username</label></p>
          <input id="user_username" name="user_username" placeholder="create a username" required="required" tabindex="2" type="text">

    			<p class="contact"><label for="user_email">Email</label></p>
    			<input id="user_email" name="user_email" placeholder="example@domain.com" required="required" type="email">

               

                <p class="contact"><label for="user_password" style="font-family: 'Montserrat', sans-serif;">Password</label></p>
    			<input type="password" id="user_password" name="user_password" required="required" placeholder="create a password">

          <p class="contact"><label for="conf_user_password" style="font-family: 'Montserrat', sans-serif;">Confirm password</label></p>
          <input type="password" id="conf_user_password" name="conf_user_password" required="required" placeholder="confirm password">
               
          <p class="contact"><label for="user_phone">Mobile phone</label></p>
            <input id="user_phone" name="user_phone" placeholder="phone number" required="required" type="text"> 
 <p class="contact"><label for="user_s_ques">Security question</label></p>

   <select class="form-select"  aria-label="Default select example" id="user_s_ques" name="user_s_ques" required style="width: 400px; background-color:rgba(255, 255, 255, 0.4); color:grey; border:0.1px solid silver; font-size:smaller;">

            <option value="" selected disabled>Select security question</option>
        <option value="In what city were you born?">In which city were you born?</option>
<option value="Your first car?">Your first car?</option>
<option value="Your favourite food?">Your favourite food?</option>
<option value="How many people are there in your family?">How many people are there in your family?</option>
<option value="What is your mother's name?">What is your mother's name?</option>


      </select>
        <p class="contact " style="margin-top:10px"><label for="user_s_ans">Security question answer</label></p>
            <input id="user_s_ans" name="user_s_ans" placeholder="Answer the above question" required="required" type="text"> 


          <input class="button " name="user_register" id="user_submit" tabindex="5" value="Register!" type="submit" style="margin-left: 0px; padding: 10px; border: solid white 0.2px; background-color:#5CAFBF; color:white; font-weight:normal; margin-top:3%">
                <p style="color:grey"><small><small>Already have an account? <a href="user_login.php" style="color:black;"><small>Login</a></small></small></p>

    </div>


    

   </form>
</div>
</div>
</div>

</body>
</html>


<?php

 function getIPAddress() {  
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

 if(isset($_POST['user_register'])){
  $user_name=$_POST['user_name'];
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $conf_user_password=$_POST['conf_user_password'];
  $user_phone=$_POST['user_phone'];
   $user_s_ques=$_POST['user_s_ques'];
    $user_s_ans=$_POST['user_s_ans'];
  $user_ip=getIPAddress();
$hash_user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
$user_reg_date=date('Y-m-d');
#checking if username or email already exists
  $select_query="Select * from `users` where user_username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  if($row_count>0){
    echo "<script>alert('Username or email already exists')</script>";
  }

  else if($user_password!=$conf_user_password){
    echo "<script>alert('Passwords do not match')</script>";
  }
  else{
  #insert query
  $insert_user_query="insert into `users` (user_name,user_username,user_email,user_password,user_phone,user_s_ques,user_s_ans,user_ip,user_reg_date) values ('$user_name','$user_username','$user_email','$hash_user_password','$user_phone', '$user_s_ques', '$user_s_ans','$user_ip','$user_reg_date')";

  if ($insert_user_query) {
    $_SESSION['user_username'] = $user_username;
}

  $user_result_query=mysqli_query($con,$insert_user_query);
}
   if($user_result_query){
     echo "<script>alert('Registration Successful')</script>";
    echo "<script>window.open('home.php','_self')</script>";
   }
  // else{
  //   die(mysqli_error($con));
  // }

 }

?>