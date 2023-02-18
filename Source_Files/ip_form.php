<?php include 'includes/db.php';?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>page details form</title>
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
.outer{
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}
.inner{
  background: rgb(251,255,255);
background: linear-gradient(270deg, rgba(251,255,255,1) 0%, rgba(229,231,231,1) 26%, rgba(212,214,214,1) 81%); border-width: 0px 0px 5px 0px; border-color:#74BDCB;border-style: solid; padding-left: 0px;
}
    </style>
  </head>
  <body class="bg-light">
     <?php require_once 'includes/navigation.php' ?>

<div  class="container bg-white outer">
  <div class="inner" >
    <h3 class="m-4 text-center p-3"><strong>Create your page</strong></h3>
    </div>

    <form class="row g-3 mt-3" method="post" action="display_data.php">
     

  <div class="col-md-6">
    <label for="shopname" class="form-label">Shop Name <span>*</span></label>
    <input type="text" class="form-control" id="shopname" name="shopname" required>
  </div>

  
  <div class="col-md-6">
    <label for="domain" class="form-label">Domain <span>*</span></label>
    <select class="form-select" aria-label="Default select example" id="domain" name="domain" required>
  <option selected disabled>Select Domain</option>
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
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
  </div>
  <div class="col-md-6">
    <label for="phone" class="form-label">Phone <span>*</span></label>
    <input type="text" class="form-control" id="phone" name="phone" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email <span>*</span></label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
    <div class="col-12">
    <label for="links" class="form-label">Website Link and Other Links</label>
    <input type="text" class="form-control" id="links" name="links" placeholder="Add Links">
  </div>
  <div class="col-md-6">
    <label for="city" class="form-label">City <span>*</span></label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
  </div>
  <div class="col-md-6">
    <label for="state" class="form-label">State <span>*</span></label>
      <select class="form-select" aria-label="Default select example" id="state" name="state" required>
        <option selected disabled>Select State</option>
        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
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
<option value="Uttaranchal">Uttaranchal</option>
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
  <textarea class="form-control" id="discount" name="discount" rows="3"></textarea>
</div>
 <div class="col-md-12">
  <label for="exampleFormControlTextarea1" class="form-label">Product/service price list</label>
  <div>
<a href="prices.html"><button type="button" href="prices.html" class="btn btn-outline-secondary">Click Here to create Product/Service price list</button></a>
</div>
</div>
<div class="col-md-6">
   <label for="intro_file" class="form-label">Upload Introductory video/image <span>*</span></label>
  <div>
    <input type="file" id="intro_file" name="intro_file" required>
  </div>
</div>
<div class="col-md-6">
   <label for="files" class="form-label">Upload other Images and Videos  </label>
  <div>
    <input type="file" id="files" name="files" multiple>
  </div>
</div>
 <div class="col-md-12">
  <label for="hiring_msg" class="form-label">Hiring Message</label>
  <textarea class="form-control" id="hiring_msg" name="hiring_msg" rows="3"></textarea>
</div>
<div class="col-md-12 mb-3">
<button type="submit" class="btn sub btn-secondary" style="margin-left: 50%; " name="fsub">Submit</button>

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