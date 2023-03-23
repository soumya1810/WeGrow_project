<?php 
session_start();
include 'includes/db.php';


   if(!isset($_SESSION['user_username'])){
        // include('user_login.php');
    header("location:user_login.php ");
        }else{
        
      include 'includes/home_nav.php';  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Favourites</title>
   
  </head>
  <body class="bg-light mb-5">
   <div class="container bg-white">
    <br>
    <h2 class="mb-3">Favourites</h2>
    <hr>
     <?php  function getIPAdds() {  
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

$get_ip=getIPAdds();
$select_query="Select * from `likes` where ip_address='$get_ip'";
$result_query=mysqli_query($con,$select_query);
$result_count=mysqli_num_rows($result_query);
if($result_count>0){
while($row=mysqli_fetch_assoc($result_query)){
    $shopname=$row['shopname'];
    $wish_query="Select * from `ip` where shopname='$shopname'";
    $wishresult_query=mysqli_query($con,$wish_query);
    while($row_list=mysqli_fetch_assoc($wishresult_query)){
                    $description=$row_list['description'];
                    $city=$row_list['city'];
                    $state=$row_list['state'];
                    $intro_file=$row_list['intro_file'];
                    
                    $domain=$row_list['domain'];

                    echo"<div class='card mb-3 border-0' >
  <div class='row g-0'>
    <div class='col-md-4'>
      <img src='intro_images/$intro_file' class='img-fluid rounded-start ' alt='...' style='width: 350px; height:219px'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
      <p class='card-subtitle mb-2 text-muted font-italic font-weight-light text-uppercase form-control-sm '>$domain</p>
        <h5 class='card-title' style='padding-left:1%;'>$shopname</h5>
        <p class='card-subtitle mb-2 text-muted font-italic font-weight-light form-control-sm '>$city, $state</p>
        <p class='card-text mt-3' style='padding-left:1%;'>$description</p>
        <a href='display.php?shopname=$shopname'><button type='button' class='btn text-white mt-2' style='background-color:#74BDCB'>View More</button></a>
       <a href='wishlist_remove.php?shopname=$shopname'><button  class='btn text-white mt-2 ' style='background-color:#FFA384'>Remove</button></a>
         
      </div>
      
    </div>
  </div>
  <hr>
</div>";
}
  }
} 

else{
echo "<h4 class='mt-5 pb-2 text-muted' style='font-weight:lighter; '>Wishlist is Empty</h4> 
    <a href='home.php'><button type='button' class='btn text-white mt-2 mb-4' style='background-color:#74BDCB'>View All Shops</button></a>";}?>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
} ?>