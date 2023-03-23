<?php 
session_start();
include 'includes/db.php';
include 'includes/home_nav.php';

        ?>

<!DOCTYPE html>
<html>
<head>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

</head>

<body class="bg-light" >
 

 <div class="container my-5">
<!-- <h1>Stores/Services near me</h1> -->
<style type="text/css">
  .view{
    color:white;
    background-color: #FFA384;
  }
</style>

<section class="intro bg-white mt-3 pb-4">
  <br>
  <p class="mt-2 mx-3"><strong><span class="fa"><i class="fa-solid fa-clipboard"></i> &nbsp;</span>Stores/Services Near Me</strong></p>
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-12 px-0">
            <div class="card mx-3">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                 
                 
                     
                    
    <table class="table table-striped mb-0" id="customers">
       <thead style="background-color: #74BDCB;">


  <tr>
   
    <th scope="col" class="text-white" >Shopname</th>
     <th scope="col" class="text-white">Address</th>
    <th scope="col" class="text-white">Distance</th>
     <th scope="col" class="text-white">Details</th>
  </tr>
    </thead>
    <tbody>
  <?php

include('includes/db.php');
$v1=doubleval($_GET['lat']);
$v2=doubleval($_GET['long']);

$select_query="select id,shopname,address, round((3959 * acos( cos( radians($v1) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($v2) ) + sin( radians($v1) ) * sin( radians( lat ) ) ) ),2) as distance from `places` having distance < 25 order by distance limit 0 , 20";

$result_query=mysqli_query($con,$select_query);

 while($row=mysqli_fetch_array($result_query)){
                    $id=$row['id'];
                    $shopname=$row['shopname'];
                      $address=$row['address'];
                    $distance=$row['distance']; 

  echo "<tr>
   
    <td>$shopname</td>
     <td>$address</td>
    <td>$distance Km</td>
    <td><a href='display.php?shopname=$shopname'><button type='button' class='btn view btn-sm'>View Page</button></a></td>
  </tr>";
                     
} 

?>

  
 

</tbody>
</table>
  
             </div>
              </div>
            </div>
          </div>
       
 
  </div>
</section>
<style type="text/css">
  .map-container-1{
  overflow:hidden;
  padding-bottom:56.25%;
  position:relative;
  height:0;
}
.map-container-2 iframe{
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
}
</style>


    </div>
</body>
</html>

<!-- http://localhost/store%20locator/nearest.php?lat=23.8353881&long=91.2728463 -->