
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
    <title>Porducts/Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</style>
  </head>
  <body  style="background-color: #f5f7fa;">
  	

 
<div class="container" >
	<header class="bg-white mt-4 p-4"><h5><strong><span class="fa"><i class="fa-solid fa-clipboard"></i> &nbsp;</span>PRODUCT/SERVICE LIST</strong></h5></header>
<form method="POST" action="" >

	<div class="col-md-4 mb-5">




</div>
<section class="intro">
  <div class="bg-image h-100" >
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                	
	
	<table class="table table-striped mb-0 ">
		<thead style="background-color: #307582;">
		<tr>
			<th scope="col">Sno.</th>
			<th scope="col">Item Name</th>
			<th scope="col">Item Category</th>
			<th scope="col">Item Cost</th>
			
		</tr>
	</thead>
		<tbody id="tbody" >
			<?php
if(isset($_GET['retail_id'])){
$retail_id=$_GET['retail_id'];
$select_query="select * from `items` where retail_id=$retail_id order by item_category";
 $result_query=mysqli_query($con,$select_query);
    $i=1;
while($row=mysqli_fetch_assoc($result_query)){

 
  $item_name=$row['item_name'];
  $item_category=$row['item_category'];
  $item_cost=$row['item_cost'];
  
  	?>
    
			  <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><?php echo "$item_name";?></td>
                        <td><?php echo "$item_category";?></td>
                        <td><?php echo "$item_cost";?></td>
                        
                      </tr>
                      <?php }} ?>
			
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

</form>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>