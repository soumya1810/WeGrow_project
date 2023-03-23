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
    <nav class="navbar navbar-expand-lg " data-bs-theme="dark" style="background-color:#74BDCB; color:white;">
  <div class="container-fluid">
    <a class="navbar-brand " href="#" style="font-weight:bold; font-size: 24px ;">WeGrow</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="margin-left:20px">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php">All Stores</a>
        </li>
        <li class="nav-item dropdown " style="margin-right: 20px;">
          <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu text-light" data-bs-theme="light">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            
          </ul>
        </li>
<form class="d-flex" role="search"> 
         <input class=" me-2 search px-3 border-0" type="search" placeholder="Search" aria-label="Search" style="width: 400px; border-radius: 5px;">
        <button class="btn  text-light " type="button" style="background-color:#3e96a8">Search</button> </form>
           <li class="nav-item dropdown" style="margin-left:15px">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Location
          </a>
          <ul class="dropdown-menu" data-bs-theme="light">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            
          </ul>
        </li>
      </ul>

      
<li class="nav-item d-flex" style="margin-right:10px">
  <?php
  if(!isset($_SESSION['user_username']) && !isset($_SESSION['apl_username'])){
    echo "<a class='nav-link' href='user_login.php''>Register/Login</a>";
  }
  else{
     echo "<a class='nav-link' href='logout.php''>Logout</a>";
  }
  ?>
          
        </li>

   
    </div>
  </div>
</nav>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="js/responses.js"></script>
<script src="js/chat.js"></script>
  </body>
  </html>