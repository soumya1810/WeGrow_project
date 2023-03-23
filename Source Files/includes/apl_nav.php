<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We Grow</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/display.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="css/chat.css">
    <!-- <link rel="stylesheet" href="css/chat1.css"> -->
  </head>
  <body>
    <style type="text/css">
      .nav-item{
        margin-right: 2%;
        color: #EFE7BC ;
      }
    </style>
    <nav class="navbar navbar-expand-lg " data-bs-theme="dark" style="background-color:#5CAFBF; color:white;">
  <div class="container-fluid">
    <a class="navbar-brand " href="#" style="font-weight:bold; font-size: 24px ;"><span class='fa' style="color:#EFE7BC ;"><i class='fa-solid fa-shop'></i> &nbsp;</span>We<span style="color:#EFE7BC ;"> Grow</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="margin-left:20px; float: right;"></ul>
        <li class="nav-item d-flex">
           <?php
           if(isset($_GET['apl_user'])){
  $apl_user=$_GET['apl_user'];
          echo "<a class='nav-link' aria-current='page' href='hiring_main.php?apl_user=$apl_user'><span class='fa'><i class='fa-solid fa-window-restore'></i> &nbsp;</span>All Jobs</a>";}?>
       
        <li class="nav-item d-flex">
          <a class="nav-link" href="home.php">All Stores</a>
        </li>
         <li class="nav-item d-flex">
          <?php
           if(isset($_GET['apl_user'])){
  $apl_user=$_GET['apl_user'];
          echo "<a class='nav-link' href='apl_dashboard.php?apl_user=$apl_user'>Dashboard</a>";}?>
        </li>
       
        
      

     
<li class="nav-item d-flex" style="margin-right:10px">
  <?php
  if(!isset($_SESSION['apl_username'])){
    echo "<a class='nav-link' href='apl_login.php'><span class='fa'><i class='fa-regular fa-user'></i> &nbsp;</span>Register/Login</a>";
  }
  else{
     echo "<a class='nav-link' href='logout.php'><span class='fa'><i class='fa-regular fa-user'></i> &nbsp;</span>Logout</a>";
  }
  ?>
          
        </li>

   </ul>
    </div>
  </div>
</nav>

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  -->
<script src="js/responses.js"></script>
<script src="js/chat.js"></script>
  </body>
  </html>