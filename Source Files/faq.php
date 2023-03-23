<?php 
session_start();
include 'includes/db.php';


   if(!isset($_SESSION['user_username']) && !isset($_SESSION['apl_username'])){
      
    echo "<script>alert('Register/Login to view the page.')</script>";
      echo "<script>window.open('home.php','_self')</script>";
   
        }

        else{
        include 'includes/home_nav.php';
        ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question and Answers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <style type="text/css">
       .btn{
   background-color: #f9b0a9 ;
 
   
}
.btn:hover {
    
 background-color: #e2847b;
 
 
  

}
     </style>
  </head>
  <body class="bg-light">

    <div class="container m-5"> 
      <div class="row">
  <div class="col-md-8 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Question and Answer</h5>
      </div>
      <div class="card-body">
        <?php
        $shopname_1=$_GET['shopname'];
        $select_qna_query="select * from `qna` where shopname='$shopname_1' and ans!='' order by id desc";

        $result_qna_query=mysqli_query($con,$select_qna_query);
        $count=mysqli_num_rows($result_qna_query);
        if($count==0){
          echo "<p>Be the first one to post a question.</p>";
        }else{
        while ($row=mysqli_fetch_assoc($result_qna_query)) {
          $ques=$row['ques'];
          $ans=$row['ans'];
          $date_posted=$row['date_posted'];
        
         ?>
        <div>
      <p> <strong> Question:</strong> <?php echo "$ques"; ?></p>

        <p><strong>Answer: </strong><?php echo "$ans"; ?></p>
        <p class="text-muted mb-0"><?php echo "$date_posted"; ?></p>
        <p class="text-muted "><span class="fa"><i class="fa-solid fa-shield "></i></span><span style="font-style:italic;"> By a verified user</span></p>
        <hr>
      </div>
     <?php }} ?>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <?php 
     $shopname_2=$_GET['shopname'];
        $select_shop_query="select * from `ip` where shopname='$shopname_2'";
        $result_shop_query=mysqli_query($con,$select_shop_query);
        while ($shop_row=mysqli_fetch_assoc($result_shop_query)) {
          $description=$shop_row['description'];
           $intro_file=$shop_row['intro_file'];
          $city=$shop_row['city'];
          $state=$shop_row['state'];
    ?>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0"><?php echo "$shopname_2"; ?></h5>
      </div>
       <img src="intro_images/<?php echo "$intro_file"; ?>" class="card-img-top" alt="...">
      <div class="card-body">

        <p><?php echo "$description"; ?> </p>
        <hr>
<p class="text-muted"><i class="fa-solid fa-location-dot"></i> &nbsp; <?php echo "$city"; ?>, <?php echo "$state"; ?></p>
      <a href="display.php?shopname=<?php echo "$shopname_2"; ?>"> <button type="button" class="btn text-white btn-block">
          Know More
        </button></a> 
      </div>
    </div>
<?php } ?>
 <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Post your question</h5>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <textarea class="form-control mb-2" name="ques" id="ques" rows="2" placeholder="Enter your question here..."></textarea>
          <input class="form-control btn text-white btn-block w-25" type="submit" name="post_ques" id="post_ques" value="post">
        </form>

       
      </div>
    </div>
    <?php
    if(isset($_POST['post_ques'])){
      $shopname=$_GET['shopname'];
  $ques=$_POST['ques'];
  $date_posted=date('Y-m-d');

  $insert_ques_query="insert into `qna` (shopname,ques,date_posted) values ('$shopname','$ques','$date_posted')";

  $result_ques_query=mysqli_query($con,$insert_ques_query);
  if($result_ques_query){
      echo "<script>alert('Ques posted successfully.')</script>";
  }
  else{
    // die(mysqli_error($con));
      echo "<script>alert('Unable to post question.Try again later. Sorry for the inconvience.')</script>";
  }
  
       // code...
     } 
    ?>
    
  </div>
  </div>

</div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
} 
?>