
<?php 
session_start();

include 'includes/db.php';
include 'includes/home_nav.php';
          
        ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We Grow</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/display.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="js/rating.js"></script>
      <link rel="stylesheet" href="css/chat.css">
      <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/chat1.css"> -->
  </head>
  <body class="bg-light">
    
  
   <?php
// counting the number of likes the shop got
    function likes_shop(){
include 'includes/db.php';
$shopname=$_GET['shopname'];
  $select_query_two="select * from `likes` where shopname='$shopname'";
  $result_query_two=mysqli_query($con,$select_query_two);

    $rowcount_two = mysqli_num_rows( $result_query_two);
    if($rowcount_two>0){
    // Display result
      echo "<span> $rowcount_two likes</span>";
}
else{
   echo " ";
}

    }


   ?>

   <?php

// include 'includes/db.php';
if(isset($_GET['shopname'])){
if(!isset($_GET['category'])){
  $shopname=$_GET['shopname'];
  
  $select_query="select * from `ip` where shopname='$shopname'";
  $result_query=mysqli_query($con,$select_query);
  
while($row=mysqli_fetch_assoc($result_query)){

 $id=$row['id'];
  $shopname=$row['shopname'];
  $address=$row['address'];
  $description=$row['description'];
  $email=$row['email'];
  $links=$row['links'];
  $discount=$row['discount'];
  $phone=$row['phone'];
  $city=$row['city'];
  $state=$row['state'];
  $intro_file=$row['intro_file'];
  $domain=$row['domain'];
   $hiring_title=$row['hiring_title'];
  $hiring_msg=$row['hiring_msg'];
  $date_created=date_create($row['date_created']);
          $date_created_1 = date_format($date_created,"ymd");  
  ?>

    <div class="m-3"> 
    <h1 class="text-center text-capitalize"><strong> <?php echo "$shopname"; ?></strong> </h1>
    <p  class="text-center subtitle"> <?php echo "$domain"; ?></p>


<div class="p-4 border1" >
  <div id="carouselExampleDark" class="carousel carousel-dark slide " style="border-width: 8px px 8px 8px; border-color:white; border-style: solid; border-radius: 2px;" >
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="font-weight:lighter; font-style:"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner h-100">
    <div class="carousel-item active" data-bs-interval="10000">
      <!-- <img src="https://hariharfurniture.com/wp-content/uploads/2022/01/small-kirana-1-1.jpg" class="d-block w-100" alt="..."> -->
     
            <img src="intro_images/<?php echo "$intro_file"; ?>" class="d-block w-100" alt="...">

    </div>
    <?php 

       $select_images_query="select image_name from `image_files` where shopname='$shopname'";
       $result_images_query=mysqli_query($con,$select_images_query);
  if(mysqli_num_rows($result_images_query)>0){
while($images_row=mysqli_fetch_assoc($result_images_query)){
  $files=$images_row['image_name'];

    ?>
    <div class="carousel-item" data-bs-interval="1000">
      <img src="other_images/<?php echo "$files"; ?>" class="d-block w-100" alt="...">
     
    </div>
  <?php }} ?>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

<p class="text-center w-50 font-italic my-5 disp" ><?php echo "$description"; ?></p>



<div class="toi mb-4  " style="background-image: url('https://t4.ftcdn.net/jpg/02/88/65/45/360_F_288654557_h0hiDv7cdEkdfKOIeF9wrSk4P6YH4ZMc.jpg'); height: 300px; background-repeat: no-repeat; background-color: #e2b7d2;">


  <div style="text-align: right;margin-right:5%;">
<h1 class="text-white display-3 " style=" font-weight:600;  padding-top: 2%; ">Discounts & Offers </h1>
<p class="text-white" style="font-style:italic;"><small>Visit now to avail amazing disocunts and offers</small></p>
  <p class=" text-white py-1 w-50" style=" text-align:right; float: right;"> <?php echo "$discount"; ?></p>
 <br><br><br>
<button type="button " class="btn btn-lg mt-2 exp " style="background-color:#5ea0b8;" >Visit Now</button>
  </div>
</div>





<div class="row row-cols-1 row-cols-md-2 g-4 mb-5 mt-4">
  <div class="col">
    <div class="card h-100">
      <img src="intro_images/<?php echo "$intro_file"; ?>" class="card-img-top" alt="..." style="height:300px;">
      <div class="card-body">
        <h5 class="card-title">Visit <?php echo "$shopname"; ?> Now</h5>
        <p class="card-text">Visit the store now and explore a wide range of products/services.</p>
                 <?php 
    
     $shopnames=$_GET['shopname'];
      $select_retail="select retail_id from `retail_list` where shopname='$shopnames'";
   $retail_result_query=mysqli_query($con,$select_retail);
   if($retail_result_query){
    while($retail_row=mysqli_fetch_assoc($retail_result_query)){
    $retail_id=$retail_row['retail_id'];


      ?>
    
       <a href="items_display.php?retail_id=<?php echo "$retail_id"; ?>"> <button type="button " class="btn  mt-2 exp "  >EXPLORE MORE</button></a>
     
<?php }} else{
  echo " ";
} ?>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://mlocen1gfts2.i.optimole.com/w:1200/h:574/q:mauto/f:avif/https://mogul.nz/wp-content/uploads/2021/02/Untitled-design.png" class="card-img-top" alt="..." style="height:300px;">
      <div class="card-body">
        <h5 class="card-title">Customer Ratings and Reviews</h5>
        <p class="card-text">Click the link below to view the ratings and reviews of <?php echo "$shopname"; ?>.</p>
        <?php
  include 'includes/Rating_functions.php';
  $rating = new Rating();
  $itemDetails = $rating->getshop($_GET['shopname']);
  // $shopList = $rating->getshopList();
  foreach($itemDetails as $item){
    $average = $rating->getRatingAverage($item["shopname"]);
  ?>  
 <p >
  <span class="average btn btn-outline-success"><small class="p-2 " ><?php printf('%.1f', $average); ?> / 5</small></span>&nbsp; <span class="rating-reviews"><a href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">Rating & Reviews</a></span>
</p>
  <?php } ?>  

<span class="text-danger" style="float:right"><i class="fa-solid fa-heart" ></i>&nbsp;<?php likes_shop(); ?></span>
      </div>
    </div>
  </div>
  
</div>




<div  class="pb-3 mb-5 bd-callout bd-callout-info" style="background-color:#E7F2F8">
  <h5><strong class="pt-4 px-5 text-capitalize"><?php echo "$hiring_title"; ?></strong></h5>
  <p class="small subtitle px-5 " >JOB ID: <?php echo "$date_created_1"; ?>_<?php echo "$id"; ?> </p>
  <p class=" px-5" ><?php echo "$hiring_msg"; ?></p>

<a href="apl_form.php?shop=<?php echo "$shopname"; ?>"><button type="button" class="btn text-white"  style="margin-left: 4%; background-color: #3e96a8;">Apply Now</button></a>
</div>
<div class="card mb-5">
  <h5 class="card-header bg-faded" style=" color:#22535d">Question and Answer</h5>
  <div class="card-body">
    <div class="card-body">
      <?php
        $shopname_1=$_GET['shopname'];
        $select_qna_query="select * from `qna` where shopname='$shopname_1' and ans!='' order by id desc limit 1";

        $result_qna_query=mysqli_query($con,$select_qna_query);
        $count=mysqli_num_rows($result_qna_query);
        if($count==0){
          echo "<p>No questions posted yet.</p>";
        }else{
        while ($row=mysqli_fetch_assoc($result_qna_query)) {
          $ques=$row['ques'];
          $ans=$row['ans'];
          $date_posted=$row['date_posted'];
        
         ?>
        <div>
       <p> <strong> Question:</strong> <?php echo "$ques"; ?></p>

        <p><strong>Answer: </strong><?php echo "$ans"; ?></p>
        <p class="text-muted mb-0"><?php echo "$date_posted"; ?></p>
        <p class="text-muted "><span class="fa"><i class="fa-solid fa-shield "></i></span><span style="font-style:italic;"> By a verified user</span></p>
        <hr>
      </div>
      <?php }} ?>
      </div>
    <a href="faq.php?shopname=<?php echo "$shopname"; ?>" class="btn text-white" style="background-color: #3e96a8;">View More</a>
  </div>
</div>
  
    <div style="background-color:#f0f2f2" class="p-4">
      <p style="font-size:20px;font-weight: 500;" class="mb-5"> CONTACT US</p>
      <div class="row">
        <p class="col-3 text-center con "><i class="fa-solid fa-phone"></i><strong> Telephone: </strong> <br><br><?php echo "$phone"; ?></p>
      <p class="col-3 text-center con"><i class="fa-solid fa-location-dot"></i><strong> Location: </strong><br><br> <?php echo "$address"; ?></p>
       <p class="col-3 text-center con"><i class="fa-solid fa-envelope"></i><strong> Email: </strong> <br><br><?php echo "$email"; ?></p>
      <p class="col-3 text-center con"><i class="fa-solid fa-link"></i><strong> Website/Links: </strong> <br><br><?php echo "$links"; ?></p>
      </div>
     
    </div>
    <?php

    }
}
}

 // }
?> 
  
 <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with us!
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>

        <div class="content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg"
                                    placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                    onclick="heartButton()"></i>
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                    onclick="sendButton()"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
  
  </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="js/responses.js"></script>
<script src="js/chat.js"></script>
</html>
