<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  


<style type="text/css">
  html,
body,
.intro {
  height: 100%;
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

thead th {
  color: #fff;
}

.card {
  border-radius: .5rem;
}

.table-scroll {
  border-radius: .5rem;
}

.table-scroll table thead th {
  font-size: 1.25rem;
}
thead {
  top: 0;
  position: sticky;
}
</style>



  </head>
  <body>

<section class="intro">
  <div class="bg-image h-100" style="background-color: #f5f7fa;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                  <table class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                      <tr>
                        <th scope="col">Class name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Hours</th>
                        <th scope="col">Trainer</th>
                        <th scope="col">Spots</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Like a butterfly</td>
                        <td>Boxing</td>
                        <td>9:00 AM - 11:00 AM</td>
                        <td>Aaron Chapman</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Mind &amp; Body</td>
                        <td>Yoga</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Adam Stewart</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Mind &amp; Body</td>
                        <td>Yoga</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Adam Stewart</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Mind &amp; Body</td>
                        <td>Yoga</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Adam Stewart</td>
                        <td>15</td>
                      </tr>
        
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>

    <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><input type="text" class="form-control"  value="<?php echo $itemdata['item_name']; ?>"></td>
                        <td><input type="text" class="form-control"  value="<?php echo $itemdata['item_category']; ?>"></td>
                        <td><input type="text" class="form-control"  value="<?php echo $itemdata['item_cost']; ?>"></td>
                        <td><button type='button' onclick='deleteRow(this);' class='btn btn-outline-danger'>Remove</button></td>
                        
                        
                      </tr>


                      <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><?php echo $itemdata['item_name']; ?></td>
                        <td><?php echo $itemdata['item_category'];?></td>
                        <td><?php echo $itemdata['item_cost'];?></td>
                        
                      </tr>



                         for ($a = 0; $a < count($_POST["item_name"]); $a++)
    {
      $sql = "UPDATE items SET ( item_name, item_category, item_cost) VALUES ('" . $_POST["item_name"][$a] . "', '" . $_POST["item_category"][$a] . "', '" . $_POST["item_cost"][$a] . "')";
      mysqli_query($con, $sql);
    }

     <img src="imgs/<?php echo "$intro_file"; ?>" class="d-block w-100" alt="...">








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





      $files_count= count($_FILES['files']['name']);
      for ($i=0; $i < $files_count; $i++) { 
          // code...
        $file_name=$_FILES['files']['name'][$i];
        $files_temp=$_FILES['files']['tmp_name'][$i];
        move_uploaded_file($files_temp,"./other_images/$files");
      }










         $files = $_FILES['files']['name'];
         $files_count= count($_FILES['files']['name']);
         $files_temp=$_FILES['files']['tmp_name'];
          move_uploaded_file($files_temp,"./other_images/$files");
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
            
                $query = "insert into `ip` (shopname,domain,address,phone,email,links,city,state,description,discount,intro_file,files,hiring_title,hiring_msg,hiring_pay,date_created) values ('$shopname','$domain','$address','$phone','$email' ,'$links' ,'$city','$state','$description','$discount','$intro_file','$files','$hiring_title','$hiring_msg','$hiring_pay','$date_created')";
                $result = mysqli_query($mysqli,$query);
 
                if($result==1)
                {
                     $ins="insert into `places` (`shopname`,`address`,`lat`,`lng`) values ('$shopname','$address','$lat','$lng')";
                     $map_query=mysqli_query($mysqli,$ins);
                      // echo "<script>window.open('dashboard_o_test.php?owner_uname=$owner_uname','_self')</script>";
                      
    
                }
                else
                {
                     // echo "<script>alert('Please fill in your all the details.')</script>";
                     die(mysqli_error($con));

                }
            
        

    
    // else{
    //      echo "<script>alert('Please fill in your all the details.')</script>";
    //       echo "<script>window.open('ip_form.php?owner_uname=$owner_uname','_self')</script>";
    // }

}
?>
<a href="delete_apl_entry.php?shopname=<?php echo $shopname;  ?>">


   <?php
            if(isset($_POST['feed_submit'])){
              $username=$_POST['username'];
              $feed_input=$_POST['feed_input'];
               $feed_date=date('Y-m-d');
              
              
               $query = "insert into `feedback` (username,feed_input,feed_date) values ('$username','$feed_input','$feed_date')";
                $result = mysqli_query($con,$query);
 
                if($result){
                  echo "<script>alert('Thank You.');</script>";
                }
              }else{
                echo "<script>alert('Username not found.');</script>";
              }
            } else{
               die(mysqli_error($con));
            }
            ?>



 <?php
                           
 if( (!isset($_SESSION['user_username'])) && (!isset($_SESSION['owner_username'])) && (!isset($_SESSION['apl_username']))){
    echo "<li class='dropdown dropdown-small'> <a href='#' class='dropdown-toggle' data-hover='dropdown' data-toggle='dropdown' id='dropdownMenu1'>Signin <span class='caret'></span></a>


          
               <ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1' style='background-color:white; border-style:none; width:20px;'>
                <li ><a href='user_login.php' style='color:black !important; border-style: none;'>Signin as User</a></li>
                <br>
                <li ><a href='owner_login.php' style='color:black !important; border-style: none;' >Signin as Shop Owner</a></li>
                <br>
                <li ><a href='apl_login.php' style='color:black !important; border-style: none;' >Signin as Job Applicant</a></li>
               
              </ul>
            </li>";
  }



  else{
     echo "<a class='nav-link' href='logout.php' style='color:rgba(255,255,255,0.8);'>Logout</a>";
  }
  ?>