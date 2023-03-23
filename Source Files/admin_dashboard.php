<?php 
include 'includes/db.php';    
        ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
      .card{
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        border-style: none;
      }
      html,
body,
/*.intro {
  height: 100%;
}*/

.row{
  margin-bottom: 10%;
}
table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

thead th {
  color: #fff;
}



.table-scroll {
  border-radius: .35rem;
}

.table-scroll table thead th {
  font-size: 1.25rem;
}
thead {
  top: 0;
  position: sticky;
}
.card-title{
  color: #74BDCB;
}
.fa-shop , .fa-user, .fa-desktop{
   color: white;
}
.card3{
 background: #4AC29A;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #BDFFF3, #4AC29A);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #BDFFF3, #4AC29A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
.card2{
  background: #6190E8;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #A7BFE8, #6190E8);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #A7BFE8, #6190E8); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
.card1{
  background: #FFAFBD;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffc3a0, #FFAFBD);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffc3a0, #FFAFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

    </style>
      <nav class="navbar navbar-expand-lg " style="background-color:#5CAFBF" >
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#"><strong style="font-size:1.5rem">We <span style="color:#EFE7BC">Grow</span></strong></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 " >
           
            <li class="nav-item">
              <a class="nav-link" href="home.php" style="color:#EFE7BC">All Stores</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="pricing.php" style="color:#EFE7BC">Pricing</a>
            </li>




          </ul>

          <ul class="navbar-nav d-flex mr-5">



   <?php
                           
 if( (!isset($_SESSION['user_username'])) && (!isset($_SESSION['owner_username'])) && (!isset($_SESSION['apl_username']))){
    echo "<li class='nav-item'>
              <a class='nav-link' href='admin_login.php' style='color:#EFE7BC'>Login</a>
            </li> 
           ";
  }



  else{
     echo " <li class='nav-item'>
              <a class='nav-link' href='logout.php' style='color:#EFE7BC'>Logout</a>
            </li>";
  }
  ?>



          </ul>
        </div>
      </div>
    </nav>
  </head>

  <body class="bg-light">
      <?php
function send_actv_link($owner_email){
  include 'includes/db.php'; 
if(isset($_POST['actv_link']))
{
  
    $check_email_query="Select owner_email from `owners` where owner_email='$owner_email'";
  $check_email_result=mysqli_query($con,$check_email_query);
  // $email_check_query
  // $check_email = mysqli_query($con,"select email from tbl_student where email='$email'");
  $res = mysqli_num_rows($check_email_result);
  if($res>0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     <p>Welcome to WeGrow.</p>
     <p>Your verfication has been completed. Kindly click the activation link given below and login to activate your account.</p>
     <br>
     <p><a href="http://localhost/ip_front_copy_copy/owner_login.php">Click to Activate Account.</a></p>
     <br>
     <p>If you did not request an account activation, no further action is required.</p><br><br>
     <p>Regards, </p>
     <p>Team WeGrow</p>
    </div>';

include_once("SMTP/src/PHPMailer.php");
include_once("SMTP/src/SMTP.php");
$email = $owner_email; 
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
$mail->Subject = "Account Activation";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  // $msg = "We have e-mailed the retailer the account activation link!";
  echo "<script>alert('We have e-mailed the retailer the account activation link!')</script>";
   echo "<script>window.open('delete_apl_entry.php?owner_email=$owner_email','_self')</script>";
}
}
else
{
  // $msg = "We can't find a user with that email address";
  echo "<script>alert('We can't find a user with that email address')</script>";
}
}
}
?>
    <?php

    $select_users="select * from `users`";
    $result_users=mysqli_query($con,$select_users);
    $count_users=mysqli_num_rows($result_users);

    $select_retailers="select * from `owners`";
    $result_retailers=mysqli_query($con,$select_retailers);
    $count_retailers=mysqli_num_rows($result_retailers);

    $select_applicants="select * from `applicant_register`";
    $result_applicants=mysqli_query($con,$select_applicants);
    $count_applicants=mysqli_num_rows($result_applicants);
   

    ?>
    <div class="container my-5">
      <div class="row ">
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card card1" >
      <div class="card-body">

        <h5 class="card-title text-white mb-3">Number of Retailers</h5>
        <div class="row">
          <div class="col-md-8">
        <p class="card-text text-white" style="font-size:2.4rem " ><strong><?php echo "$count_retailers"; ?></strong></p>
       </div>
       <div class="col-md-4">

        <h5 class="text-center text-secondary mt-2" style="font-size:2.4rem "><strong><span class="fa"><i class="fa-solid fa-shop"></i> &nbsp;</span></strong></h5>
       </div>
     </div>
      </div>
    </div>
  </div>
    <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card card2" >
      <div class="card-body">

        <h5 class="card-title text-white mb-3">Number of Users</h5>
        <div class="row">
          <div class="col-md-8">
        <p class="card-text text-white" style="font-size:2.4rem " ><strong><?php echo "$count_users"; ?></strong></p>
       </div>
       <div class="col-md-4">

        <h5 class="text-center text-secondary mt-2" style="font-size:2.4rem "><strong><span class="fa"><i class="fa-solid fa-user"></i> &nbsp;</span></strong></h5>
       </div>
     </div>
      </div>
    </div>
  </div>
    <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card card3" >
      <div class="card-body">

        <h5 class="card-title mb-3 text-white">Number of Job Applicants</h5>
        <div class="row">
          <div class="col-md-8">
        <p class="card-text text-white" style="font-size:2.4rem " ><strong><?php echo "$count_applicants"; ?></strong></p>
       </div>
       <div class="col-md-4">

        <h5 class="text-center text-secondary mt-2" style="font-size:2.4rem "><strong><span class="fa"><i class="fa-solid fa-desktop"></i> &nbsp;</span></strong></h5>
       </div>
     </div>
      </div>
    </div>
  </div>

<section class="intro bg-white mt-5">
  <br>
  <p class="mt-2 mx-3"><strong><span class="fa"><i class="fa-solid fa-clipboard"></i> &nbsp;</span>Pending Applicantions</strong></p>
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-12 px-0">
            <div class="card mx-3">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                  <table class="table table-striped mb-0">
                    <thead style="background-color: #74BDCB;">
                      <tr>
                        <th scope="col">SNo.</th>
                        <th scope="col">Retailer Name</th>
                         <th scope="col">Email</th>
                        <th scope="col">Shop Name</th>
                        <th scope="col" class="text-center">Activation Link</th>  
                      </tr>
                    </thead>
                    <tbody>
                        <?php

$select_query="select * from `admin` ";
 $result_query=mysqli_query($con,$select_query);
    $i=1;
while($row=mysqli_fetch_assoc($result_query)){

 
  $owner_username=$row['owner_username'];
  $owner_email=$row['owner_email'];
  $shopname=$row['shopname'];
  
    ?>
                      <tr>
                        <td><?php echo $i++ ;?></td>
                      
                           <td><?php echo "$owner_username";?></td>
                        <td><?php echo "$owner_email";?></td>
                        <td><?php echo "$shopname";?></td>
                        <form method="post" action="">
                        <td class="text-center"> <input type="submit" class="btn btn-success" value="send" name="actv_link"></td>
                      </form>
                    
                      </tr>
                       <?php } ?>
                         <?php send_actv_link($owner_email); ?>
                       </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
       
 
  </div>
</section>
  <section class="intro bg-white mt-5">
  <br>
  <p class="mt-2 mx-3"><strong><span class="fa"><i class="fa-solid fa-clipboard"></i> &nbsp;</span>FeedBack</strong></p>
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-12 px-0">
            <div class="card mx-3">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                 
                 
                     
                    
    <table class="table table-striped mb-0">
  <thead style="background-color: #74BDCB;">
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Name</th>
      <th scope="col">Phone number</th>
      <th scope="col">Posted On</th>
      <th scope="col">Feedback</th>
      
    


    </tr>
  </thead>
    <tbody>
    <?php 
    $select_query="select * from feedback";
    $result_query=mysqli_query($con,$select_query);
    $count_query=mysqli_num_rows($result_query);
    $i=1;
    if($count_query==0){
      echo "<p>No feedback posted yet.</p>";
    }else{
      while($row=mysqli_fetch_assoc($result_query)){
        $name=$row['name'];
        $phone=$row['phone'];
        $feed_date=$row['feed_date'];
        $feed_input=$row['feed_input'];


     ?>
     <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $name; ?></td>
      <td><?php echo $phone; ?></td>
       <td><?php echo $feed_date; ?></td>
        <td><?php echo $feed_input; ?></td>

      
      

    </tr>
  <?php }} ?>
</tbody>
</table>
  
             </div>
              </div>
            </div>
          </div>
       
 
  </div>
</section>
    </div>
  
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>