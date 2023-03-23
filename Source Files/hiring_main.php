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
    <title>Jobs</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"> -->
   
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
     <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <style type="text/css">

      @media (max-width: 767.98px) { .border-sm-start-none { border-left: none !important; } }
    </style>
  </head>
  <body style="background-color: #eee;">
 <header class="mb-4">
  <!-- Navbar -->
 
  <!-- Navbar -->

  <!-- Background image -->
  
  <div
    class=" text-center bg-image"
    style="
      background-image: url('https://ordinaryandhappy.com/wp-content/uploads/2020/04/how-to-stop-procrastinating.jpg');
      height: 400px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); height: 400px;">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Jobs for Everyone</h1>
          <p style="color:silver;">Search for your desired job and apply now. </p>
         <!--  <h4 class="mb-3">Subheading</h4> -->
         <!--  <a  href="#!" role="button"
          ><button class="btn btn-outline-light btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</button></a
          > -->
          <div class="row">
          <div class="dropdown-center col " style="text-align:right;">
  <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" role="button">
   Categories
  </button>
  <ul class="dropdown-menu dropdown-menu-outline-light" style="height:200px; overflow:auto">
     <?php 
 if(isset($_GET['apl_user'])){
  $apl_user=$_GET['apl_user'];
               $select_category="select * from `categories`";
               $result_category=mysqli_query($con,$select_category);
               while($row_data=mysqli_fetch_assoc($result_category)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo " <li><a class='dropdown-item' href='hiring_main.php?apl_user=$apl_user&category=$category_title'>$category_title</a></li>";
               }
             }

              ?>
  
 
  </ul>

</div>
          <div class="dropdown-center dropdown-scrollable col" style="text-align:left; ">
  <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" role="button">
   Locations
  </button>
  <ul class="dropdown-menu dropdown-menu-outline-light scrollable-menu "style="height:200px; overflow:auto">
     <?php 
 if(isset($_GET['apl_user'])){
  $apl_user=$_GET['apl_user'];
               $select_state="select * from `state`";
               $result_state=mysqli_query($con,$select_state);
               while($row_data=mysqli_fetch_assoc($result_state)){
                $state_name=$row_data['state_name'];
                $state_id=$row_data['state_id'];
                echo " <li><a class='dropdown-item' href='hiring_main.php?apl_user=$apl_user&state=$state_name'>$state_name</a></li>";
               }
             }

              ?>
  
 
  </ul>
  
</div>
</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Background image -->
</header>
    
          <?php
          if(isset($_GET['apl_user'])){
           if(!isset($_GET['category']) && !isset($_GET['state'])){
  include 'includes/Rating_functions.php';
   $apl_user=$_GET['apl_user'];
    
                     $rating = new Rating();
  $shopList = $rating->getdescshopList();
  foreach($shopList as $item){
    $average = $rating->getRatingAverage($item["shopname"]);
                  
      ?>
      <section  style="background-color: #eee;">
   

  <div class="fluid-container ">
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src="intro_images/<?php echo $item["intro_file"]; ?>"
                    class="w-100 " style="height: 170px;" />
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php
              $date_created=date_create($item['date_created']);
          $date_created_1 = date_format($date_created,"ymd");  
          $date_created_2 = date_format($date_created,"M d, Y");
              ?>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5><?php echo $item["hiring_title"]; ?> 
                <span class="small" style="float: right; font-weight:normal; color:darkgray;">
                  <p class="small">
                    JOB ID: <?php echo "$date_created_1"; ?>_<?php echo $item["id"]; ?> 
                  </p></span></h5>
               
                <p class="text-muted"><strong></strong></p>
                 <div class="d-flex flex-row">


 <div class=" mb-1 me-2">
  <span class="average "><button class="btn btn-success btn-sm"><?php printf('%.1f', $average); ?> <small>/ 5</small></button></span> <span class="rating-reviews"> &nbsp; <a href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">  Rating & Reviews</a></span>
</div>
 
                 
                  
                </div>
                <div class="mt-2 mb-0 text-muted small">
                  
                  <span class="text-primary"> • </span>
                  <span><?php echo $item["hiring_pay"]; ?> Rs</span>
                  
                </div>
              
                <p class="text-truncate mt-2 mb-md-0">
                  <?php echo $item["hiring_msg"]; ?>
                </p>
                 <div class="mt-3 mb-0 text-muted small">
                 <span class="fa"><i class="fa-solid fa-location-dot"></i> &nbsp;</span>
                 
                  <span><?php echo $item["city"]. ", ".  $item["state"]; ?></span>
                  
                </div>
                 <div class=" mb-0 text-muted small">
                 <span class="fa"><i class="fa-regular fa-clock"></i> &nbsp;</span>
                 
                  <span><?php echo $date_created_2; ?></span>
                  
                </div>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1"><?php echo $item["shopname"]; ?></h4>
                  
                </div>
                <h6 class="text-success"><?php echo $item["domain"]; ?></h6>
                <div class="d-flex flex-column mt-4">
                   <a class="btn btn-secondary btn-sm py-2" type="button" href="display.php?shopname=<?php echo $item["shopname"]; ?>">Details</a>
                 <a class="btn btn-outline-secondary btn-sm py-2 mt-2" type="button" href="apl_form.php?shop=<?php echo $item["shopname"]; ?>&apl_user=<?php echo $apl_user ?>">Apply</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
              
  </div>
</section>
<?php
}}}
?>









          <?php
          if(isset($_GET['apl_user'])){
           if(isset($_GET['category'])){
  include 'includes/Rating_functions.php';
 $apl_user=$_GET['apl_user'];
     $category_name=$_GET['category'];
                     $rating = new Rating();
  $catshopList = $rating->getcatshopList($category_name);
  foreach($catshopList as $item){
    $average = $rating->getRatingAverage($item["shopname"]);
                  
      ?>
      <section  style="background-color: #eee;">
   

  <div class="fluid-container ">
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src="intro_images/<?php echo $item["intro_file"]; ?>"
                    class="w-100" style="height: 170px;"/>
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php
              $date_created=date_create($item['date_created']);
          $date_created_1 = date_format($date_created,"ymd");  
          $date_created_2 = date_format($date_created,"M d, Y");
              ?>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5><?php echo $item["hiring_title"]; ?> 
                <span class="small" style="float: right; font-weight:normal; color:darkgray;">
                  <p class="small">
                    JOB ID: <?php echo "$date_created_1"; ?>_<?php echo $item["id"]; ?> 
                  </p></span></h5>
               
                <p class="text-muted"><strong></strong></p>
                 <div class="d-flex flex-row">


 <div class=" mb-1 me-2">
   <span class="average "><button class="btn btn-success btn-sm"><?php printf('%.1f', $average); ?> <small>/ 5</small></button></span> <span class="rating-reviews"> &nbsp; <a href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">  Rating & Reviews</a></span>
</div>
 
                 
                  
                </div>
                <div class="mt-2 mb-0 text-muted small">
                  
                  <span class="text-primary"> • </span>
                  <span><?php echo $item["hiring_pay"]; ?></span>
                  
                </div>
              
                <p class="text-truncate mt-2 mb-md-0">
                  <?php echo $item["hiring_msg"]; ?>
                </p>
                 <div class="mt-3 mb-0 text-muted small">
                 <span class="fa"><i class="fa-solid fa-location-dot"></i>&nbsp;</span>
                 
                  <span><?php echo $item["city"]. ", ".  $item["state"]; ?></span>
                  
                </div>
                <div class=" mb-0 text-muted small">
                 <span class="fa"><i class="fa-regular fa-clock"></i> &nbsp;</span>
                 
                  <span><?php echo $date_created_2; ?></span>
                  
                </div>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1"><?php echo $item["shopname"]; ?></h4>
                  
                </div>
                <h6 class="text-success"><?php echo $item["domain"]; ?></h6>
                <div class="d-flex flex-column mt-4">
                <a class="btn btn-primary btn-sm py-2" type="button" href="display.php?shopname=<?php echo $item["shopname"]; ?>">Details</a>
                 <a class="btn btn-outline-primary btn-sm py-2 mt-2" type="button" href="apl_form.php?shop=<?php echo $item["shopname"]; ?>&apl_user=<?php echo $apl_user ?>">Apply</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
              
  </div>
</section>
<?php
}}}
?>





          <?php
          if(isset($_GET['apl_user'])){
           if(isset($_GET['state'])){
  include 'includes/Rating_functions.php';
 $apl_user=$_GET['apl_user'];
     $state_name=$_GET['state'];
                     $rating = new Rating();
  $stateshopList = $rating->getstateshopList($state_name);
  foreach($stateshopList as $item){
    $average = $rating->getRatingAverage($item["shopname"]);
                  
      ?>
      <section  style="background-color: #eee;">
   

  <div class="fluid-container ">
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src="intro_images/<?php echo $item["intro_file"]; ?>"
                    class="w-100" style="height: 170px;"/>
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php
              $date_created=date_create($item['date_created']);
          $date_created_1 = date_format($date_created,"ymd");  
          $date_created_2 = date_format($date_created,"M d, Y");
              ?>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5><?php echo $item["hiring_title"]; ?> 
                <span class="small" style="float: right; font-weight:normal; color:darkgray;">
                  <p class="small">
                    JOB ID: <?php echo "$date_created_1"; ?>_<?php echo $item["id"]; ?> 
                  </p></span></h5>
               
                <p class="text-muted"><strong></strong></p>
                 <div class="d-flex flex-row">


 <div class=" mb-1 me-2">
   <span class="average "><button class="btn btn-success btn-sm"><?php printf('%.1f', $average); ?> <small>/ 5</small></button></span> <span class="rating-reviews"> &nbsp; <a href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">  Rating & Reviews</a></span>
</div>
 
                 
                  
                </div>
                <div class="mt-2 mb-0 text-muted small">
                  
                  <span class="text-primary"> • </span>
                  <span><?php echo $item["hiring_pay"]; ?></span>
                  
                </div>
              
                <p class="text-truncate mt-2 mb-md-0">
                  <?php echo $item["hiring_msg"]; ?>
                </p>
                 <div class="mt-3 mb-0 text-muted small">
                 <span class="fa"><i class="fa-solid fa-location-dot"></i>&nbsp;</span>
                 
                  <span><?php echo $item["city"]. ", ".  $item["state"]; ?></span>
                  
                </div>
                <div class=" mb-0 text-muted small">
                 <span class="fa"><i class="fa-regular fa-clock"></i> &nbsp;</span>
                 
                  <span><?php echo $date_created_2; ?></span>
                  
                </div>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1"><?php echo $item["shopname"]; ?></h4>
                  
                </div>
                <h6 class="text-success"><?php echo $item["domain"]; ?></h6>
                <div class="d-flex flex-column mt-4">
                <a class="btn btn-primary btn-sm py-2" type="button" href="display.php?shopname=<?php echo $item["shopname"]; ?>">Details</a>
                 <a class="btn btn-outline-primary btn-sm py-2 mt-2" type="button" href="apl_form.php?shop=<?php echo $item["shopname"]; ?>&apl_user=<?php echo $apl_user ?>">Apply</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
              
  </div>
</section>
<?php
}}}
?>



  
          <?php
          if(isset($_GET['apl_user'])){
             if(isset($_GET['category'])){
           if(isset($_GET['state'])){
  include 'includes/Rating_functions.php';
 $apl_user=$_GET['apl_user'];
     $state_name=$_GET['state'];
     $category_name=$_GET['category'];
                     $rating = new Rating();
  $catstateshopList = $rating->getcatstateshopList($category_name,$state_name);
  foreach($catstateshopList as $item){
    $average = $rating->getRatingAverage($item["shopname"]);
                  
      ?>
      <section  style="background-color: #eee;">
   

  <div class="fluid-container ">
    <div class="row justify-content-center mb-3">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border rounded-3">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src="intro_images/<?php echo $item["intro_file"]; ?>"
                    class="w-100" style="height: 170px;"/>
                  <a href="#!">
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php
              $date_created=date_create($item['date_created']);
          $date_created_1 = date_format($date_created,"ymd");  
          $date_created_2 = date_format($date_created,"M d, Y");
              ?>
              <div class="col-md-6 col-lg-6 col-xl-6">
                <h5><?php echo $item["hiring_title"]; ?> 
                <span class="small" style="float: right; font-weight:normal; color:darkgray;">
                  <p class="small">
                    JOB ID: <?php echo "$date_created_1"; ?>_<?php echo $item["id"]; ?> 
                  </p></span></h5>
               
                <p class="text-muted"><strong></strong></p>
                 <div class="d-flex flex-row">


 <div class=" mb-1 me-2">
   <span class="average "><button class="btn btn-success btn-sm"><?php printf('%.1f', $average); ?> <small>/ 5</small></button></span> <span class="rating-reviews"> &nbsp; <a href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">  Rating & Reviews</a></span>
</div>
 
                 
                  
                </div>
                <div class="mt-2 mb-0 text-muted small">
                  
                  <span class="text-primary"> • </span>
                  <span><?php echo $item["hiring_pay"]; ?></span>
                  
                </div>
              
                <p class="text-truncate mt-2 mb-md-0">
                  <?php echo $item["hiring_msg"]; ?>
                </p>
                 <div class="mt-3 mb-0 text-muted small">
                 <span class="fa"><i class="fa-solid fa-location-dot"></i>&nbsp;</span>
                 
                  <span><?php echo $item["city"]. ", ".  $item["state"]; ?></span>
                  
                </div>
                <div class=" mb-0 text-muted small">
                 <span class="fa"><i class="fa-regular fa-clock"></i> &nbsp;</span>
                 
                  <span><?php echo $date_created_2; ?></span>
                  
                </div>
              </div>
              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                <div class="d-flex flex-row align-items-center mb-1">
                  <h4 class="mb-1 me-1"><?php echo $item["shopname"]; ?></h4>
                  
                </div>
                <h6 class="text-success"><?php echo $item["domain"]; ?></h6>
                <div class="d-flex flex-column mt-4">
                <a class="btn btn-primary btn-sm py-2" type="button" href="display.php?shopname=<?php echo $item["shopname"]; ?>">Details</a>
                 <a class="btn btn-outline-primary btn-sm py-2 mt-2" type="button" href="apl_form.php?shop=<?php echo $item["shopname"]; ?>&apl_user=<?php echo $apl_user ?>">Apply</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
              
  </div>
</section>
<?php
}}}}
?>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
} ?>