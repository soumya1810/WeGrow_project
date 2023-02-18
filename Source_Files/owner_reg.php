<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
<body>
<?php
    require('includes/db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        // removes backslashes
        $name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
        $name = mysqli_real_escape_string($con, $name);
        $phone = stripslashes($_REQUEST['phone']);
        //escapes special characters in a string
        $phone = mysqli_real_escape_string($con, $phone);
        $aadhar_id = stripslashes($_REQUEST['aadhar_id']);
        //escapes special characters in a string
        $aadhar_id = mysqli_real_escape_string($con, $aadhar_id);
        $regno = stripslashes($_REQUEST['regno']);
        //escapes special characters in a string
        $regno = mysqli_real_escape_string($con, $regno);
        $shopname = stripslashes($_REQUEST['shopname']);
        //escapes special characters in a string
        $shopname = mysqli_real_escape_string($con, $shopname);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `owners` (name, phone, aadhar_id, regno, shopname, password, email, create_datetime)
                     VALUES ('$name', '$phone', '$aadhar_id', '$regno', '$shopname', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            header("Location: ip_form.php");
           
  
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='owner_reg.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form mx-4" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input form-control my-4" name="name" placeholder="name" required />
        <input type="text" class="login-input form-control my-4" name="phone" placeholder="phone" required />
        <input type="text" class="login-input form-control my-4" name="aadhar_id" placeholder="aadhar_id" required />
        <input type="text" class="login-input form-control my-4" name="regno" placeholder="regno" required />
        <input type="text" class="login-input form-control my-4" name="shopname" placeholder="shopname" required />
        <input type="text" class="login-input form-control my-4" name="email" placeholder="Email Adress">
        <input type="password" class="login-input form-control my-4" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button form-control my-4">
        <p class="link"><a href="owner_login.php">Click to Login</a></p>
    </form>













<?php
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>