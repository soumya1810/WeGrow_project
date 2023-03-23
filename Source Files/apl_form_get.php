<?php 
session_start();
include 'includes/db.php';


   if(!isset($_SESSION['apl_username'])){
        // include('user_login.php');
    header("location:apl_login.php ");
        }else{
        include 'includes/apl_nav.php';
        ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
      .card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
    </style>
  </head>

  <body style="background-color:#74BDCB">


<form method="post" action="" >
  
    <section class="h-100 " style="background-color:#E7F2F8">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block" style="background-color:#f9f6e5">
              <img src="https://static.vecteezy.com/system/resources/previews/000/427/824/original/vector-cog-wheel-tree.jpg"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; margin-top: 20%;" />
            </div>
           
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase" style="color:#00959c">Application form</h3>
                             <div class="form-outline mb-4">
                    <label class="form-label" for="shopname">Applying for</label>
                     <?php 
if(isset($_GET['shop'])){
     $shop=$_GET['shop'];

   echo "  <input type='text' id='shopname' name='shopname' class='form-control ' value='$shop' readonly/>";
 }
   
    ?>
                
                </div>
                 <div class="form-outline mb-4">
                   <!--  <label class="form-label" for="apl_username">Username</label> -->
                     <?php 
if(isset($_GET['apl_user'])){
     $apl_user=$_GET['apl_user'];

   echo "  <input type='hidden' id='apl_username' name='apl_username' class='form-control ' value='$apl_user' readonly/>";
 }
   
    ?>
    
                
                </div>

                 <?php
    if(isset($_GET['apl_user'])){

  $apl_userss=$_GET['apl_user'];
    $select_query="select * from `apl_form` where apl_username='$apl_userss' order by apl_id DESC LIMIT 1";
  $result_query=mysqli_query($con,$select_query);
while($rows=mysqli_fetch_assoc($result_query)){
// $apl_id=$_row['apl_id'];
//   $shopname=$_row['shopname'];
  $apl_name=$rows['apl_name'];
  $apl_phone=$rows['apl_phone'];
  $apl_gender=$rows['apl_gender'];
  $apl_age=$rows['apl_age'];
  $apl_address=$rows['apl_address'];
  $apl_city=$rows['apl_city'];
  $apl_state=$rows['apl_state'];
  $apl_verification_id=$rows['apl_verification_id'];
  $apl_skills=$rows['apl_skills'];
  $apl_education=$rows['apl_education'];
  $apl_exp=$rows['apl_exp'];
  $apl_info=$rows['apl_info'];

    ?>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="apl_name">Name</label>
                      <input type="text" id="apl_name" name="apl_name" class="form-control "   value="<?php echo "$apl_name"; ?>" />
                   
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                       <label class="form-label" for="apl_phone">Phone</label>
                      <input type="text" id="apl_phone" name="apl_phone" class="form-control " value="<?php echo "$apl_phone"; ?>"/>
                      
                    </div>
                  </div>
                </div>


        <div class="row">
            <div class="col-md-6 mb-4">
              <label for="apl_gender" class="form-label">Gender</label>
              
             <input type="text" class="form-control" id="apl_gender" name="apl_gender" value="<?php echo "$apl_gender"; ?>">
            </div>
            <div class="col-md-6 mb-4">
            <label for="apl_age" class="form-label">Age</label>
            <input type="text" class="form-control" id="apl_age" name="apl_age" value="<?php echo "$apl_age"; ?>">
          </div>
        
    </div>
     <div class="form-outline mb-4">
                    <label class="form-label" for="apl_address">Address</label>
                  <input type="text" id="apl_address" name="apl_address" class="form-control " value="<?php echo "$apl_address"; ?>"/>
                 
                </div>

                <div class="row">
           
                          <div class="col-md-6 mb-4">
            <label for="apl_city" class="form-label">City</label>
            <input type="text" class="form-control" id="apl_city" name="apl_city" value="<?php echo "$apl_city"; ?>">
          </div>
          <div class="col-md-6 mb-4">
            <label for="apl_state" class="form-label">State</label>
            <input type="text" class="form-control" id="apl_state" name="apl_state" value="<?php echo "$apl_state"; ?>">
          </div>
    </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="apl_verification_id">Verification Id</label>
                   <input type="text" id="apl_verification_id" name="apl_verification_id" class="form-control " value="<?php echo "$apl_verification_id"; ?>">
                  
                </div>

                <div class="form-outline mb-4">
                   <label class="form-label" for="apl_skills">Skills</label>
                  
                 <input type="text" id="apl_skills" name="apl_skills" class="form-control " value="<?php echo "$apl_skills"; ?>">
                </div>

                <div class="form-outline mb-4">
                   <label for="apl_education" class="form-label">Education</label>
              
              <input type="text" id="apl_education" name="apl_education" class="form-control " value="<?php echo "$apl_education"; ?>">
                  
                </div>

                <div class="form-outline mb-4">
                   <label class="form-label" for="apl_exp">Past Experience</label>
                  <input type="text" id="apl_exp" name="apl_exp" class="form-control " value="<?php echo "$apl_exp"; ?>">
                 
                </div>
                 <div class="form-outline mb-4">
                   <label class="form-label" for="apl_info">Additional Information</label>
                  <input type="text" id="apl_info" name="apl_info" class="form-control " value="<?php echo "$apl_info"; ?>">
                 
                </div>
<?php
}}
?>
                <div class="d-flex justify-content-end pt-3">
                  <button type="button" class="btn btn-light btn-lg">Save</button>
                  <button type="submit" class="btn btn-warning btn-lg ms-2" name="apl_form_submit">Submit form</button>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

<?php

 
 if(isset($_POST['apl_form_submit'])){
  $shopname=mysqli_real_escape_string($con,$_POST['shopname']);
   $apl_username=mysqli_real_escape_string($con,$_POST['apl_username']);
  $apl_name=mysqli_real_escape_string($con,$_POST['apl_name']);
  $apl_phone=mysqli_real_escape_string($con,$_POST['apl_phone']);
  $apl_gender=mysqli_real_escape_string($con,$_POST['apl_gender']);
  $apl_age=mysqli_real_escape_string($con,$_POST['apl_age']);
  $apl_address=mysqli_real_escape_string($con,$_POST['apl_address']);
  $apl_city=mysqli_real_escape_string($con,$_POST['apl_city']);
  $apl_state=mysqli_real_escape_string($con,$_POST['apl_state']);
  $apl_verification_id=mysqli_real_escape_string($con,$_POST['apl_verification_id']);
  $apl_skills=mysqli_real_escape_string($con,$_POST['apl_skills']);
  $apl_education=mysqli_real_escape_string($con,$_POST['apl_education']);
  $apl_exp=mysqli_real_escape_string($con,$_POST['apl_exp']);
  $apl_info=mysqli_real_escape_string($con,$_POST['apl_info']);
 
  
   
            
                $query = "insert into `apl_form` (shopname,apl_username,apl_name,apl_phone,apl_gender,apl_age,apl_address,apl_city,apl_state,apl_verification_id,apl_skills,apl_education,apl_exp,apl_info) values ('$shopname','$apl_username','$apl_name','$apl_phone','$apl_gender','$apl_age' ,'$apl_address' ,'$apl_city', '$apl_state','$apl_verification_id','$apl_skills', '$apl_education', '$apl_exp', '$apl_info')";
                $result = mysqli_query($con,$query);

                if($result)
                {
                 
                    echo "<script>alert('Thank You for applying. We'll get in touch with you within 7 days.')</script>";
                    echo "<script>window.open('hiring_main.php?apl_user=$apl_user','_self')</script>";
                }
                else
                {
                  die(mysqli_error($con));
                    //echo "<script>alert('Please Check your details again')</script>";
                }
            
        
      }
 

?>
<?php } ?>