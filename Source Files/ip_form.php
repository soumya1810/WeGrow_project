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
    <title>page details form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
.outer{
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
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
                  <h6 class="text-white title-style font-weight-bold">Create your Dream Page</h6>
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
   
   <h3 class="mb-4"><strong>Create Your Page</strong></h3>
   <!-- <hr class="w-100 mb-4"> -->
</div>
    <form class="row g-3 mt-3" method="post" action="" enctype="multipart/form-data">
     

  <div class="col-md-6">
    <label for="shopname" class="form-label">Shop Name <span>*</span></label>
    <input type="text" class="form-control" id="shopname" name="shopname" value="xyz" required>
  </div>

  
  <div class="col-md-6">
    <label for="domain" class="form-label">Domain <span>*</span></label>
    <select class="form-select" aria-label="Default select example" id="domain" name="domain" required>
  <option value="" selected disabled>Select Domain</option>
  <?php
   $select_query="select * from `categories`";
               $result_query=mysqli_query($con,$select_query);
               while($row=mysqli_fetch_assoc($result_query)){
                $category_title=$row['category_title'];
                $category_id=$row['category_id'];
                echo "<option value='$category_title'>$category_title</option>";
              }
  ?>
  


</select>
  </div>
  <div class="col-12">
    <label for="address" class="form-label">Address <span>*</span></label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="xyz" required>
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
    <input type="text" class="form-control" id="phone" name="phone" value="+91 " required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email <span>*</span></label>
    <input type="email" class="form-control" id="email" name="email" value="xyz@gmail.com" required>
  </div>
    <div class="col-12">
    <label for="links" class="form-label">Website Link and Other Links</label>
    <input type="text" class="form-control" id="links" name="links" placeholder="Add Links" value="https://xyz.com">
  </div>
  <div class="col-md-6">
    <label for="city" class="form-label">City <span>*</span></label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"  value="xyz" required >
  </div>
  <div class="col-md-6">
    <label for="state" class="form-label">State <span>*</span></label>
      <select class="form-select" aria-label="Default select example" id="state" name="state" required>
        <option value="" selected disabled>Select State</option>
        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttarakhand</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
      </select>
    </div>
   
  
    <div class="col-md-12">
  <label for="description" class="form-label">Description <span>*</span></label>
  <textarea class="form-control"  rows="3" id="description" name="description" required></textarea>
</div>
  <div class="col-md-12">
  <label for="discount" class="form-label">Message for Discount Banner</label>
  <textarea class="form-control" id="discount" name="discount" rows="3" ></textarea>
</div>
 <div class="col-md-12">
  <label for="exampleFormControlTextarea1" class="form-label">Product/service price list</label>
  <div>
    <?php
if(isset($_GET['owner_uname'])){
  $owner_uname=$_GET['owner_uname'];
echo "<a href='items_form.php?owner_uname=$owner_uname'><button type='button'  class='btn btn-outline-secondary'>Click Here to create Product/Service price list</button></a>";

}?>
</div>
</div>
<div class="col-md-6">
   <label for="intro_file" class="form-label">Upload Introductory video/image <span>*</span></label>
  <div>
    <input type="file" id="intro_file" name="intro_file" class="form-control" required >
  </div>
</div>
<div class="col-md-6">
   <label for="files" class="form-label">Upload other Images and Videos  </label>
  <div>
    <input type="file" id="files" name="files[]" class="form-control" multiple>
  </div>
</div>
 <div class="col-md-12">
  <label for="hiring_msg" class="form-label">Hiring Details</label>
 <div class="row mb-2">
  <div class="col-md-6">
   
    <input type="text" class="form-control" id="hiring_title" name="hiring_title" value="123" placeholder="Job title">
  </div>
  <div class="col-md-6">
   
    <input type="number" class="form-control" id="hiring_pay" name="hiring_pay" value="xyz@gmail.com" placeholder="Job Pay">
  </div>
</div>
  <textarea class="form-control" id="hiring_msg" name="hiring_msg" rows="3" ></textarea>
</div>
<div class="col-md-12 mb-3">
<button type="submit" class="btn sub btn-secondary" style="margin-left: 50%; " name="fsub">Submit</button>

</div>

 <div class="text-center">
                   <?php require_once 'ip_back.php' ?>
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