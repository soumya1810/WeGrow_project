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
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="apl_name">Name</label>
                      <input type="text" id="apl_name" name="apl_name" class="form-control "    required />
                   
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                       <label class="form-label" for="apl_phone">Phone</label>
                      <input type="text" id="apl_phone" name="apl_phone" class="form-control " required />
                      
                    </div>
                  </div>
                </div>


        <div class="row">
            <div class="col-md-6 mb-4">
              <label for="apl_gender" class="form-label">Gender</label>
              
              <select id="apl_gender" name="apl_gender" class="form-select" required>
                <option selected disabled>Select Gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                <option value="Others">Others</option>
              </select>
            </div>
            <div class="col-md-6 mb-4">
            <label for="apl_age" class="form-label">Age</label>
            <input type="text" class="form-control" id="apl_age" name="apl_age" required>
          </div>
        
    </div>
     <div class="form-outline mb-4">
                    <label class="form-label" for="apl_address">Address</label>
                  <input type="text" id="apl_address" name="apl_address" class="form-control " required />
                 
                </div>

                <div class="row">
           
                          <div class="col-md-6 mb-4">
            <label for="apl_city" class="form-label">City</label>
            <input type="text" class="form-control" id="apl_city" name="apl_city">
          </div>
          <div class="col-md-6 mb-4">
            <label for="apl_state" class="form-label">State</label>
            <select id="apl_state" name="apl_state" class="form-select" required>
              <option selected disabled>Select State</option>
              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
              <option value="Andhra Pradesh">Andhra Pradesh</option>
              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
              <option value="Assam">Assam</option>
              <option value="Bihar">Bihar</option>
              <option value="Chandigarh">Chandigarh</option>
              <option value="Chhattisgarh">Chhattisgarh</option>
              <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
              <option value="Daman and Diu">Daman and Diu</option>
              <option value="Delhi">Delhi</option>
              <option value="Goa">Goa</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Haryana">Haryana</option>
              <option value="Himachal Pradesh">Himachal Pradesh</option>
              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
              <option value="Jharkhand">Jharkhand</option>
              <option value="Karnataka">Karnataka</option>
              <option value="Kerala">Kerala</option>
              <option value="Lakshadweep">Lakshadweep</option>
              <option value="Madhya Pradesh">Madhya Pradesh</option>
              <option value="Maharashtra">Maharashtra</option>
              <option value="Manipur">Manipur</option>
              <option value="Meghalaya">Meghalaya</option>
              <option value="Mizoram">Mizoram</option>
              <option value="Nagaland">Nagaland</option>
              <option value="Orissa">Orissa</option>
              <option value="Pondicherry">Pondicherry</option>
              <option value="Punjab">Punjab</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="Sikkim">Sikkim</option>
              <option value="Tamil Nadu">Tamil Nadu</option>
              <option value="Tripura">Tripura</option>
              <option value="Uttaranchal">Uttaranchal</option>
              <option value="Uttar Pradesh">Uttar Pradesh</option>
              <option value="West Bengal">West Bengal</option>
            </select>
          </div>
    </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="apl_verification_id">Verification Id</label>
                   <input type="file" id="apl_verification_id" name="apl_verification_id" class="form-control " required >
                  
                </div>

                <div class="form-outline mb-4">
                   <label class="form-label" for="apl_skills">Skills</label>
                  <textarea class="form-control" id="apl_skills" name="apl_skills" rows="2" ></textarea>
                 
                </div>

                <div class="form-outline mb-4">
                   <label for="apl_education" class="form-label">Education</label>
              
              <select id="apl_education" name="apl_education" class="form-select" required>
                <option selected disabled>Select Educational qualification</option>
                <option value="No formal Education">No formal education</option>
                <option value="Priamry Education(class 1-5)">Priamry Education(class 1-5)</option>
                <option value="Secondary Education(class 10th pass)">Secondary Education(class 10th pass)</option>
                <option value="Higher Secondary Education(class 12th pass)">Higher Secondary Education(class 12th pass)</option>
                <option value="Grduation">Graduation</option>
                <option value="Post Graduation">Post Graduation</option>
              </select>
                  
                </div>

                <div class="form-outline mb-4">
                   <label class="form-label" for="apl_exp">Past Experience</label>
                  <textarea class="form-control" id="apl_exp" name="apl_exp" rows="2" ></textarea>
                 
                </div>
                 <div class="form-outline mb-4">
                   <label class="form-label" for="apl_info">Additional Information</label>
                  <textarea class="form-control" id="apl_info" name="apl_info" rows="2" ></textarea>
                 
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <?php
                  if(isset($_GET['shop'])){
                    if(isset($_GET['apl_user'])){
                      $shop=$_GET['shop'];
                      $apl_user=$_GET['apl_user'];
              echo " <a href='apl_form_get.php?shop=$shop&apl_user=$apl_user'>  <button type='button' class='btn btn-light btn-lg'>Use previous application</button></a>";
             }}
             ?>
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

 if(isset($_GET['shop'])){
  if(isset($_GET['apl_user'])){
     $shop=$_GET['shop'];
     $apl_user=$_GET['apl_user'];
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
  $apl_date_submitted=date('Y-m-d');
 
  
      
     

        
        
            
                $query = "insert into `apl_form` (shopname,apl_username,apl_name,apl_phone,apl_gender,apl_age,apl_address,apl_city,apl_state,apl_verification_id,apl_skills,apl_education,apl_exp,apl_info,apl_date_submitted) values ('$shopname','$apl_username','$apl_name','$apl_phone','$apl_gender','$apl_age' ,'$apl_address' ,'$apl_city', '$apl_state','$apl_verification_id','$apl_skills', '$apl_education', '$apl_exp', '$apl_info', '$apl_date_submitted')";
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
 
}}
?>
<?php } ?>