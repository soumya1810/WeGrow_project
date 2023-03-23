<?php 
session_start();
include 'includes/db.php';


   if(!isset($_SESSION['owner_username'])){
        // include('user_login.php');
    header("location:owner_login.php ");
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

 <!--  <script type="text/javascript">
    const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus();
});

  </script> -->
   
  <body>
           <?php 

                if(isset($_GET['owner_uname'])){

                  $owner_uname_1=$_GET['owner_uname'];
                  $select_query_1="select shopname from `owners` where owner_username='$owner_uname_1' ";
                  $result_query_1=mysqli_query($con,$select_query_1);
                  $select_query_shop_1="select * from `ip` where shopname='$select_query_1' ";
                  while($row_1=mysqli_fetch_assoc($result_query_1)){
                    $shopname_1=$row_1['shopname'];
                    $result_query_shop_1=mysqli_query($con,$select_query_shop_1);
                    
              
                  ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php?shopname=<?php echo "$shopname_1" ?>">View Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ip_form_update.php?shopname=<?php echo "$shopname_1" ?>">Update</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="delete_shop.php?shopname=<?php echo "$shopname_1" ?>">Delete</a>
        </li>
        
        
      </ul>
    </div>
</nav>
<?php
}}
?>

<?php
 if(isset($_GET['owner_uname'])){

                  $owner_uname_2=$_GET['owner_uname'];
                  $select_query_2="select shopname from `owners` where owner_username='$owner_uname_2' ";
                  $result_query_2=mysqli_query($con,$select_query_2);
                  $select_query_shop_2="select * from `ip` where shopname='$select_query_2' ";
                  while($row_2=mysqli_fetch_assoc($result_query_2)){
                    $shopname_2=$row_2['shopname'];
  include 'includes/Rating_functions.php';
  $rating = new Rating();
  $itemDetails = $rating->getshop($shopname_2);
  // $shopList = $rating->getshopList();
  foreach($itemDetails as $item){
    $average = $rating->getRatingAverage($item["shopname"]);
  ?>  
 <div class="alert alert-info" role="alert">
  <span class="average"><?php printf('%.1f', $average); ?> / 5</span> <span class="rating-reviews"><a href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">Rating & Reviews</a></span>
</div>

 <div class="container my-5">
      <h1><?php echo $owner_uname_2; ?></h1>
  <?php 
} }}
  ?>  


      <div class="row">
    <div class="card mb-3 col-md-4 mx-2" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <?php

if(isset($_GET['owner_uname'])){

                  $owner_uname_3=$_GET['owner_uname'];
                  $select_query_3="select * from `owners` where owner_username='$owner_uname_3' ";
                  $result_query_3=mysqli_query($con,$select_query_3);
                 
                   while($row_3=mysqli_fetch_assoc($result_query_3)){
                    $shopname_3=$row_3['shopname'];
                   $select_query_shop_3="select * from `likes` where shopname='$shopname_3' ";
                   $result_query_shop_3=mysqli_query($con,$select_query_shop_3);
                  $rowcount_1 = mysqli_num_rows( $result_query_shop_3);
                  echo " <p class='card-text'>$rowcount_1 likes</p>";
}}
?>




    
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
   <?php 
                                 if(isset($_GET['owner_uname'])){

                  $owner_uname_1=$_GET['owner_uname'];
                  $select_query_1="select shopname from `owners` where owner_username='$owner_uname_1' ";
                  $result_query_1=mysqli_query($con,$select_query_1);
                  while($row=mysqli_fetch_assoc($result_query_1)){
                    $shopname=$row['shopname'];
                 
                  $select_query_shop_1="select * from `ip` where shopname='$shopname' ";
                    $result_query_shop_1=mysqli_query($con,$select_query_shop_1);
                  while($row_1=mysqli_fetch_assoc($result_query_1)){
                    $shopname_1=$row_1['shopname'];
                    $discount=$row_1['discount'];
                    echo " <h6 class='mb-0 text-white'>$discount</h6>";
                  }}}

                                ?>

</div>
</div>
<table class="table">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">UserName</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Age</th>
      <th scope="col">Educational Qualification</th>
      <th scope="col">View More</th>
    


    </tr>
  </thead>
    <tbody>
   <?php

if(isset($_GET['owner_uname'])){

                  $owner_uname_4=$_GET['owner_uname'];
                  $select_query_4="select * from `owners` where owner_username='$owner_uname_4' ";
                  $result_query_4=mysqli_query($con,$select_query_4);
                 
                   while($row_4=mysqli_fetch_assoc($result_query_4)){
                    $shopname_4=$row_4['shopname'];
                  


                   $select_query_shop_4="select * from `apl_form` where shopname='$shopname_4' ";
                   $result_query_shop_4=mysqli_query($con,$select_query_shop_4);
                    $count_4=mysqli_num_rows($result_query_shop_4);
                    $i=1;
                    if($count_4==0){
                      echo "<p>No applications for review.</p>";
                    }else{
                 while($row_5=mysqli_fetch_assoc($result_query_shop_4)){

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
<p><?php echo $shopname_5; ?></p>


    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $apl_name; ?></td>
      <td><?php echo $apl_username; ?></td>
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
    
<?php }}}} ?>
  </tbody>
</table>

<h5 class="mt-5">Que</h5>
 <table class="table">
  <thead>
    <tr>
    <th scope="col">Question</th>
      <th scope="col">Posted On</th>
      <th scope="col">Answer</th>
      
    


    </tr>
  </thead>
    <tbody>
    <?php
     $owner_uname_6=$_GET['owner_uname'];
                  $select_query_6="select * from `owners` where owner_username='$owner_uname_6' ";
                  $result_query_6=mysqli_query($con,$select_query_6);
                 
                   while($row_6=mysqli_fetch_assoc($result_query_6)){
                    $shopname_6=$row_6['shopname'];
    $select_ques_query="select * from `qna` where shopname='$shopname_6' and ans=''";
    $result_ques_query=mysqli_query($con,$select_ques_query) ;
    $count_qna=mysqli_num_rows($result_ques_query);
    if($count_qna==0){
        echo "<p>No questions to answer.</p>";
    }else{
    while($row_7=mysqli_fetch_assoc($result_ques_query)){
      $ques_id=$row_7['id'];
      $ques=$row_7['ques'];
      $date_posted=$row_7['date_posted'];
    
    ?>
 <tr>
      <td><?php echo $ques; ?></td>
      <td><?php echo $date_posted; ?></td>
      
      <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $ques_id; ?>">
  Answer
</button></td>
    </tr>
  

<!--   <form action="" method="post"> -->
    <div class="modal fade" id="<?php echo $ques_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel1">Answer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <p><strong>Question: </strong><?php echo "$ques"; ?></p>
        <input type="hidden" name="ques_1" id="ques_1" value="<?php echo "$ques"; ?>">
        <label><strong>Answer:</strong></label>
        <textarea placeholder="Write your answer here..." name="ans" id="ans" class="w-100 mt-1"></textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="post_ans" id="post_ans" class="btn btn-success" value="post">
      </div>
 
  </form>
</div>
</div>
</div>

<?php }}}?>

  </tbody>
</table>
<?php 
 if(isset($_POST['post_ans'])){
  $ques_1=$_POST['ques_1'];
   $ans = $_POST['ans'];
    $update_ans_query=" update `qna` set ans='$ans' where ques='$ques_1' ";

                $result_ans_query = mysqli_query($con,$update_ans_query);

                if($result_ans_query)
                {
                      echo "<script>alert('Answer posted successfully');</script>";
                }
 }

?>
  </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>
<?php 
} ?>