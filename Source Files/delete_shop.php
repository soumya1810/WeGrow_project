<?php

include 'includes/db.php';

if (isset($_GET['shopname'])) {  
     if(isset($_GET['owner_uname'])){
      $shopname = $_GET['shopname'];  
      $owner_uname = $_GET['owner_uname'];  
      $query_1 = "DELETE FROM `ip` WHERE shopname = '$shopname'";
      $query_2 = "DELETE FROM `likes` WHERE shopname = '$shopname'";  
      // $query_3 = "DELETE FROM `owners` WHERE shopname = '$shopname'";
      $query_4 = "DELETE FROM `shop_rating` WHERE shopname = '$shopname'";
      $query_5 = "DELETE FROM `apl_form` WHERE shopname = '$shopname'";
      $run_1 = mysqli_query($con,$query_1);  
      $run_2 = mysqli_query($con,$query_2);  
      // $run_3 = mysqli_query($con,$query_3);  
      $run_4 = mysqli_query($con,$query_4);  
      $run_5 = mysqli_query($con,$query_5);  
      if ($run_1 & $run_2  & $run_4 & $run_5) {  
           header('location:dashboard_owner.php?owner_uname=$owner_uname');  
      }else{  
      	
           echo "Error: ".mysqli_error($con);  
      }  
 }  }
?>
