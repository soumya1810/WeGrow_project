<?php 

//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'root', '', 'wegrow');

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

    // require_once('config.php');
    if(isset($_POST['fsub']))
    {
          $owner_uname=$_GET['owner_uname'];
        $shopname = mysqli_real_escape_string($mysqli,$_POST['shopname']);
        $domain = mysqli_real_escape_string($mysqli,$_POST['domain']);
        $address = mysqli_real_escape_string($mysqli,$_POST['address']);
        $phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
        $email = mysqli_real_escape_string($mysqli,$_POST['email']);
        $links = mysqli_real_escape_string($mysqli,$_POST['links']);
        $city = mysqli_real_escape_string($mysqli,$_POST['city']);
        $state = mysqli_real_escape_string($mysqli,$_POST['state']);
        $description = mysqli_real_escape_string($mysqli,$_POST['description']);
        $discount = mysqli_real_escape_string($mysqli,$_POST['discount']);
        
        $hiring_title = mysqli_real_escape_string($mysqli,$_POST['hiring_title']);
        $hiring_msg = mysqli_real_escape_string($mysqli,$_POST['hiring_msg']);
        $hiring_pay = mysqli_real_escape_string($mysqli,$_POST['hiring_pay']);
        $lat=$_POST['lat'];
        $lng=$_POST['lng'];
        $date_created=date('Y-m-d');
        $date_created_2 = date("ymd"); 
          $intro_file = $_FILES['intro_file']['name'];
        $intro_file_temp=$_FILES['intro_file']['tmp_name'];
        move_uploaded_file($intro_file_temp,"./intro_images/$intro_file");

        $files_count= count($_FILES['files']['name']);
      for ($i=0; $i < $files_count; $i++) { 
          // code...
        $file_name=$_FILES['files']['name'][$i];
        $files_temp=$_FILES['files']['tmp_name'][$i];
        if(move_uploaded_file($files_temp,"./other_images/$file_name")){
            $images_sql="insert into `image_files` (`shopname`,`image_name`) values ('$shopname','$file_name')";
            $image_result=mysqli_query($mysqli,$images_sql);
        }
      }

      
            if($image_result){
            
            
                $query = "insert into `ip` (shopname,domain,address,phone,email,links,city,state,description,discount,intro_file,hiring_title,hiring_msg,hiring_pay,date_created) values ('$shopname','$domain','$address','$phone','$email' ,'$links' ,'$city','$state','$description','$discount','$intro_file','$hiring_title','$hiring_msg','$hiring_pay','$date_created')";
                $result = mysqli_query($mysqli,$query);
 
                if($result==1)
                {
                     $ins="insert into `places` (`shopname`,`address`,`lat`,`lng`) values ('$shopname','$address','$lat','$lng')";
                     $map_query=mysqli_query($mysqli,$ins);
                      echo "<script>window.open('dashboard_owner.php?owner_uname=$owner_uname','_self')</script>";
                     
                      
    
                }
                else
                {
                     // echo "<script>alert('Please fill in your all the details.')</script>";
                     die(mysqli_error($con));

                }
            
        }
        else{
             die(mysqli_error($con));
        }

    
    // else{
    //      echo "<script>alert('Please fill in your all the details.')</script>";
    //       echo "<script>window.open('ip_form.php?owner_uname=$owner_uname','_self')</script>";
    // }

}
?>