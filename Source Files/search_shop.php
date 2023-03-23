<?php 
session_start();
include 'includes/db.php';

        ?>



<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">



<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/blue.css">
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/owl.transitions.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/rateit.css">
<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Icons/Glyphs -->
<link rel="stylesheet" href="assets/css/font-awesome.css">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home" onload="getLocation()">
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
<!-- ============================================== HEADER ============================================== -->
<style type="text/css">
  .top-bar .cnt-account ul > li a {
  color:#EFE7BC;
</style>
<header class="header-style-1" > 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown" style="background-color:#5CAFBF">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled" >
<li class="What's New"><a href="#"><span>Home</span></a></li>
<?php if(isset($_SESSION['owner_username'])){
$owner_uname=$_SESSION['owner_username'];

?>
<li class="What's New"><a href="dashboard_owner.php?owner_uname=<?php echo"$owner_uname"; ?>"><span>Dashboard</span></a></li>
<?php
}else if(isset($_SESSION['apl_username'])){
  $apl_user=$_SESSION['apl_username'];

?>
<li class="What's New"><a href="apl_dashboard.php?apl_user=<?php echo"$apl_user"; ?>"><span>Dashboard</span></a></li>
<?php } ?>
            <li class="What's New"><a href="Pricing.php"><span>Pricing</span></a></li>
          <li class="What's New"><span>   <form action="home.php" method="POST">
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
</span></li>
           
            <?php
                           
 if( (!isset($_SESSION['user_username'])) && (!isset($_SESSION['owner_username'])) && (!isset($_SESSION['apl_username']))){
    echo "<li class='dropdown dropdown-small' style=' width:80px'> <a href='#' class='dropdown-toggle' data-hover='dropdown' data-toggle='dropdown' id='dropdownMenu1'>Signin <span class='caret'></span></a>


          
               <ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1' style='background-color:white; border-style:none;  width:160px'>
                <li ><a href='user_login.php' style='color:black !important; border-style: none;'>User</a></li>
                <br>
                <li ><a href='owner_login.php' style='color:black !important; border-style: none;' >Retailer</a></li>
                <br>
                <li ><a href='apl_login.php' style='color:black !important; border-style: none;' > Job Seeker</a></li>
               
              </ul>
            </li>";
  }



  else{
     echo "<a class='nav-link' href='logout.php' style='color:#EFE7BC'>Logout</a>";
  }
  ?>
            
            <!-- <li class="check"><a href="#"><span>Register</span></a></li> -->
            <!-- <li class="login dropdown dropdown-small"><a href="shop_owner_login.html"><span>Login</span></a></li> -->
                          
             
          </ul>
        </div>
        <!-- /.cnt-account -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
           
          <!--  <li class="What's New"><span></span></li> -->

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
             echo " 
            <li class='Contact' ><a href='wishlist.php'><span style='color:#EFE7BC;'>Favourites ($count_likes)</span></a></li>";
             
        
        ?>
          

             <li class="dropdown dropdown-small lang" > <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" ><span class="value" style="color:#EFE7BC">Locations </span><b class="caret" style="color:#EFE7BC"></b></a>
              <ul class="dropdown-menu" style="height:200px; overflow:auto;">
                   <?php 

               $select_state="select * from `state`";
               $result_state=mysqli_query($con,$select_state);
               while($row_data=mysqli_fetch_assoc($result_state)){
                $state_name=$row_data['state_name'];
                $state_id=$row_data['state_id'];
                echo " <li role='presentation'><a role='menuitem' tabindex='-1' href='home.php?state=$state_name'> $state_name</a></li>";
               }

              ?>
                <!-- <li><a href="#">English</a></li>
                <li><a href="#">Hindi</a></li> -->
               
              </ul>
            </li>
          </ul>

          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-Shop -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
    <style type="text/css">
                  @media (max-width: 767px){
                  .main-header .top-search-holder .search-area .search-field{
                    width: 100%;
                  }
                }
                 @media (min-width: 767px){
                  .main-header .top-search-holder .search-area .search-field{
                    width: 20%;
                  }
                }
                .main-header .top-search-holder .search-area .search-field:focus{
    outline: none;
}
                </style>
  <div class="main-header" style="background-color:#5CAFBF; padding:20px 0px 15px 0px;">
    <div class="container">
     
      <div class="row">

          <!-- /.logo --> 
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 logo-holder " style="margin:0px">
           <div style="align-content:left;"><h3 style="font-size:3.5vw; font-weight:bold; color:white; margin: 0px;">We <span style="color:#EFE7BC">Grow</span></h3>
            <p style="font-style: italic; color:#EFE7BC ;">Digitalizing India</p></div>
       </div>
          <!-- ============================================================= LOGO : END ============================================================= --> 
        <!-- /.logo-holder -->
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 top-search-holder" > 

          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area" style="margin:0px">
            <form action="search_shop.php" method="get">
              <div class="control-group">
                <ul class="categories-filter animate-dropdown " >
                  <li class="dropdown "> <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
                    <style type="text/css">
                      .d1{
                        height: 200px;
                        overflow: auto;
                      }
                    </style>
                    <ul class="dropdown-menu d1" role="menu" >
                      <li class="menu-header">Stores</li>
                       <?php 

               $select_category="select * from `categories`";
               $result_category=mysqli_query($con,$select_category);
               while($row_data=mysqli_fetch_assoc($result_category)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo " <li role='presentation'><a role='menuitem' tabindex='-1' href='home.php?category=$category_title'>- $category_title</a></li>";
               }

              ?>
                     

                    </ul>
                  </li>
                </ul>
              
                
                <input class="search-field" placeholder="Search here..." name="search_data">
               <!--  <a class="search-button" href="#" ></a> --> 
              <input type="submit" value="Search" class="search-button" style="border-style: none;margin-top: 0px; background-color: #EFE7BC; color:#5CAFBF; font-weight: bolder; font-size: 1.5vw; background-color: transparent; padding: 2.8%; " name="search_data_shop">
              </div>
            </form>
             
          </div>
            
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        <div style="margin-top: 1%;">
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 top-search-holder"  > 
          <i class='icon fa fa-heart-o ' style='font-size:2vw; color:#EFE7BC; padding: 10px; background-color:#398493; border-radius:10px; margin-left:100%; margin-top:3%'></i> 
        
        </div>
         <?php

   function getIPAddss() {  
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

          $get_ip=getIPAddss();
         
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
             echo " 
            
           <div class='col-lg-1 col-md-1 col-sm-1 col-xs-1' ><a href='wishlist.php'> <p style='color:#EFE7BC;margin-left:40%;margin-top:6%; font-weight:500'>Favourites<br> ($count_likes)</p></a></div>";
             
        
        ?>
       <!-- <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12" ><p style="color:#EFE7BC;margin-left:40%;margin-top:6%">Favourites<br> abc</p></div> -->
     </div>
          <!-- ============================================================= LOGO ============================================================= -->
         <!--  <div class="logo " style="margin-top:17%; margin-bottom:0%"> <a href="home.php"> <img src="assets/images/logo3.png" alt="logo"> </a> </div> -->
        
        
          <!-- ============================================================= SHOPPING Shop DROPDOWN ============================================================= -->
          
          <!-- ============================================================= SHOPPING Shop DROPDOWN : END============================================================= --> </div>
        <!-- /.top-Shop-row --> 

        </div>
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown" style="background-color:#5CAFBF;border-radius: 0px;">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown"> <a href="home.php">Home</a> </li>
              <li class="dropdown mega-menu"> 
                <a href="home.php"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Daily Needs  </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                            <h2 class="title">Includes</h2>
                            <ul class="links">
                               <li style="color:grey; margin-bottom: 3%;">RO service</li>
                              <li style="color:grey; margin-bottom: 3%;">Electronic shops</li>
                              <li style="color:grey; margin-bottom: 3%;">Repair Shops</li>
                              <li style="color:grey; margin-bottom: 3%;">Cleaning Serivices</li>
                              <li style="color:grey; margin-bottom: 3%;">Laundary</li>
                               <li style="color:grey; margin-bottom: 3%;">Plants and gardening</li>
                                <li style="color:grey; margin-bottom: 3%;">Other Daily need shops</li>
                              
                            </ul>
                          </div>
                          <!-- /.col -->
                          
                          
                          
                         
                         
                          <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="https://thumbor.forbes.com/thumbor/fit-in/900x510/https://www.forbes.com/home-improvement/wp-content/uploads/2022/07/featured-image-hire-an-electrician.jpeg.jpg"></a> </div>
                        </div>
                        <!-- /.row --> 
                      </div>
                      <!-- /.yamm-content --> </li>
                  </ul>
                </li>
                  <li class="dropdown mega-menu"> 
                <a href="home.php"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Restaurants and Cafes 

                <!--   <span class="menu-label hot-menu hidden-xs">hot</span>  -->
                </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                            <h2 class="title">Includes</h2>
                            <ul class="links text-light">
                              <li style="color:grey; margin-bottom: 3%;">Restaurants</li>
                              <li style="color:grey; margin-bottom: 3%;">Cafes</li>
                              <li style="color:grey; margin-bottom: 3%;">Dhabas</li>
                              <li style="color:grey; margin-bottom: 3%;">Tiffin Services</li>
                              <li style="color:grey; margin-bottom: 3%;">Food Corners</li>
                               <li style="color:grey; margin-bottom: 3%;">Street Food</li>
                                <li style="color:grey; margin-bottom: 3%;">Other Eateries</li>
                              
                            </ul>
                          </div>
                          <!-- /.col -->
                          
                          
                          
                         
                         
                          <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="assets/images/banners/top-menu-banner1.jpg" style="width:360%"></a> </div>
                        </div>
                        <!-- /.row --> 
                      </div>
                      <!-- /.yamm-content --> </li>
                  </ul>
                </li>
              
                <li class="dropdown yamm mega-menu"> <a href="home.php" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">More</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">More Stores</h2>
                            <ul class="links">
                                 <?php 

               $select_category="select * from `categories`";
               $result_category=mysqli_query($con,$select_category);
               while($row_data=mysqli_fetch_assoc($result_category)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo "<li> <a href='home.php?category=$category_title' >$category_title</a>  </li>";
               }

              ?>
              
                              
                           
                            </ul>
                          </div>
                          <!-- /.col -->
                             <div class="col-xs-12 col-sm-12 col-md-3 col-menu custom-banner img-responsive" > <a href="#"><img alt="" src="https://th.bing.com/th/id/R.c90fed825a91188f6929603fe0f20e40?rik=fZ9ggGlt9YF4uw&riu=http%3a%2f%2fwww.acurryofalife.com%2fwp-content%2fuploads%2f2011%2f09%2f0001jW2-1080x675.jpeg&ehk=6s%2bKc1My0dn3tZ7viWTz2%2bY1Vvk5RUFuDdxkZ9NbKug%3d&risl=&pid=ImgRaw&r=0" style="width:360%"></a> </div>
                       
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                  </ul>
                </li>
                <li class="dropdown  navbar-right special-menu"> <a href="#">Need Help ?</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
             
              <!-- /.menu-item -->
              <?php 

               $select_category="select * from `categories`";
               $result_category=mysqli_query($con,$select_category);
               while($row_data=mysqli_fetch_assoc($result_category)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo "<li '> <a href='home.php?category=$category_title' ><i class='icon fa fa-star-o' aria-hidden='true'></i>$category_title</a>  </li>";
               }

              ?>
              
              
              <!-- /.menu-item -->
              
         
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 

                  
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
      
       
        <!-- ============================================== New shops ============================================== -->
       <div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title d-sm-inline display-4">New Stores <br> and Services</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

             <?php 
                 
                  $select_query="select * from `ip` order by id desc limit 3";
                  $result_query=mysqli_query($con,$select_query);
                  while($row=mysqli_fetch_assoc($result_query)){
                    $id=$row['id'];
                    $shopname=$row['shopname'];
                    $city=$row['city'];
                    $state=$row['state'];
                    $intro_file=$row['intro_file'];
                   
                    $domain=$row['domain'];

                    echo " <div class='item'>
              <div class='products'>
                <div class='hot-deal-wrapper'>
                  <div class='image'> 
                  <a href='#'>
                  <img src='intro_images/$intro_file' alt='> 
                  <img src='intro_images/$intro_file' alt=' class='hover-image'>
                  </a>
                  </div>
                  
                  <div class='timing-wrapper'>
                    
                    
                  </div>
                </div>
                
                
                <div class='product-info text-left m-t-20'>
                  <h3 class='name'><a href='display.php?shopname=$shopname'>$shopname</a></h3>
                  
                 
                 

                 
                  
                </div>
               
                
                <div class='Shop clearfix animate-effect'>
                  <div class='action'>
                    <div class='add-Shop-button btn-group'>
                      
                    <a href='display.php?shopname=$shopname'>  <button class='btn btn-primary Shop-btn' type='button'>KNOW MORE</button></a>
                    </div>
                  </div>
                
                </div>
               
              </div>
            </div>
         ";
                  
                }
                  ?>
           
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter outer-bottom-small">
          <h3 class="section-title">Suggestions and Queries</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p class="font-italic">You can give you valuable suggesstions or put put your queries here or call +91 9560090683 for assistance.</p>
  
            <form action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name.." style="margin-bottom: 5%">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number.." style="margin-bottom: 5%">
                <input type="text" class="form-control" id="feed_input" name="feed_input" placeholder="Write here..">
              </div>
          
              <input type="submit" name="feed_submit" id="feed_submit" class="btn btn-info btn-sm " value="Submit" style="background-color: #74BDCB;">
            </form>
                      <?php
            if(isset($_POST['feed_submit'])){
              $name=$_POST['name'];
              $phone=$_POST['phone'];
              $feed_input=$_POST['feed_input'];
               $feed_date=date('Y-m-d');
              
              
               $query = "insert into `feedback` (name,phone,feed_input,feed_date) values ('$name','$phone','$feed_input','$feed_date')";
                $result = mysqli_query($con,$query);
 
                if($result){
                  $msg="Your query/suggestion posted successfully.";
                  echo "  <p><small> $msg</small></p>";
                }
              else{
                 $msg="Unable to post your query/suggestion. Please try again later.";
                 echo "<p><small> $msg</small></p>";
              }
            } 
            ?>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
      
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            <div class="item" style="background-image: url('https://wallpaperboat.com/wp-content/uploads/2020/11/10/60057/shopping-07-920x518.jpg');">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">We - Grow Stores and Services</div>
                  <div class="big-text fadeInDown-1"> FIND HERE </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>Just one click to get more information</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="home.php" class="btn-lg btn btn-uppercase btn-primary shop-now-button">KNOW MORE</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
            
            <div class="item" style="background-image: url(https://i.pinimg.com/originals/53/96/06/539606359f00b3f0f9d2f206787ac594.jpg);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1"> FIND</div>
                  <div class="big-text fadeInDown-1"> EVERYTHING, EVERYDAY</div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>Avail Services now</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="home.php" class="btn-lg btn btn-uppercase btn-primary shop-now-button" style="background-color:#f9b0a9">KNOW MORE</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        

        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">All Stores</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
             <!--  <li class="active"><a data-transition-type="" href="#all" data-toggle="tab">All</a></li> -->


<?php 
          if(isset($_GET['category'])){

            $category_name=$_GET['category'];
            $select_query="select * from `ip` where domain='$category_name' limit 0,1";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            
            while($row=mysqli_fetch_assoc($result_query)){
             
              $domain=$row['domain'];
              echo " <li><a data-transition-type='backSlide' href='home.php?category=$domain' data-toggle='tab'>$domain</a></li>";
            }
          }
           else if(isset($_GET['state'])){

            $state_name=$_GET['state'];
            $select_query="select * from `ip` where state='$state_name' limit 0,1";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){

              echo "<li><a  href='home.php' >All Stores/Services</a></li>";
            }else{
           
            while($row=mysqli_fetch_assoc($result_query)){
             
              $state=$row['state'];
              echo " <li><a data-transition-type='backSlide' href='home.php?state=$state' data-toggle='tab'>$state</a></li>";
            }
          }
       }

          
          else if(!isset($_GET['category']) && !isset($_GET['state'])){
            echo" <li class='active'><a data-transition-type='' href='home.php' data-toggle='tab'>All Stores</a></li>";
          }
          ?>


 










              
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                <!--   item start -->

                <?php 

                if(!isset($_GET['category']) && !isset($_GET['state']) && !isset($_GET['search_data_shop'])){


                  $select_query="select * from `ip` order by rand() ";
                  $result_query=mysqli_query($con,$select_query);
                 
                  while($row=mysqli_fetch_assoc($result_query)){
                    $id=$row['id'];
                    $shopname=$row['shopname'];
                    $city=$row['city'];
                    $state=$row['state'];
                    $intro_file=$row['intro_file'];
                   
                    $domain=$row['domain'];





$select_query_one="select * from `likes` where shopname='$shopname'";
  $result_query_one=mysqli_query($con,$select_query_one);
$rowcount = mysqli_num_rows( $result_query_one);
   

      echo "<div class='item item-carousel'>
      <div class='products'>
        <div class='product' style='border-color: lightgrey; border-width: 0.5px; border-style: solid; '>
          <div style='padding: 10px;'>
          <div class='product-image'>
            <div class='image'> 
            <a href='display.php?shopname=$shopname'>
               <img src='intro_images/$intro_file' > 
               
            </a> 

         </div>
        
          </div>

          <div class='product-info '>
            <h3 class='name'><a href='display.php?shopname=$shopname'>$shopname</a></h3>
            
            <div class='description'></div>
            
          <p style='width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>   $city,  $state </p>
         
            <a href='display.php?shopname=$shopname'><button type='button' class='btn btn-info btn-sm ' >Know More</button></a>
            
          </div>
        </div>
          <a data-toggle='tooltip' class='add-to-Shop' href='home.php?liked_shop=$shopname' title='Wishlist'> <i class='icon fa fa-heart lnk wishlist' style='margin-left:5%; margin-bottom:10%'></i> </a>
          <span style='color: #737373; font-weight:650;'>$rowcount Likes</span>
      </div>

    </div>
    </div>";
    
  }}
  ?>
<?php 
             if(isset($_GET['search_data_shop'])){
                  $search_data_value=$_GET['search_data'];
                  $search_query="select * from `ip` where shopname='$search_data_value' ";
                  $result_query=mysqli_query($con,$search_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
              echo "<p style='style:font-style:italic;'>No stores/services with this name</p>";
            }else{
            while($row=mysqli_fetch_assoc($result_query)){
              $id=$row['id'];
              $shopname=$row['shopname'];
              $city=$row['city'];
              $state=$row['state'];
              $intro_file=$row['intro_file'];
            
              $domain=$row['domain'];
              $select_query_one="select * from `likes` where shopname='$shopname'";
  $result_query_one=mysqli_query($con,$select_query_one);
$rowcount = mysqli_num_rows( $result_query_one);

              echo "<div class='item item-carousel'>
              <div class='products'>
                <div class='product' style='border-color: lightgrey; border-width: 0.5px; border-style: solid; '>
                  <div style='padding: 10px;'>
                  <div class='product-image'>
                    <div class='image'> 
                    <a href='###########'>
                       <img src='intro_images/$intro_file' > 
                      
                    </a> 
                 </div>
                  
                  </div>

                  <div class='product-info text-left'>
                    <h3 class='name'><a href='display.php?shopname=$shopname'>$shopname</a></h3>
                    
                    <div class='description'></div>
                    
                  <p>   $city,  $state </p>
                 
                    <a href='display.php?shopname=$shopname'><button type='button' class='btn btn-info btn-sm ' >Know More</button></a>
                    
                  </div>
                </div>
                  <a data-toggle='tooltip' class='add-to-Shop' href='home.php?liked_shop=$shopname' title='Wishlist'> <i class='icon fa fa-heart lnk wishlist' style='margin-left:5%; margin-bottom:10%'></i> </a>
          <span style='color: #737373; font-weight:650;'>$rowcount Likes</span>
              </div>

            </div>
            </div>";
            }
          }
        }
            ?>
<?php 
          if(isset($_GET['category'])){

            $category_name=$_GET['category'];
            $select_query="select * from `ip` where domain='$category_name'";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
              echo "<p style='style:font-style:italic;'>No stores/services for this category</p>";
            }else{
            while($row=mysqli_fetch_assoc($result_query)){
              $id=$row['id'];
              $shopname=$row['shopname'];
              $city=$row['city'];
              $state=$row['state'];
              $intro_file=$row['intro_file'];
            
              $domain=$row['domain'];
              $select_query_one="select * from `likes` where shopname='$shopname'";
  $result_query_one=mysqli_query($con,$select_query_one);
$rowcount = mysqli_num_rows( $result_query_one);

              echo "<div class='item item-carousel'>
              <div class='products'>
                <div class='product' style='border-color: lightgrey; border-width: 0.5px; border-style: solid; '>
                  <div style='padding: 10px;'>
                  <div class='product-image'>
                    <div class='image'> 
                    <a href='###########'>
                       <img src='intro_images/$intro_file' > 
                      
                    </a> 
                 </div>
                  
                  </div>

                  <div class='product-info text-left'>
                    <h3 class='name'><a href='display.php?shopname=$shopname'>$shopname</a></h3>
                    
                    <div class='description'></div>
                    
                  <p>   $city,  $state </p>
                 
                    <a href='display.php?shopname=$shopname'><button type='button' class='btn btn-info btn-sm ' >Know More</button></a>
                    
                  </div>
                </div>
                  <a data-toggle='tooltip' class='add-to-Shop' href='home.php?liked_shop=$shopname' title='Wishlist'> <i class='icon fa fa-heart lnk wishlist' style='margin-left:5%; margin-bottom:10%'></i> </a>
          <span style='color: #737373; font-weight:650;'>$rowcount Likes</span>
              </div>

            </div>
            </div>";
            }
          }
        }
            ?>

            <?php 
          if(isset($_GET['state'])){

            $state_name=$_GET['state'];
            $select_query="select * from `ip` where state='$state_name'";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows==0){
              echo "<p style='style:font-style:italic;'>No stores/services in this location.</p>";
            }else{
            while($row=mysqli_fetch_assoc($result_query)){
              $id=$row['id'];
              $shopname=$row['shopname'];
              $city=$row['city'];
              $state=$row['state'];
              $intro_file=$row['intro_file'];
            
              $domain=$row['domain'];
              $select_query_one="select * from `likes` where shopname='$shopname'";
  $result_query_one=mysqli_query($con,$select_query_one);
$rowcount = mysqli_num_rows( $result_query_one);

              echo "<div class='item item-carousel'>
              <div class='products'>
                <div class='product' style='border-color: lightgrey; border-width: 0.5px; border-style: solid; '>
                  <div style='padding: 10px;'>
                  <div class='product-image'>
                    <div class='image'> 
                    <a href='###########'>
                       <img src='intro_images/$intro_file' > 
                      
                    </a> 
                 </div>
                  
                  </div>

                  <div class='product-info text-left'>
                    <h3 class='name'><a href='display.php?shopname=$shopname'>$shopname</a></h3>
                    
                    <div class='description'></div>
                    
                  <p>   $city,  $state </p>
                 
                    <a href='display.php?shopname=$shopname'><button type='button' class='btn btn-info btn-sm ' >Know More</button></a>
                    
                  </div>
                </div>
                  <a data-toggle='tooltip' class='add-to-Shop' href='home.php?liked_shop=$shopname' title='Wishlist'> <i class='icon fa fa-heart lnk wishlist' style='margin-left:5%; margin-bottom:10%'></i> </a>
          <span style='color: #737373; font-weight:650;'>$rowcount Likes</span>
              </div>

            </div>
            </div>";
            }
          }
        }
            ?>

                 
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            
            
            <!-- /.tab-pane --> 
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners outer-bottom-xs">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt="" > </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            
            <div class="col-md-4 col-sm-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner3.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            
            <!-- /.col -->
            <div class="col-md-4 col-sm-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product">
        <div class="row">
        <div class="col-lg-3">
          <h3 class="section-title"> POPULAR CATEGORIES</h3>
          <ul class="sub-cat">
          
          <?php 

               $select_category="select * from `categories` limit 0,7";
               $result_category=mysqli_query($con,$select_category);
               while($row_data=mysqli_fetch_assoc($result_category)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo "<li style='text-transform: uppercase;'><a href='home.php?category=$category_title'>$category_title</a></li>";
               }

              ?>
          </ul>
          </div>
          <div class="col-lg-9">
          <div class="owl-carousel homepage-owl-carousel custom-carousel owl-theme outer-top-xs">
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> 
                          <a href="http://localhost/ip_front_copy_copy/home.php?category=General%20Store">
                             <img src="https://media.istockphoto.com/id/1213508609/photo/woman-shopping-at-grocery-store.jpg?s=612x612&w=0&k=20&c=L0W0Eh1tD9JxnB05ksQFZkaMXkZ6glMhqiaOYEueTTM=" alt=""> 
                              <img src="https://i.pinimg.com/originals/8e/58/f0/8e58f08771706f35b26aeed7d22552fd.png" class="hover-image" >
                              
                          </a>
                          
                          </div>
               
                  </div>
                  <div class="product-info text-left">
                    <h3 class="name"><a href="http://localhost/ip_front_copy_copy/home.php?category=General%20Store">General Stores</a></h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.item -->
                        <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> 
                          <a href="http://localhost/ip_front_copy_copy/home.php?category=Electronic%20Store">
                             <img src="https://english.cdn.zeenews.com/sites/default/files/2022/01/27/1009314-untitled-design-7.jpg" alt=""> 
                              <img src="https://www.kenresearch.com/blog/wp-content/uploads/2015/10/India-Electronics-Online-Sales.bmp" alt="" class="hover-image">
                          </a>
                          
                          </div>
               
                  </div>
                  <div class="product-info text-left">
                    <h3 class="name"><a href="http://localhost/ip_front_copy_copy/home.php?category=Electronic%20Store">Electronic Stores</a></h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.item -->
                        <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> 
                          <a href="http://localhost/ip_front_copy_copy/home.php?category=Tuition%20and%20Coaching">
                             <img src="https://assets.grooveapps.com/images/eeeed9a1-a080-4b7d-acbb-f35c2c516319/1636077016_HomeTuitionBangalore.jpg" alt=""> 
                              <img src="https://thechennaituition.com/wp-content/uploads/2020/10/ICSE-class-9-768x480-1.jpg" alt="" class="hover-image">
                          </a>
                          
                          </div>
               
                  </div>
                  <div class="product-info text-left">
                    <h3 class="name"><a href="http://localhost/ip_front_copy_copy/home.php?category=Tuition%20and%20Coaching">Tuition and Coaching</a></h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.item -->
                        <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> 
                          <a href="http://localhost/ip_front_copy_copy/home.php?category=Home%20Services">
                             <img src="https://apekshahomeservice.com/wp-content/uploads/2021/01/HOMESERVICES.jpg" alt=""> 
                              <img src="https://securecdn.pymnts.com/wp-content/uploads/2019/07/home-services-investments.jpg" alt="" class="hover-image">
                              
                          </a>
                          
                          </div>
               
                  </div>
                  <div class="product-info text-left">
                    <h3 class="name"><a href="http://localhost/ip_front_copy_copy/home.php?category=Home%20Services">Home Services</a></h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.item -->
                        <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> 
                          <a href="http://localhost/ip_front_copy_copy/home.php?category=Restaurants%20and%20cafes">
                             <img src="https://cdn.tasteatlas.com//images/toplistarticles/d0e6a0a79d5f4197a51f4ca065393ffe.jpg?w=375&h=280" alt=""> 
                              <img src="https://hicaps.com.ph/wp-content/uploads/2021/12/cafe-vs-restaurant.jpg" alt="" class="hover-image">
                          </a>
                          
                          </div>
               
                  </div>
                  <div class="product-info text-left">
                    <h3 class="name"><a href="http://localhost/ip_front_copy_copy/home.php?category=Restaurants%20and%20cafes">Restaurants and Cafes</a></h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.item -->
            
          </div>
          
          </div>
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners outer-bottom-xs">
          <div class="row">
            <div class="col-md-8">
              <div class="wide-banner1 cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner.jpg" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">Amazing Shops Near you<br>
                      
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            <div class="col-md-4">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="https://www.nobroker.in/blog/wp-content/uploads/2022/01/Vastu-for-shop.jpg" alt=""> </div>
                
                
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        
        
        
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== SHOPS FOR RENT ============================================== -->
        <section class="section new-arriavls">
          <h3 class="section-title">NEW SHOPS </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
             <?php 
                  
                  $select_query="select * from `ip` order by id desc limit 6";
                  $result_query=mysqli_query($con,$select_query);
                  while($row=mysqli_fetch_assoc($result_query)){
                    $id=$row['id'];
                    $shopname=$row['shopname'];
                    $city=$row['city'];
                    $state=$row['state'];
                    $intro_file=$row['intro_file'];
                   
                    $domain=$row['domain'];
$select_query_one="select * from `likes` where shopname='$shopname'";
  $result_query_one=mysqli_query($con,$select_query_one);
$rowcount = mysqli_num_rows( $result_query_one);
                    echo"  <div class='item item-carousel'>
              <div class='products'>
                <div class='product' style='border-color: lightgrey; border-width: 0.5px; border-style: solid; '>
                 <div style='padding: 10px;'>
                  <div class='product-image'>
                    <div class='image'> 
                          <a href='display.php?shopname=$shopname'>
                             <img src='intro_images/$intro_file' alt=''> 
                             
                          </a>
                          
                          </div>
                   
                    
                    <div class='tag new'><span>New</span></div>
                  </div>
                 
                  
                  <div class='product-info '>
                    <h3 class='name' ><a href='display.php?shopname=$shopname'>$shopname</a></h3>
                    
                    <div class='description' ></div>
                     <p style='width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>   $city,  $state </p>
                    
                 
                  <a href='display.php?shopname=$shopname'><button type='button' class='btn btn-info btn-sm ' >Know More</button></a>
            
          </div>
        </div>
          <a data-toggle='tooltip' class='add-to-Shop' href='home.php?liked_shop=$shopname' title='Wishlist'> <i class='icon fa fa-heart lnk wishlist' style='margin-left:5%; margin-bottom:10%'></i> </a>
          <span style='color: #737373; font-weight:650;'>$rowcount Likes</span>
                  
                  
                </div>
                
              </div>
            </div>";
           
                  }
                  

                  ?>
          
            
           
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
   
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

        <!-- ============================================== INFO BOXES ============================================== -->
    
        <!-- ============================================== INFO BOXES : END ============================================== --> 

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg" style="margin-top: 15%; ">
  <div class="footer-bottom" >
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="address-block">
        
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class="toggle-footer" >
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p> Vellore Instiyute of Technology, Bhopal </p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p> +91 8875332494</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="#">wegrow.vitb@gmail.com</a></span> </div>
              </li>
            </ul>
          </div>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Our Services</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="home.php" title="expore different services and shops">Local search for different services in India</a></li>
              <li><a href="home.php" title="shop page">Create your shop page</a></li>
              <li><a href="locator.php" title="locate stores near you">Locate stores near you</a></li>
              <li><a href="home.php" title="Hiring">Get Hired</a></li>
              <li class="last"><a href="home.php" title="help">Get Asisstance</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3" >
          <div class="module-heading">
            <h4 class="module-title">Category of Stores</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body" >
            <ul class='list-unstyled'>
              
               <?php 

               $select_category="select * from `categories` limit 5";
               $result_category=mysqli_query($con,$select_category);
               while($row_data=mysqli_fetch_assoc($result_category)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo "   <li><a href='home.php?category=$category_title' title='$category_title'>$category_title</a></li>";
               }

              ?>
             
              <li><a href='home.php' title='$category_title'>And Much More</a></li>
              
             
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
               <div class="col-xs-12 col-sm-6 col-md-3" >
          <div class="module-heading">
            <h4 class="module-title">Locations</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body" >
            <ul class='list-unstyled'>
              
               <?php 

               $select_category="select state from `ip` limit 5";
               $result_category=mysqli_query($con,$select_category);
               while($row_data=mysqli_fetch_assoc($result_category)){
                $state_name=$row_data['state'];
               
                echo "   <li><a href='home.php?state=$state_name' title='$state_name'>$state_name</a></li>";
               }

              ?>
             
              <li><a href='home.php' title='$category_title'>And Many More</a></li>
              
             
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-4 no-padding social">
        <ul class="link">
    
        </ul>
      </div>
      <div class="col-xs-12 col-sm-4 no-padding copyright"><a target="_blank" href="#########">&copy 2023 We-Grow All rights reserved</a> </div>
      <div class="col-xs-12 col-sm-4 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            
          </ul>
        </div>
       
      </div>
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= --> 


<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="assets/js/jquery-1.11.1.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script> 
<script src="assets/js/echo.min.js"></script> 
<script src="assets/js/jquery.easing-1.3.min.js"></script> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/jquery.rateit.min.js"></script> 
<script src="assets/js/lightbox.min.js"></script> 
<script src="assets/js/bootstrap-select.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/scripts.js"></script>





  <!-- ================================== LIKE ================================== --> 
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
        
      
        if(isset($_GET['liked_shop'])){
         
          $get_ip=getIPAddress();
          $get_shopname=$_GET['liked_shop'];
          $date_liked=date('Y-m-d');
          $select_query="Select * from `likes` where ip_address='$get_ip' and shopname='$get_shopname'"; 

             $result_query=mysqli_query($con,$select_query);
             $num_of_rows=mysqli_num_rows($result_query);
             if($num_of_rows>0){
              echo "<script>alert('shop already liked')</script>";
              echo "<script>window.open('home.php', '_self')</script>";
             }
             else{
              $insert_query="insert into `likes` (shopname,ip_address,date_liked) values('$get_shopname','$get_ip','$date_liked')";
              $result_query=mysqli_query($con,$insert_query);
              echo "<script>alert('shop added to wishlist')</script>";
              echo "<script>window.open('home.php', '_self')</script>";
             }

        }
      
        ?>















        <!-- ================================== LIKE ENDED ================================== --> 
</body>

</html>

<!-- AIzaSyBOnYj1Bs91mg8k3RmZsLiMC-mkZC0rqss -->