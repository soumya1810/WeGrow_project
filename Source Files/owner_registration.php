<?php include 'includes/db.php';
session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" type="text/css" href="css/display.css">
  </head>
  <body style="background-image: url('https://static.vecteezy.com/system/resources/previews/005/120/271/original/curve-half-round-blue-aquamarine-simple-background-free-vector.jpg'); background-size: 100% 100%;">
<section class="h-100 h-custom" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://media.licdn.com/dms/image/C5112AQF9eYr8Lp3KfA/article-cover_image-shrink_600_2000/0/1580463222595?e=2147483647&v=beta&t=8i7pDUJf3T69tRIbizRR-5kSQjeKFl6OQHVwq1GgaL0"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class=" px-md-2">Sign Up</h3>
            <p class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">For Retail Owners</p>

            <form class="px-md-2" action="" method="post" enctype="multipart/form-data">

              <div class="form-outline mb-4">
                <input type="text" id="owner_name" name="owner_name" required="required" class="form-control " placeholder="Name" />
                
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="owner_phone" name="owner_phone" required="required" class="form-control" placeholder="Phone" />
                
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                 <input type="text" id="owner_aadhar_id" name="owner_aadhar_id" required="required" class="form-control" placeholder=" Aadhar Id" />

                </div>
                <div class="col-md-6 mb-4">

                    <input type="text" id="shop_regno" name="shop_regno" required="required" class="form-control" placeholder="Retail Registration No." />

                </div>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="shopname" name="shopname" required="required" class="form-control" placeholder="Shop/Service Name" />
                
              </div>
              <div class="row">
                 <div class="col-md-6 mb-4">
                      <input type="text" id="owner_username" name="owner_username" required="required" class="form-control" placeholder="Username" />
                 </div>
                <div class="col-md-6 mb-4">
                <input type="email" id="owner_email" name="owner_email" required="required" class="form-control" placeholder="Email" />
                
              </div>
              </div>
                  <div class="row">
                <div class="col-md-6 mb-4">

                 <input type="password" id="owner_password" name="owner_password" required="required" class="form-control" placeholder="Password" />

                </div>
                <div class="col-md-6 mb-4">

                    <input type="password" id="conf_owner_password" name="conf_owner_password" required="required" class="form-control" placeholder="Confirm Password" />

                </div>
              </div>

              

              <input class="button text-white sc p-2 rounded-2" name="owner_register" id="owner_submit" tabindex="5" value="Register" type="submit" style="border-style: none;">
               <p style="font-size: smaller; margin-top:2%" >Already have an account? <a href="owner_login.php">Login</a></p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- name
phone
aadhar_id
regno
shopname
email
password
login -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php 
 function getIPAddress_owner() {  
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

 if(isset($_POST['owner_register'])){
  $owner_name=$_POST['owner_name'];
   $owner_phone=$_POST['owner_phone'];
    $owner_aadhar_id=$_POST['owner_aadhar_id'];
     $shop_regno=$_POST['shop_regno'];
      $shopname=$_POST['shopname'];
  $owner_username=$_POST['owner_username'];
  $owner_email=$_POST['owner_email'];
  $owner_password=$_POST['owner_password'];
  $conf_owner_password=$_POST['conf_owner_password'];
  $owner_ip=getIPAddress_owner();
$hash_owner_password = password_hash($owner_password, PASSWORD_BCRYPT, array('cost' => 12));
$owner_reg_date=date('Y-m-d');
#checking if ownername or email already exists
  $select_query="Select * from `owners` where owner_username='$owner_username' or owner_email='$owner_email'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  if($row_count>0){
    echo "<script>alert('username or email already exists')</script>";
  }

  else if($owner_password!=$conf_owner_password){
    echo "<script>alert('Passwords do not match')</script>";
  }
  else{
  #insert query
  $insert_owner_query="insert into `owners` (owner_name,owner_phone,owner_aadhar_id,shop_regno,shopname,owner_username,owner_email,owner_password,owner_ip,owner_reg_date) values ('$owner_name','$owner_phone', '$owner_aadhar_id', '$shop_regno', '$shopname', '$owner_username','$owner_email','$hash_owner_password','$owner_ip','$owner_reg_date')";
 $owner_result_query=mysqli_query($con,$insert_owner_query);
 
  if ($owner_result_query) {
     $insert_admin_query="insert into `admin` (`owner_username`,`owner_email`,`shopname`,`date_owner_created`) values ('$owner_username','$owner_email','$shopname','$owner_reg_date')";

      $admin_result=mysqli_query($con,$insert_admin_query);
      if($admin_result){
         $_SESSION['owner_username'] = $owner_username;

      }
      
       else{
    die(mysqli_error($con));
  }

   
} else{
    die(mysqli_error($con));
  }


 
}
   if($owner_result_query){
     echo "<script>alert('Registration Successful')</script>";
    echo "<script>window.open('owner_login.php','_self')</script>";
   }
  else{
    die(mysqli_error($con));
  }

 }

?>