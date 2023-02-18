<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>page details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
      span{
        color: red;
      }
      label{
        font-weight: bold;
      }
      .sc{
   background-color: #3e96a8 ;
   color: white;  
}
.sc:hover {
    
 background-color: #296470;
 color: white;
}
 .sub{
   background-color: #3e96a8 ;
   color: white;  
}
.sub:hover {
    
 background-color: #296470;
 color: white;
}
    </style>
  </head>
  <body class="bg-light">
     <?php require_once 'navigation.php' ?>

<div style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);" class="container bg-white">
  <div style="background: rgb(251,255,255);
background: linear-gradient(270deg, rgba(251,255,255,1) 0%, rgba(229,231,231,1) 26%, rgba(212,214,214,1) 81%); border-width: 0px 0px 5px 0px; border-color:#74BDCB;border-style: solid; padding-left: 0px;">
    <h3 class="m-4 text-center p-3"><strong>Create your page</strong></h3>
    </div>
    <form class="row g-3 mt-3" method="post" action="display.php?id=9">
 <?php

 include 'includes/db.php';
  $ids = $_GET['id'];
   $showquery = "select * from ip where id={$ids}";

  $showdata =mysqli_query($mysqli, $showquery);

  $arrdata=mysqli_fetch_array($showdata); 

   if(isset($_POST['fsub']))
    {
      $idupdate = $_GET['id'];
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
        $intro_file = mysqli_real_escape_string($mysqli,$_POST['intro_file']);
        $files = mysqli_real_escape_string($mysqli,$_POST['files']);
        $hiring_msg = mysqli_real_escape_string($mysqli,$_POST['hiring_msg']);
        

    

                $updatequery=" update ip set id=$id, shopname='$shopname', domain='$domain', address='$address', phone='$phoone', email='$email', links='$links', city='$city', state='$state', description='$description', discount='$discount', intro_file='$intro_file', files='$files', hiring_msg='$hiring_msg' where id=$idupdate ";

                $result = mysqli_query($mysqli,$updatequery);

                if($result)
                {
                     // echo ' Your Page will be created soon. ';
                }
                else
                {
                    echo ' Please Check Your Details Again';
                }
            
        
    }

  

?>

  <div class="col-md-6">
    <label for="shopname" class="form-label">Shop Name <span>*</span></label>

    <input type="text" class="form-control" id="shopname" name="shopname" value="<?php echo $arrdata['shopname']; ?>" required/>
  </div>

  <div class="col-md-6">
    <label for="domain" class="form-label">Domain <span>*</span></label>
    <input class="form-control" type="text" id="domain" name="domain" value="<?php echo $arrdata['domain']; ?>" required>
  
  </div>
  <div class="col-12">
    <label for="address" class="form-label">Address <span>*</span></label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php echo $arrdata['address']; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">Phone <span>*</span></label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $arrdata['phone']; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email <span>*</span></label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $arrdata['email']; ?>" required>
  </div>
    <div class="col-12">
    <label for="links" class="form-label">Website Link and Other Links</label>
    <input type="text" class="form-control" id="links" name="links" placeholder="Add Links" value="<?php echo $arrdata['links']; ?>">
  </div>
  <div class="col-md-6">
    <label for="city" class="form-label">City <span>*</span></label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php echo $arrdata['city']; ?>" required>
  </div>
  <div class="col-md-6">
    <label for="state" class="form-label">State <span>*</span></label>
      <input class="form-control"  id="state" name="state" value="<?php echo $arrdata['state']; ?>" required>
     
    </div>
   
  
    <div class="col-md-12">
  <label for="description" class="form-label">Description <span>*</span></label>
  <input type="text" class="form-control"  rows="3" id="description" name="description" value="<?php echo $arrdata['description']; ?>" required>
</div>
  <div class="col-md-12">
  <label for="discount" class="form-label">Message for Discount Banner</label>
  <input type="text" class="form-control" id="discount" name="discount" rows="3" value="<?php echo $arrdata['discount']; ?>">
</div>
 <div class="col-md-12">
  
  <div>

</div>
</div>
<div class="col-md-6">
   <label for="intro_file" class="form-label">Upload Introductory video/image <span>*</span></label>
  <div>
   <input type="text" class="form-control" id="intro_file" name="intro_file" value="<?php echo $arrdata['intro_file']; ?>">
  </div>
</div>
<div class="col-md-6">
   <label for="files" class="form-label">Upload other Images and Videos  </label>
  <div>
    <input type="text" class="form-control" id="files" name="files" value="<?php echo $arrdata['files']; ?>">
  </div>
</div>
 <div class="col-md-12">
  <label for="hiring_msg" class="form-label">Hiring Message</label>
  <input type="text" class="form-control" id="hiring_msg" name="hiring_msg" value="<?php echo $arrdata['hiring_msg']; ?>">
</div>
<div class="col-md-12 mb-3">
<button type="submit" class="btn sub btn-secondary" style="margin-left: 50%;" name="fsub">Update</button>
</div>
 <div class="text-center">
                   <?php require_once 'ip_back.php' ?>
                </div>
  </form>
</div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>