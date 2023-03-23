<?php 
  session_start();
include 'includes/db.php';

        include 'includes/home_nav.php';
        ?>
        <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pricing</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>
    <h1>Pricing Page</h1>
    <?php 
    
  
     if(!isset($_SESSION['owner_username'])){
        // include('user_login.php');
    // header("location:owner_login.php ");
        echo "<button onclick='myFunction()' class='btn btn-warning m-5'>Pay and create your page</button>

<script>
function myFunction() {
  alert('Login to procceed futher.');
}
</script>";
        }else{
    

        $owner_uname=$_SESSION['owner_username'];

        echo " <a href='ip_form.php?owner_uname=$owner_uname'>   <button class='btn btn-warning m-5'> Subscribe and create your page</button></a>";
        // code...
    }

    ?>


    

  </body>
</html>
