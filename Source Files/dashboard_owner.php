<?php 
session_start();
include 'includes/db.php';


   if(!isset($_SESSION['owner_username'])){
        // include('user_login.php');
    header("location:owner_login.php ");
        }else{
        
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WE-GROW DASHBOARD</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" style="color:#74BDCB;">
            <nav class="navbar bg-light navbar-light" style="color:#74BDCB;">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h3 style="color:#74BDCB; margin-left:0.5% ;" class="ml-2 text-center">WE GROW</h3>
                </a>
                
                 <?php 

                if(isset($_GET['owner_uname'])){

                  $owner_uname=$_GET['owner_uname'];
                  $select_query="select shopname from `owners` where owner_username='$owner_uname' ";
                  $result_query=mysqli_query($con,$select_query);
                while($row1=mysqli_fetch_assoc($result_query)){
                    $shopname1=$row1['shopname'];
                
                  $select_query_shop="select * from `ip` where shopname='$shopname1' ";
                  $result_query_shop=mysqli_query($con,$select_query_shop);
                  $count=mysqli_num_rows($result_query_shop);
                  if($count==0){
                   echo " <div class='navbar-nav w-100 mt-3' style='color:#74BDCB;'>
                    <a href='pricing.php' class='nav-item nav-link active' style='color:#74BDCB;'><i class='fa fa-tachometer-alt me-2' style='color:#74BDCB;'></i>Create Your Page</a>
                </div>";
                  }
                  else{
                  while($row=mysqli_fetch_assoc($result_query_shop)){
                    $shopname=$row['shopname'];
                  
                    
              
                  ?>
                 
                
               <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="display.php?shopname=<?php echo "$shopname" ?>" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-tachometer-alt me-2" style="color:#74BDCB;"></i>View Site</a>
                </div>
                 <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="ip_form_update.php?shopname=<?php echo "$shopname" ?>" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-pencil-alt me-2" style="color:#74BDCB;"></i>Update Site</a>
                </div>
                 <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="delete_shop.php?shopname=<?php echo "$shopname" ?>&owner_uname=<?php echo "$owner_uname" ?>" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-trash-alt me-2" style="color:#74BDCB;"></i>Delete Site</a>
                </div>
<?php
}}}}
?>
  <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="#analytics" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-tachometer-alt me-2" style="color:#74BDCB;"></i>Analytics</a>
                </div>
                <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="#recent_apl" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-window-restore me-2" style="color:#74BDCB;"></i>Applications</a>
                </div>
                  <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="#ct" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-calendar-week me-2" style="color:#74BDCB;"></i>Queries</a>
                </div>
                  <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="#ct" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-list me-2" style="color:#74BDCB;"></i>To-Do</a>
                </div>

            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
                        <nav class="navbar navbar-expand  sticky-top px-4 py-0"  data-bs-theme="dark" style="background-color:#5CAFBF; ">
                <a href="#" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               <a class="navbar-brand " href="#" style=" font-weight:bold; font-size: 1.6rem; color:white; margin-left:2%;">We <span style="color:#EFE7BC">Grow</span></a>
                <div class="navbar-nav align-items-center ms-auto">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="color:#EFE7BC">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php" style="color:#EFE7BC">All Stores</a>
        </li>
        <?php 

                if(isset($_GET['owner_uname'])){

                  $owner_uname=$_GET['owner_uname'];
                  $select_query="select shopname from `owners` where owner_username='$owner_uname' ";
                  $result_query=mysqli_query($con,$select_query);
                while($row1=mysqli_fetch_assoc($result_query)){
                    $shopname1=$row1['shopname'];
                
                  $select_query_shop="select * from `ip` where shopname='$shopname1' ";
                  $result_query_shop=mysqli_query($con,$select_query_shop);
                  $count=mysqli_num_rows($result_query_shop);
                  if($count==0){
                   echo " <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='pricing.php?owner_uname=$owner_uname' style='color:#EFE7BC'>Create Page</a>
        </li>";
                  }
                  else{
                  while($row=mysqli_fetch_assoc($result_query_shop)){
                    $shopname=$row['shopname'];
                  
                    echo " <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='display.php?shopname=$shopname' style='color:#EFE7BC'>View Site</a>
        </li>";
              
              }}}}
                  ?>
       
    </ul>
                    
                   
                  
       
                
       
    
                    
                   
                   
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown" >
                             <i class="fa fa-user me-lg-2" style='color:#5CAFBF'></i>
                             <?php if (isset($_GET['owner_uname'])) {
                        // code...
                        $owner_uname=$_GET['owner_uname'];
                        
        echo "  <span class='d-none d-lg-inline-flex ' style='color:#EFE7BC'>$owner_uname </span>
      ";
                    }
                    ?>
                           
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" >
                            <a href="#" class="dropdown-item">My Profile</a>
                              <?php
  if(!isset($_SESSION['owner_username'])){
    echo "<a  href='owner_login.php' class='dropdown-item'>Register/Login</a>";
  }
  else{
     echo "<a  href='logout.php' class='dropdown-item'>Logout</a>";
  }
  ?>
                           
                        </div>
                    </div>
              
                </div>
            </nav>
            <!-- Navbar End -->

<style type="text/css">
    .card1{
background: #6190E8;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #A7BFE8, #6190E8);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #A7BFE8, #6190E8); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
      .card2{
background: #FFAFBD;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffc3a0, #FFAFBD);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffc3a0, #FFAFBD);
    }
      .card3{
background: #56ab2f;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #a8e063, #56ab2f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
      .card4{
background: #CAC531;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #F3F9A7, #CAC531);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #F3F9A7, #CAC531); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }
</style>
            
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">


                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 card1">
                            <i class="fa fa-star fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-white">Your Rating</p>
                                <?php
 if(isset($_GET['owner_uname'])){

                  $owner_uname_2=$_GET['owner_uname'];
                  $select_query_2="select shopname from `owners` where owner_username='$owner_uname_2' ";
                  $result_query_2=mysqli_query($con,$select_query_2);
                  while($row=mysqli_fetch_assoc($result_query_2)){
                      $shopname_2=$row['shopname'];

                  $select_query_shop_2="select * from `ip` where shopname='$shopname_2' ";
                  $result_query_shop_2=mysqli_query($con,$select_query_shop_2);
                   $count=mysqli_num_rows($result_query_shop_2);
                  if($count==0){
                   echo " <h6 class='mb-0 text-white'>-</h6><br>";
                  }
                  else{
                  while($row_2=mysqli_fetch_assoc($result_query_shop_2)){
                    $shopname_2=$row_2['shopname'];
  include 'includes/Rating_functions.php';
  $rating = new Rating();
  $itemDetails = $rating->getshop($shopname_2);
  // $shopList = $rating->getshopList();
  foreach($itemDetails as $item){
    $average = $rating->getRatingAverage($item["shopname"]);
  ?>  
 <h6 class="mb-0 text-white ">
  <span class="average"><?php printf('%.1f', $average); ?> / 5</span> </h6> <h6 class="rating-reviews text-white"><a class="text-white" href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">Reviews</a></h6>



  <?php 
} }}}}
  ?>  

                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 card2">
                            <i class="fa fa-search fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-white">Page Created On</p>
                                 <?php 
                                 if(isset($_GET['owner_uname'])){

                  $owner_uname_1=$_GET['owner_uname'];
                  $select_query_1="select shopname from `owners` where owner_username='$owner_uname_1' ";
                  $result_query_1=mysqli_query($con,$select_query_1);
                  
                  while($row=mysqli_fetch_assoc($result_query_1)){
                    $shopname=$row['shopname'];
                
                  $select_query_shop_1="select * from `ip` where shopname='$shopname' ";
                    $result_query_shop_1=mysqli_query($con,$select_query_shop_1);
                     $count=mysqli_num_rows($result_query_shop_1);
                  if($count==0){
                     echo " <h6 class='mb-0 text-white'>-</h6>";
                  }else{
                  while($row_1=mysqli_fetch_assoc($result_query_shop_1)){
                    $shopname_1=$row_1['shopname'];
                    $date_created=$row_1['date_created'];
                    echo " <h6 class='mb-0 text-white'>$date_created</h6>";
                  }}}}

                                ?>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 card3" >
                            <i class="fa fa-chart-area fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-white " style="width:17%">Today's Discount </p>

                                <?php 
                                 if(isset($_GET['owner_uname'])){

                  $owner_uname_1=$_GET['owner_uname'];
                  $select_query_1="select shopname from `owners` where owner_username='$owner_uname_1' ";
                  $result_query_1=mysqli_query($con,$select_query_1);
                 
                  while($row=mysqli_fetch_assoc($result_query_1)){
                    $shopname=$row['shopname'];
                 
                  $select_query_shop_1="select * from `ip` where shopname='$shopname' ";
                    $result_query_shop_1=mysqli_query($con,$select_query_shop_1);
                     $count=mysqli_num_rows($result_query_shop_1);
                  if($count==0){
                     echo " <h6 class='mb-0 text-white'>-</h6>";
                  }else{
                  while($row_1=mysqli_fetch_assoc($result_query_shop_1)){
                    $shopname_1=$row_1['shopname'];
                    $discount=$row_1['discount'];
                    echo " <h6 class='mb-0 text-white' style='overflow: hidden; text-overflow: ellipsis; width:10%; white-space:nowrap;' >$discount</h6>";
                  }}}}

                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 card4">
                            <i class="fa fa-heart fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-white">No. of Store Likes</p>
                                   <?php

if(isset($_GET['owner_uname'])){

                  $owner_uname_3=$_GET['owner_uname'];
                  $select_query_3="select * from `owners` where owner_username='$owner_uname_3' ";
                  $result_query_3=mysqli_query($con,$select_query_3);
                 $count=mysqli_num_rows($result_query_3);
                  if($count==0){
                     echo " <h6 class='mb-0 text-white'>-</h6>";
                  }else{
                   while($row_3=mysqli_fetch_assoc($result_query_3)){
                    $shopname_3=$row_3['shopname'];
                   $select_query_shop_3="select * from `likes` where shopname='$shopname_3' ";
                   $result_query_shop_3=mysqli_query($con,$select_query_shop_3);
                  $rowcount_1 = mysqli_num_rows( $result_query_shop_3);
                  echo " <h6 class='mb-0 text-white'>$rowcount_1</h6>";
}}}
?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          


            
            <div class="container-fluid pt-4 px-4" id="analytics">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Your Average Rating Month Wise</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="averageRating" style="color:#74BDCB;"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">No. of visitors</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="approach"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        


            <div class="container-fluid pt-4 px-4" id="recent_apl">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Applications</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    
                                    <th scope="col">Sno.</th>
                                    <th scope="col">Date Applied</th>
                                      <th scope="col">Name</th>
                                   
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php

if(isset($_GET['owner_uname'])){

                  $owner_uname_4=$_GET['owner_uname'];
                  $select_query_4="select * from `owners` where owner_username='$owner_uname_4' ";
                  $result_query_4=mysqli_query($con,$select_query_4);
                 
                   while($row_4=mysqli_fetch_assoc($result_query_4)){
                    $shopname_4=$row_4['shopname'];
                  


                   $select_query_shop_4="select * from `apl_form` where shopname='$shopname_4' ";
                   $result_query_shop_4=mysqli_query($con,$select_query_shop_4);
                    $count_4=mysqli_num_rows($result_query_shop_4);
                    $i=1;
                    if($count_4==0){
                      echo "<p>No applications for review.</p>";
                    }else{
                 while($row_5=mysqli_fetch_assoc($result_query_shop_4)){

                    $shopname_5=$row_5['shopname'];
                    $apl_username=$row_5['apl_username'];
                    $apl_name=$row_5['apl_name'];
                    $apl_phone=$row_5['apl_phone'];
                    $apl_gender=$row_5['apl_gender'];
                    $apl_age=$row_5['apl_age'];
                    $apl_education=$row_5['apl_education'];
                    $apl_address=$row_5['apl_address'];
                    $apl_verification_id=$row_5['apl_verification_id'];
                    $apl_skills=$row_5['apl_skills'];
                    $apl_exp=$row_5['apl_exp'];
                    $apl_info=$row_5['apl_info'];
                    $apl_date_submitted=$row_5['apl_date_submitted'];

                 

?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $apl_date_submitted; ?></td>
                                  <td><?php echo $apl_name; ?></td>
                                  <td><?php echo $apl_phone; ?></td>
                                  <td><?php echo $apl_gender; ?></td>
                                  <td><?php echo $apl_age; ?></td>
                                  <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $apl_phone; ?>">Detail</button></td>
                                </tr>
                                  <div class="modal fade" id="<?php echo $apl_phone; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Name: </strong><?php echo $apl_name; ?></p>
        <p><strong>Phone No.: </strong><?php echo $apl_phone; ?></p>
        <p><strong>Gender: </strong><?php echo $apl_gender; ?></p>
        <p><strong>Age: </strong><?php echo $apl_age; ?></p>
        <p><strong>Address: </strong><?php echo $apl_address; ?></p>
        <p><strong>Verification Id: </strong><?php echo $apl_verification_id; ?></p>
        <p><strong>Skills: </strong><?php echo $apl_skills; ?></p>
        <p><strong>Education: </strong><?php echo $apl_education; ?></p>
        <p><strong>Experience: </strong><?php echo $apl_exp; ?></p>
        <p><strong>Additional Information: </strong><?php echo $apl_info; ?></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <a href="delete_apl_entry.php?shopname=<?php echo $shopname_5; ?>&apl_name=<?php echo $apl_name; ?>"> <button type="button" class="btn btn-danger">Remove</button></a>
      </div>
    </div>
                                <?php }}}} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4" id="ct">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Queries</h6>
                                <a href="">Show All</a>
                            </div>
                             <?php
     $owner_uname_6=$_GET['owner_uname'];
                  $select_query_6="select * from `owners` where owner_username='$owner_uname_6' ";
                  $result_query_6=mysqli_query($con,$select_query_6);
                 
                   while($row_6=mysqli_fetch_assoc($result_query_6)){
                    $shopname_6=$row_6['shopname'];
    $select_ques_query="select * from `qna` where shopname='$shopname_6' and ans=''";
    $result_ques_query=mysqli_query($con,$select_ques_query) ;
    $count_qna=mysqli_num_rows($result_ques_query);
    if($count_qna==0){
        echo "<p>No questions to answer.</p>";
    }else{
    while($row_7=mysqli_fetch_assoc($result_ques_query)){
      $ques_id=$row_7['id'];
      $ques=$row_7['ques'];
      $date_posted=$row_7['date_posted'];
    
    ?>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?php echo $ques; ?>
                                         </h6>
                                        <small><?php echo $date_posted; ?></small>
                                    </div>
                                    <br>
                                    <span><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $ques_id; ?>">Answer</button></span>


                                </div>
                            </div>
                             
                                   <div class="modal fade" id="<?php echo $ques_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel1">Answer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <p><strong>Question: </strong><?php echo "$ques"; ?></p>
        <input type="hidden" name="ques_1" id="ques_1" value="<?php echo "$ques"; ?>">
        <label><strong>Answer:</strong></label>
        <textarea placeholder="Write your answer here..." name="ans" id="ans" class="w-100 mt-1"></textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="post_ans" id="post_ans" class="btn btn-success" value="post">
      </div>
 
  </form>
</div>
</div>
</div>


<?php }}}?>







                          
                        </div>
                    </div>
                    <?php 
                     if(isset($_GET['owner_uname'])){

                  $owner_uname_1=$_GET['owner_uname'];
 if(isset($_POST['post_ans'])){
  $ques_1=$_POST['ques_1'];
   $ans = $_POST['ans'];
    $update_ans_query=" update `qna` set ans='$ans' where ques='$ques_1' ";

                $result_ans_query = mysqli_query($con,$update_ans_query);

                if($result_ans_query)
                {
                      echo "<script>alert('Answer posted successfully');</script>";
                         echo "<script>window.open('dashboard.php?owner_uname=$owner_uname_1','_self')</script>";
                }
 }
}

?>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                                      <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>




<style type="text/css">
    input[type=checkbox]:checked + span.strikethrough{
  text-decoration: line-through;
}

</style>





                            <div id="myDIV" class="d-flex mb-2 header">
                                <input class="form-control bg-transparent" id="myInput" type="text" placeholder="Enter task">
                                <span type="button" onclick="newElement()" class="addBtn btn btn-primary ms-2">Add</span>
                            </div>
                            <style type="text/css">
                                .strikethrough{ margin-left: 4%; }
                                .a{
                                    margin-bottom: 4%;
                                }
                                .close{
                                    color: gray;
                                    font-weight: bold;
                                    float: right;
                                    font-size: 1.2rem;
                                }
                            </style>
                            <ul id="myUL" style="list-style-type: none; margin-top:5%;padding-left: 0;">
  <li class="a"><input type="checkbox" class="form-check-input m-0"/>
             <span class="strikethrough">Enter Short tasks here..</span></li>
  
            
</ul>


                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
<script type="text/javascript">
    
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByClassName("a");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item


// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");

  
  var input=document.createElement("INPUT");
  input.type="checkbox";
  input.className="form-check-input m-0";
 li.appendChild(input);
 
  var span1 = document.createElement("SPAN");
  
  var inputValue1 = document.getElementById("myInput").value;
  var txt1 = document.createTextNode(inputValue1);
  span1.className = "strikethrough";
  span1.appendChild(txt1);
  li.appendChild(span1);

 if (inputValue1 === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";


  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}

</script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/dashboard.js"></script>
</body>

</html>
<?php 
} ?>