<?php 
session_start();
include 'includes/db.php';

 if(!isset($_SESSION['apl_username'])){
        // include('user_login.php');
    header("location:apl_login.php ");
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
  
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

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
                <div class="navbar-nav w-100" style="color:#74BDCB;">
                    <a href="#analytics" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-tachometer-alt me-2" style="color:#74BDCB;"></i>Analytics</a>
                </div>
                <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="#recent_apl" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-window-restore me-2" style="color:#74BDCB;"></i>Applications</a>
                </div>
                  <div class="navbar-nav w-100 mt-3" style="color:#74BDCB;">
                    <a href="#ct" class="nav-item nav-link active" style="color:#74BDCB;"><i class="fa fa-calendar-week me-2" style="color:#74BDCB;"></i>Calendar</a>
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
                        <nav class="navbar navbar-expand  sticky-top px-4 py-0"  data-bs-theme="dark" style="background-color:#5CAFBF; color:white;">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               <a class="navbar-brand " href="#" style=" font-weight:bold; font-size: 1.6rem; color:white; margin-left:2%;">We <span style="color:#EFE7BC">Grow</span></a>
                <div class="navbar-nav align-items-center ms-auto">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="color:#EFE7BC">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php" style="color:#EFE7BC">All Stores</a>
        </li>
        <li class="nav-item">
         <?php if (isset($_GET['apl_user'])) {
                        // code...
                        $apl_user=$_GET['apl_user'];
                        
        echo "  <a class='nav-link ' style='color:#EFE7BC' href='hiring_main.php?apl_user=$apl_user'>Jobs</a>
      ";
                    
                    ?>
                    </li>
       
    </ul>
                    
                   
                   
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown">
                             <i class="fa fa-user me-lg-2 "style='color:#5CAFBF'></i>
                            
                            <span class="d-none d-lg-inline-flex " style='color:#EFE7BC'><?php echo "$apl_user"; ?> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                              <?php
  if(!isset($_SESSION['apl_username'])){
    echo "<a  href='apl_login.php' class='dropdown-item'>Register/Login</a>";
  }
  else{
     echo "<a  href='logout.php' class='dropdown-item' >Logout</a>";
  }
  ?>
                           
                        </div>
                    </div>
               <?php }?>
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
            
            <div class="container-fluid pt-4 px-4" >
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3 text-white" >
                        <div class=" rounded d-flex align-items-center justify-content-between p-4 card1" >
                            <i class="fa fa-search fa-3x "></i>
                            <div class="ms-3 ">
                                <p class="mb-2">No. of Jobs Applied</p>
                                 <?php 
  if(isset($_GET['apl_user'])){
    $apl_user_1=$_GET['apl_user'];
  
 $select_query="select * from `apl_form` where apl_username='$apl_user_1'";
  $result_query=mysqli_query($con,$select_query);
  $job_count=mysqli_num_rows($result_query);
}
  echo " <h6 class='mb-0 text-white'>$job_count </h6>";
     
  ?>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 text-white">
                        <div class=" rounded d-flex align-items-center justify-content-between p-4 card2">
                            <i class="fa fa-chart-area fa-3x "></i>
                            <div class="ms-3">
                                <p class="mb-2">Highest Salary Offered</p>
                                <?php 
  if(isset($_GET['apl_user'])){
    $apl_user_1=$_GET['apl_user'];
$select_query=" select max(ip.hiring_pay) as mhp from `apl_form` left join `ip` on apl_form.shopname=ip.shopname";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
$pay=$row['mhp'];
echo "<h6 class='mb-0 text-white'>$pay</h6>
";
}
}
?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 text-white">
                        <div class=" rounded d-flex align-items-center justify-content-between p-4 card3">
                            <i class="fa fa-calendar-week fa-3x "></i>
                            <div class="ms-3">
                                <p class="mb-2">Latest Applied Date </p>
                                <?php 
  if(isset($_GET['apl_user'])){
    $apl_user_1=$_GET['apl_user'];
  
 $select_query="select apl_date_submitted from `apl_form` where apl_username='$apl_user_1' order by apl_id desc limit 1";
  $result_query=mysqli_query($con,$select_query);
  $count=mysqli_num_rows($result_query);
    if ($count==0) {
        // code...
         echo "<h6 class='mb-0 text-white'>-</h6>";
    
  }else{
 while($row=mysqli_fetch_assoc($result_query)){
$last_apl_date=$row['apl_date_submitted'];
  echo "<h6 class='mb-0 text-white'>$last_apl_date</h6>";
}}     }
  ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 text-white">
                        <div class=" rounded d-flex align-items-center justify-content-between p-4 card4">
                            <i class="fa fa-window-restore fa-3x "></i>
                            <div class="ms-3">
                                <p class="mb-2">Previous Application</p>
                             <?php 
  if(isset($_GET['apl_user'])){
    $apl_user=$_GET['apl_user'];
   $select_query_1="select * from `apl_form` where apl_username='$apl_user' order by apl_id desc limit 1";
    $result_query_1=mysqli_query($con,$select_query_1);
    $count=mysqli_num_rows($result_query_1);
    if($count==0){
         echo "<h6 class='mb-0 text-white'>-</h6>";
    }else{
     while($row_2=mysqli_fetch_assoc($result_query_1)){
                  
              

                   $shopname_2=$row_2['shopname'];
                   $apl_username=$row_2['apl_username'];
                    $apl_name=$row_2['apl_name'];
                    $apl_phone=$row_2['apl_phone'];
                     $apl_gender=$row_2['apl_gender'];
                    $apl_age=$row_2['apl_age'];
                    $apl_education=$row_2['apl_education'];
                    $apl_address=$row_2['apl_address'];
                    $apl_verification_id=$row_2['apl_verification_id'];
                    $apl_skills=$row_2['apl_skills'];
                    $apl_exp=$row_2['apl_exp'];
                    $apl_info=$row_2['apl_info'];
    
    ?>
                            
                                <h6 class="mb-0 text-white" data-bs-toggle="modal" data-bs-target="#<?php echo $apl_phone; ?>">Click to view</h6>
                            </div>
                            <div class="modal fade" id="<?php echo $apl_phone; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-secondary text-center">
        <p><strong>Shop: </strong><?php echo $shopname_2; ?></p>
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

   

<?php    }}}    ?>
                        </div>
                    </div>
                    
                </div>
            </div>
          


            
            <div class="container-fluid pt-4 px-4" id="analytics">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Jobs Applied VS Got Accepted</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="averageRating"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">No. of Jobs Recommended</h6>
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
                                    <th scope="col">SNo.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Store/Service</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Age</th>
                                   <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php

if(isset($_GET['apl_user'])){

                  $apl_user_2=$_GET['apl_user'];
                  $select_query="select * from `apl_form` where apl_username='$apl_user_2'";
  $result_query=mysqli_query($con,$select_query);
                 $i=1;
                   while($row_5=mysqli_fetch_assoc($result_query)){
                  
              

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
                   $last_apl_date=$row_5['apl_date_submitted'];

                 

?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $last_apl_date; ?></td>
                                  <td><?php echo $apl_name; ?></td>
                                  <td><?php echo $shopname_5; ?></td>
                                 
                                  <td><?php echo $apl_phone; ?></td>
                                   <td><?php echo $apl_age; ?></td>
                                    <td><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $apl_phone; ?>">Detail</button></td>
                                </tr>
                                <div class="modal fade" id="<?php echo $apl_phone; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Shop Name: </strong><?php echo $shopname_5; ?></p>
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
                                <?php }} ?>
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
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="imgs/user2.jpeg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">User1</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Are you up for a job?</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="imgs/user2.jpeg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">User2</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Available?</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="imgs/user2.jpeg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">User3</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>okay</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
             <span class="strikethrough">Enter short tasks here..</span></li>
 
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