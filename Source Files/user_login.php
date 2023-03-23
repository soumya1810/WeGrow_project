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
  <div class="container pb-0" style="width:50%; height: 2%">
      <div class="item-container">
          <h2 class="log-in text-center"> We-Grow</h2>
      </div>
   
      <div class="item-container text-center">
          <p>Login for Users</p>
      </div>
      <form class="p-4 pb-0" action="" method="post">
          <div class="form-input">
              <label for="user_username" class="label" >&ensp;Username</label>
             
              <input type="text" id="user_username" style="width: 95%; height: 30%;" required="required" name="user_username">
          </div>
        <br>
          <div class="form-input">
              <label for="user_password" class="label">&ensp;Password</label>
             
              <input type="password" name="user_password" id="user_password" required="required" style="width: 95%;" >
          </div>
       <br>
           
              <input type="submit" class="btn" style="font-size: large; font-weight: 700; background-color: #FFA384; color: white; border-color: white;" value="Login" name="user_login">
          
          <div class="display-space-between mb-0">
              <p style="font-size:75%">New user? &nbsp;<a href="user_registration.php">Register here</a></p>    
              </div>
              <div class="display-space-between mt-0">
            <p style="font-size:75%">Forget Password? &nbsp;<a type="button" class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Click here</a></p> 
          </div>
        
         
          <br>
      </form>

  </div>

  <!-- Button trigger modal -->


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
       <label for="user_username_fp" class="label" >&ensp;Username</label>
              <br>
              <input type="text" id="user_username_fp" style="width: 95%;" required="required" name="user_username_fp">
                <br>
                  <br>
        <p class="contact"><label for="user_s_ques">security question</label></p>

   <select class="form-select"  aria-label="Default select example" id="user_s_ques" name="user_s_ques" required style="width: 400px;">

            <option value="" selected disabled>Select security question</option>
        <option value="In what city were you born?">In what city were you born?</option>
<option value="Your first car?">Your first car?</option>
<option value="Your favourite food?">Your favourite food?</option>
<option value="How many people are there in your family?">How many people are there in your family?</option>
<option value="What is your mother's name?">What is your mother's name?</option>


      </select>
        <br>
        <p class="contact " style="margin-top:10px"><label for="user_s_ans">Security question answer</label></p>
        
            <input id="user_s_ans" name="user_s_ans"  required="required" type="text"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn " style="background-color: #FFA384;" value="submit" name="user_fp">
      </div>
    </form>
    </div>
  </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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

 if(isset($_POST['user_login'])){
  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];
 
 

  $select_query="Select * from `users` where user_username='$user_username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  $user_ip=getIPAddress();



$select_query_shop="Select * from `likes` where ip_address='$user_ip'";  
$select_shop=mysqli_query($con,$select_query_shop
);
$row_count_shop=mysqli_num_rows($select_shop);
  if($row_count>0){
     $_SESSION['user_username'] = $row_data['user_username'];
    if(password_verify($user_password, $row_data['user_password'])){
      // $_SESSION['user_username'] = $row_data['user_username'];
      if($row_count==1 and $row_count_shop==0){
         $_SESSION['user_username'] = $row_data['user_username'];
    echo "<script>alert('Wishlist is empty')</script>";
    echo "<script>window.open('home.php','_self')</script>";
  }else{
     $_SESSION['user_username'] = $row_data['user_username'];
    // echo "<script>alert('Login Successful')</script>";
    echo "<script>window.open('home.php','_self')</script>";
  }

    }else{
      echo "<script>alert('Invalid Credentials')</script>";
  }

  }
  else{
 
     echo "<script>alert('Invalid Credentials')</script>";
 
   }

 } else if (isset($_POST['user_fp'])) {
    $user_username_fp=$_POST['user_username_fp'];
  $user_s_ans=$_POST['user_s_ans'];
  $select_query_fp="Select * from `users` where user_username='$user_username_fp'";
  $result_fp=mysqli_query($con,$select_query_fp);
  
  $row_data_fp=mysqli_fetch_assoc($result_fp);
  if($user_s_ans==$row_data_fp['user_s_ans']){
    echo "<script>window.open('user_forget_password.php','_self')</script>";
   
 }
 else{
  die(mysqli_error($con));
   // echo "<script>alert('Invalid Credentials. Try Again')</script>";
   //   echo "<script>window.open('user_login.php','_self')</script>";
 }
  }
?>