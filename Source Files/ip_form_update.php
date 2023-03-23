<?php 
session_start();
include 'includes/db.php';


   if(!isset($_SESSION['owner_username'])){
        // include('user_login.php');
    header("location:owner_login.php ");
        }else{
        
      include 'includes/home_nav.php';  ?>
<!doctype html>  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>page details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
     label span{
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
   <body class="bg-light" >
    <div class="container py-5">
  <div class="row d-flex justify-content-center align-items-center">
    <div class="col">
      <div class="card my-4 shadow-3">
        <div class="row g-0">
          <div class="col-xl-4 d-xl-block bg-image" style="background-image: url('https://ordinaryandhappy.com/wp-content/uploads/2020/04/how-to-stop-procrastinating.jpg');">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
            
              <div class=" justify-content-center align-items-center h-100 ">
                <div class=" text-center py-3" style="margin-top: 220px;">
                  <i class="fas fa-solid fa-pager text-white fa-3x"></i>
                  <h6 class="text-white title-style font-weight-bold">Update your Page</h6>
                  <p class="text-white mb-0"></p>

                  <figure class="text-center mb-0">
                    <blockquote class="blockquote text-white">
                      <p class="pb-3">
                        <i class="fas fa-quote-left fa-xs text-light"
                          style="color: hsl(210, 100%, 50%) ;"></i>
                        <span class="lead font-italic" style="font-size:18px">Grow your Business with We Grow</span>
                        <i class="fas fa-quote-right fa-xs text-light"
                          style="color: hsl(210, 100%, 50%) ;"></i>
                      </p>
                    </blockquote>

                  </figure>
                </div>
              </div>
           
          </div>
           </div>


<div  class="container bg-white outer col-xl-8">
  <div class="card-body p-md-5 text-black">
  <div style="align-content: center;  ">
   
   <h3 class="mb-4"><strong>Update Your Page</strong></h3>
   <!-- <hr class="w-100 mb-4"> -->
</div>
<!--   <body class="bg-light">
   

<div style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);" class="container bg-white">
  <div style="background: rgb(251,255,255);
background: linear-gradient(270deg, rgba(251,255,255,1) 0%, rgba(229,231,231,1) 26%, rgba(212,214,214,1) 81%); border-width: 0px 0px 5px 0px; border-color:#74BDCB;border-style: solid; padding-left: 0px;">
    <h3 class="m-4 text-center p-3"><strong>Create your page</strong></h3>
    </div> -->
   
 <?php


  $shopnames = $_GET['shopname'];
   $showquery = "select * from `ip` where shopname='$shopnames'";

  $showdata =mysqli_query($con, $showquery);

  $arrdata=mysqli_fetch_array($showdata); 
  $old_intro_file=$arrdata['intro_file'];

   if(isset($_POST['fsub']))
    {
      $shopdupdate = $_GET['shopname'];
        $shopname = mysqli_real_escape_string($con,$_POST['shopname']);
        $domain = mysqli_real_escape_string($con,$_POST['domain']);
        $address = mysqli_real_escape_string($con,$_POST['address']);
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $links = mysqli_real_escape_string($con,$_POST['links']);
        $city = mysqli_real_escape_string($con,$_POST['city']);
        $state = mysqli_real_escape_string($con,$_POST['state']);
        $description = mysqli_real_escape_string($con,$_POST['description']);
        $discount = mysqli_real_escape_string($con,$_POST['discount']);
        
       $hiring_title = mysqli_real_escape_string($con,$_POST['hiring_title']);
        $hiring_msg = mysqli_real_escape_string($con,$_POST['hiring_msg']);
        $hiring_pay = mysqli_real_escape_string($con,$_POST['hiring_pay']);
        $lat=$_POST['lat'];
        $lng=$_POST['lng'];
        $date_created=date('Y-m-d');
        

     $intro_file = $_FILES['intro_file']['name'];
        $intro_file_temp=$_FILES['intro_file']['tmp_name'];
        unlink("./intro_images/$old_intro_file");
        move_uploaded_file($intro_file_temp,"./intro_images/intro_file");

$select_images_query="select image_name from `image_files` where shopname='$shopdupdate'";
       $result_images_query=mysqli_query($con,$select_images_query);
  if(mysqli_num_rows($result_images_query)>0){
while($images_row=mysqli_fetch_assoc($result_images_query)){
  $old_files=$images_row['image_name'];
 unlink("./other_images/$old_files");
}
}
        $files_count= count($_FILES['files']['name']);
      for ($i=0; $i < $files_count; $i++) { 
          // code...
        $file_name=$_FILES['files']['name'][$i];
        $files_temp=$_FILES['files']['tmp_name'][$i];
        move_uploaded_file($files_temp,"./other_images/$file_name");
            $images_sql="update `image_files` set shopname='$shopname', image_name='$file_name' where shopname='$shopdupdate'";
            $image_result=mysqli_query($con,$images_sql);
        
      }
if($image_result){
  
                $updatequery=" update `ip` set shopname='$shopname', domain='$domain', address='$address', phone='$phone', email='$email', links='$links', city='$city', state='$state', description='$description', discount='$discount', intro_file='$intro_file', hiring_title='$hiring_title', hiring_msg='$hiring_msg', hiring_pay='$hiring_pay', date_created='$date_created' where shopname='$shopdupdate' ";

                $result = mysqli_query($con,$updatequery);

                if($result)
                {
                      $ins="update `places` set shopname='$shopname', address='$address', lat='$lat',lng='$lng'  where shopname='$shopdupdate' ";
                     $map_query=mysqli_query($con,$ins);
                      echo "<script>window.open('display.php?shopname=$shopname','_self')</script>";
                }
                else
                {
                    die(mysqli_error($con));

                }
            }else{
                die(mysqli_error($con));
            }

        
    }

  

?>
 <form class="row g-3 mt-3" method="post" action="" enctype="multipart/form-data">
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
<label  class="form-label">Generate map cordinates for mapping </label>
  <div class="d-grid gap-2 col-md-4 mx-auto">

    <button type="button" class="btn btn-outline-success" onclick="findAddress()">Generate</button>
    
  </div>
  <div class="col-md-4">
    <input type="text" class="form-control" name="lat" id="lat" required>
  
  </div>
  <div class="col-md-4">
      <input type="text" class="form-control" name="lng" id="lng" required>
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
  <label for="exampleFormControlTextarea1" class="form-label">Product/service price list</label>
  <div>
<a href='items_update.php?shopname=<?php echo $arrdata['shopname']; ?>'><button type='button'  class='btn btn-outline-secondary'>Click Here to update Product/Service price list</button></a>
</div>
</div>


<div class="col-md-6">
   <label for="intro_file" class="form-label">Upload Introductory video/image <span>*</span></label>
  <div>
   <input type="file" class="form-control" id="intro_file" name="intro_file" >
  </div>
</div>

   
<div class="col-md-6">
   <label for="files" class="form-label">Upload other Images and Videos  </label>
  <div>

  
    <input type="file" id="files" name="files[]" class="form-control" multiple>
    
  </div>
</div>


<div class="col-md-6">
  <label for="hiring_title" class="form-label">Hiring Title</label>
  <div>
  <input type="text" class="form-control" id="hiring_title" name="hiring_title" value="<?php echo $arrdata['hiring_title']; ?>">
</div>
</div>
<div class="col-md-6">
  <label for="hiring_pay" class="form-label">Hiring Pay</label>
  <div>
  <input type="number" class="form-control" id="hiring_pay" name="hiring_pay" value="<?php echo $arrdata['hiring_pay']; ?>">
</div>
</div>
 <div class="col-md-12">
  <label for="hiring_msg" class="form-label">Hiring Message</label>
  <input type="text" class="form-control" id="hiring_msg" name="hiring_msg" value="<?php echo $arrdata['hiring_msg']; ?>">
</div>
<div class="col-md-12 mb-3">
<button type="submit" class="btn sub btn-secondary" style="margin-left: 50%;" name="fsub">Update</button>
</div>
 
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
  var address = document.querySelector("#address")

var results = document.querySelector("#results")

function showAddress() {
   // results.innerHTML  = ' ';
    var count=0;
    if (addressArr.length > 0 ) {
        addressArr.forEach(element => {
          if(count==0){

              document.getElementById("lat").value=+element.lat;
    document.getElementById("lng").value=+element.lon;
           
          }
          count++;
        });
    } 
    else {
        results.innerHTML  = "<p style='color: red;'>Not found</p>"
    }
}
// Rue Julien Peyhorgue
function findAddress() {
    var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + address.value; 
    fetch(url)
                  .then(response => response.json())
                  .then(data => addressArr = data)
                  .then(show => showAddress())
                  .catch(err => console.log(err))    
}
</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>
<?php }?>