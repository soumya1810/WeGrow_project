<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
      rel="stylesheet"
    />
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body onload="getLocation()">
    <!-- Example Code -->
    <script type="text/javascript">
  function getLocation(){
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(showPosition);
    }
  }
  function showPosition(position){
    document.getElementById("lats").value=+position.coords.latitude;
    document.getElementById("longs").value=+position.coords.longitude;
  }
</script>

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

            <?php

   function getIPAdd() {  
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
       
      
        if(isset($_GET['liked_shop'])){

          $get_ip=getIPAdd();
         
          $select_query="Select * from `likes` where ip_address='$get_ip'"; 

             $result_query=mysqli_query($con,$select_query);
             $count_likes=mysqli_num_rows($result_query);
            }
             else{
              $get_ip=getIPAdd();
         
          $select_query="Select * from `likes` where ip_address='$get_ip'"; 

             $result_query=mysqli_query($con,$select_query);
             $count_likes=mysqli_num_rows($result_query);
             }
             echo " <li class='nav-item'>
              <a class='nav-link' href='wishlist.php' style='color:#EFE7BC'>Favourites ($count_likes)</a>
            </li> ";
             
        
        ?>
             
            <li class="nav-item">
           <span class="nav-link">   <form action="home.php" method="POST">
<input type="hidden" name="lats" id="lats">
<input type="hidden" name="longs" id="longs">

<input type="submit" name="subm" id="subm" class="button" value="Nearby Stores" style="background-color:transparent; border-style:none; color:#EFE7BC;"></input>
<?php if(isset($_POST['subm'])){

  $l1=$_POST['lats'];
  $l2=$_POST['longs'];
  header("Location: store_locator.php?lat=$l1&long=$l2");
}
?>
</form>
</span>
            </li>
          
          </ul>
         
          <ul class="navbar-nav d-flex mr-5">



   <?php
                           
 if( (!isset($_SESSION['user_username'])) && (!isset($_SESSION['owner_username'])) && (!isset($_SESSION['apl_username']))){
    echo " 
            <li class='nav-item dropdown' >
              <a
                class='nav-link dropdown-toggle'
                href='#'
                role='button'
                data-bs-toggle='dropdown'
                aria-expanded='false'
             style='color:#EFE7BC' >
                Register/SignIn
              </a>


          
             <ul class='dropdown-menu'>
                <li><a class='dropdown-item' href='user_login.php'>User</a></li>
                  <li><a class='dropdown-item' href='owner_login.php'>Retailer</a></li>
                    <li><a class='dropdown-item' href='apl_login.php'>Applicant</a></li>
               
              </ul>
            </li>";
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

    <!-- End Example Code -->
  </body>
</html>
