<?php

include 'includes/db.php';

if (isset($_GET['shopname'])) {  
     if (isset($_GET['apl_name'])) { 
      $shopname = $_GET['shopname'];  
      $apl_name=$_GET['apl_name'];
      $query_1 = "DELETE FROM `apl_form` WHERE shopname = '$shopname' and apl_name='$apl_name'";
       
      $run_1 = mysqli_query($con,$query_1);  
     
      if ($run_1) {  
           header('location:home.php');  
      }else{  
      	
           echo "Error: ".mysqli_error($con);  
      }  
 }  
 

}
else if(isset($_GET['owner_email'])){
     $owner_email_2 = $_GET['owner_email'];  
      $query_2 = "DELETE FROM `admin` WHERE owner_email = '$owner_email_2'";
       
      $run_2 = mysqli_query($con,$query_2);  
     
      if ($run_2) {  
          
           header('location:admin_dashboard.php');  
      }else{  
         
           echo "Error: ".mysqli_error($con);  
      }  
 }

?>