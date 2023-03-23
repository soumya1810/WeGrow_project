<?php 
session_start();
include 'includes/db.php';


   if(!isset($_SESSION['apl_username'])){
        // include('user_login.php');
    header("location:apl_login.php ");
        }else{
        
        ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
<body>

   <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Dahboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php">All Stores</a>
        </li>
         <?php 
  if(isset($_GET['apl_user'])){
    $apl_user=$_GET['apl_user'];
   $select_query_1="select * from `apl_form` where apl_username='$apl_user' order by apl_id desc limit 1";
    $result_query_1=mysqli_query($con,$select_query_1);
     while($row_2=mysqli_fetch_assoc($result_query_1)){
                  
              

                   $shopname_2=$row_2['shopname'];
                   $apl_username=$row_2['apl_username'];
                    $apl_name=$row_2['apl_name'];
                    $apl_phone=$row_2['apl_phone'];
                     $apl_gender=$row_2['apl_gender'];
                    $apl_age=$row_2['apl_age'];
                    $apl_education=$row_2['apl_education'];
                    $apl_address=$row_2['apl_address'];
                    $apl_verification_id=$row_2['apl_verification_id'];
                    $apl_skills=$row_2['apl_skills'];
                    $apl_exp=$row_2['apl_exp'];
                    $apl_info=$row_2['apl_info'];

    ?>
    <li class="nav-item">
          <a class="nav-link" href="hiring_main.php?apl_user=<?php echo $apl_user; ?>">Jobs</a>
        </li>
        <li class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#<?php echo $apl_phone; ?>">
         Latest Application
        </li>

  <div class="modal fade" id="<?php echo $apl_phone; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Shop: </strong><?php echo $shopname_2; ?></p>
        <p><strong>Name: </strong><?php echo $apl_name; ?></p>
        <p><strong>Phone No.: </strong><?php echo $apl_phone; ?></p>
        <p><strong>Gender: </strong><?php echo $apl_gender; ?></p>
        <p><strong>Age: </strong><?php echo $apl_age; ?></p>
        <p><strong>Address: </strong><?php echo $apl_address; ?></p>
        <p><strong>Verification Id: </strong><?php echo $apl_verification_id; ?></p>
        <p><strong>Skills: </strong><?php echo $apl_skills; ?></p>
        <p><strong>Education: </strong><?php echo $apl_education; ?></p>
        <p><strong>Experience: </strong><?php echo $apl_exp; ?></p>
        <p><strong>Additional Information: </strong><?php echo $apl_info; ?></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <a href="delete_apl_entry.php?shopname=<?php echo $shopname_5; ?>&apl_name=<?php echo $apl_name; ?>"> <button type="button" class="btn btn-danger">Remove</button></a>
      </div>
    </div>

    </ul>
    </div>

<?php    }}    ?>
</nav>
      
       <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">No of jobs applied</h5>
      <?php 
  if(isset($_GET['apl_user'])){
    $apl_user_1=$_GET['apl_user'];
  
 $select_query="select * from `apl_form` where apl_username='$apl_user_1'";
  $result_query=mysqli_query($con,$select_query);
  $job_count=mysqli_num_rows($result_query);
}
  echo "<p class='card-text'>$job_count Jobs</p>";
     
  ?>
        <?php 
  if(isset($_GET['apl_user'])){
    $apl_user_1=$_GET['apl_user'];
$select_query=" select max(ip.hiring_pay) as mhp from `apl_form` left join `ip` on apl_form.shopname=ip.shopname";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
$pay=$row['mhp'];
echo "<p class='card-text'>$pay </p>";
}
}
  

     
  ?>
   <?php 
  if(isset($_GET['apl_user'])){
    $apl_user_1=$_GET['apl_user'];
  
 $select_query="select apl_date_submitted from `apl_form` where apl_username='$apl_user_1' order by apl_id desc limit 1";
  $result_query=mysqli_query($con,$select_query);
 while($row=mysqli_fetch_assoc($result_query)){
$last_apl_date=$row['apl_date_submitted'];
  echo "<p class='card-text'>Last Applied On: $last_apl_date </p>";
}}     
  ?>
       
    
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
         <h5 class="my-4">View Recent Applications</h5>
        <table class="table">

  <thead>
    <tr>
    <th scope="col">Sno.</th>
    <th scope="col">Shop Name</th>
      <th scope="col">Name</th>
     <!--  <th scope="col">UserName</th> -->
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Age</th>
      <th scope="col">Educational Qualification</th>
      <th scope="col">View More</th>
    


    </tr>
  </thead>
    <tbody>
   <?php

if(isset($_GET['apl_user'])){

                  $apl_user_2=$_GET['apl_user'];
                  $select_query="select * from `apl_form` where apl_username='$apl_user_2'";
  $result_query=mysqli_query($con,$select_query);
                 $i=1;
                   while($row_5=mysqli_fetch_assoc($result_query)){
                  
              

                   $shopname_5=$row_5['shopname'];
                   $apl_username=$row_5['apl_username'];
                    $apl_name=$row_5['apl_name'];
                    $apl_phone=$row_5['apl_phone'];
                     $apl_gender=$row_5['apl_gender'];
                    $apl_age=$row_5['apl_age'];
                    $apl_education=$row_5['apl_education'];
                    $apl_address=$row_5['apl_address'];
                    $apl_verification_id=$row_5['apl_verification_id'];
                    $apl_skills=$row_5['apl_skills'];
                    $apl_exp=$row_5['apl_exp'];
                    $apl_info=$row_5['apl_info'];

                 

?>



    <tr>
       <td><?php echo $i++; ?></td>
      <td><?php echo $shopname_5; ?></td>
      <td><?php echo $apl_name; ?></td>
      
      <td><?php echo $apl_phone; ?></td>
      <td><?php echo $apl_gender; ?></td>
       <td><?php echo $apl_age; ?></td>
      <td><?php echo $apl_education; ?></td>
      <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $apl_phone; ?>">
  View More
</button></td>
    </tr>
    
      <div class="modal fade" id="<?php echo $apl_phone; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Shop Name: </strong><?php echo $shopname_5; ?></p>
        <p><strong>Name: </strong><?php echo $apl_name; ?></p>
        <p><strong>Phone No.: </strong><?php echo $apl_phone; ?></p>
        <p><strong>Gender: </strong><?php echo $apl_gender; ?></p>
        <p><strong>Age: </strong><?php echo $apl_age; ?></p>
        <p><strong>Address: </strong><?php echo $apl_address; ?></p>
        <p><strong>Verification Id: </strong><?php echo $apl_verification_id; ?></p>
        <p><strong>Skills: </strong><?php echo $apl_skills; ?></p>
        <p><strong>Education: </strong><?php echo $apl_education; ?></p>
        <p><strong>Experience: </strong><?php echo $apl_exp; ?></p>
        <p><strong>Additional Information: </strong><?php echo $apl_info; ?></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       <a href="delete_apl_entry.php?shopname=<?php echo $shopname_5; ?>&apl_name=<?php echo $apl_name; ?>"> <button type="button" class="btn btn-danger">Remove</button></a>
      </div>
    </div>
    
<?php }} ?>
  </tbody>
</table>
        
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>
<?php 
} ?>
