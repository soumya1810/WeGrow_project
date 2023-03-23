<?php

include 'includes/db.php';

if (isset($_GET['shopname'])) {  
      $shopname = $_GET['shopname'];  
      $query_1 = "DELETE FROM `likes` WHERE shopname = '$shopname'";
     
      $res_1 = mysqli_query($con,$query_1);  
      if ($res_1) {  
          echo "<script>alert('shop removed from wishlist')</script>";
           header('location:home.php');  
      }else{  
      	
           echo "Error: ".mysqli_error($con);  
      }  
 }  
?>