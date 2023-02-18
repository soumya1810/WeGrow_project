
<?php include 'includes/db.php';?>
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
  <body class="bg-light">
   <?php require_once 'includes/navigation.php' ?>

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
  $files=$row['files'];
  $domain=$row['domain'];
  $hiring_msg=$row['hiring_msg'];
  ?>

    <div class="m-3"> 
    <h1 class="text-center text-capitalize"><strong> <?php echo "$shopname"; ?></strong> </h1>
    <p  class="text-center subtitle"> <?php echo "$domain"; ?></p>


<div class="p-4 border1" >
  <div id="carouselExampleDark" class="carousel carousel-dark slide " style="border-width: 8px px 8px 8px; border-color:white; border-style: solid; border-radius: 2px;" >
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner h-100">
    <div class="carousel-item active" data-bs-interval="10000">
      <!-- <img src="https://hariharfurniture.com/wp-content/uploads/2022/01/small-kirana-1-1.jpg" class="d-block w-100" alt="..."> -->
      <img src="imgs/<?php echo "$intro_file"; ?>" class="d-block w-100" alt="...">
      
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="imgs/<?php echo "$files"; ?>" class="d-block w-100" alt="...">
     
    </div>
    <div class="carousel-item">
      <img src="imgs/<?php echo "$files"; ?>" class="d-block w-100" alt="...">
     
    </div>
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


<p class="text-center w-50 font-italic my-4 disp" ><?php echo "$description"; ?></p>



<div class="toi bg-white mb-3" >

  <img src="imgs/b5.png" alt="Snow" style="width:90%; height: 500px; margin-left: 10%;">
  <div >
  <p class=" text-secondary " style=" position: absolute; top: 50%; left: 16%"><?php echo "$discount"; ?></p>
<button type="button " class="btn btn-lg mt-2 exp " style="position: absolute; top: 75%; left: 16%" >Vsiit Now</button>
  </div>
</div>






<div class="plist bg-white mt-3">
  <div class="card mb-3 border-0 w-100" >
  <div class="row g-0">
    <div class="col-md-4 " style="background-image: url('https://t4.ftcdn.net/jpg/00/87/70/73/360_F_87707311_PFBt7s5l6LDyktc0u6L0DY8WH6j6gEXw.jpg');">
      <img src="imgs/<?php echo "$intro_file"; ?>" class="d-block  pt-4 px-4 rounded-5" class="img-fluid rounded-start " alt="..." style="margin-left:25%; filter: drop-shadow(10px 10px 10px lightgrey) ; width: 120%; height: 90%; ">
    </div>
    <div class="col-md-8" >
      <div class="card-body my-4" style="margin-left: 25%">
        <h2 class="card-title display-4" style="font-weight: 500; font-size: 52px;">Visit <br><?php echo "$shopname"; ?><br> Now</h2>
        <p class="card-text text-muted" >Visit the store now and explore a wide range of products/services. </p>
       <a href="pdisp.html"> <button type="button " class="btn btn-lg mt-2 exp "  >EXPLORE MORE</button></a>
      </div>
    </div>
  </div>
</div>
</div>

  <?php

 $shopname=$_GET['shopname'];
  $select_query="select * from `likes` where shopname='$shopname'";
  $result_query=mysqli_query($con,$select_query);


    $rowcount = mysqli_num_rows( $result_query);
    if($rowcount>0){
    // Display result
      echo " <p class='pt-4 px-5' style='color: darkgray;'>No of Likes = $rowcount</p>";
}
else{
   echo " <p class='pt-4 px-5' style='color: darkgray;'>No of Likes = 0</p>";
}
        ?>
  




<div  class="pb-3 hm">
  <p class="pt-4 px-5" style="color: darkgray;"><?php echo "$hiring_msg"; ?></p>

<a href="Reg-pages\Reg-pages\Job-Seekers Registration page\index.html"><button type="button" class="btn exp1">Apply Now</button></a>
</div>

    <div class="accordion mt-3" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color:#E7F2F8; font-weight: 500;">
            Customer Ratings and Reviews .<span class="badge bg-success">4.3  <i class="fa-sharp fa-solid fa-star" style="font-size: 10px;"></i></span>
          </button>

        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
          <div class="accordion-body p-0">
<ul class="list-group m-0 border-0">
  <li class="list-group-item">
    <p style="font-weight:500;" class="mb-1">Rashmi Gupta</p>
    <div>
      
      <span class="fa fa-sharp fa-star checked"></span>
      <span class="fa fa-sharp fa-star checked"></span>
      <span class="fa fa-sharp fa-star checked"></span>
      <span class="fa fa-sharp fa-star checked"></span>
      <span class="fa fa-sharp fa-star text-secondary"></span>
    </div>
    <p class="text-muted font-italic mt-2" style="font-size:11px; font-style:italic;">  By a verified customer <i class="fa-regular fa-square-check" style="font-size:12PX"></i></p>
    <p style="font-size:14px">The store has all the daily need products at a good price.</p>
  </li>
  <li class="list-group-item">
      <p style="font-weight:500;" class="mb-1">Aman Sinha</p>
    <div>
      
      <span class="fa fa-sharp fa-star checked"></span>
      <span class="fa fa-sharp fa-star checked"></span>
      <span class="fa fa-sharp fa-star checked"></span>
      <span class="fa fa-sharp fa-star text-secondary"></span>
      <span class="fa fa-sharp fa-star text-secondary"></span>
    </div>
    <p class="text-muted font-italic mt-2" style="font-size:11px; font-style:italic;">  By a verified customer <i class="fa-regular fa-square-check" style="font-size:12PX"></i></p>
    <p style="font-size:14px">The store is good but there are less number of helpers because of that the service speed is slow.</p>
  </li>
  <li class="list-group-item">
  <a href="user_registration.html">  <button type="button" class="btn btn-outline-secondary">Write a Review <i class="fa-regular fa-pen-to-square"></i></button></a>
  </li>
 
</ul>
          </div>
        </div>
      </div>
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