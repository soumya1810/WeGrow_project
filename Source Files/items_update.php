
<?php 
session_start();
include 'includes/db.php';

include 'includes/home_nav.php';
  
        $i=1;

        
        ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products/Services</title>
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
      <th scope="col">Remove</th>

			
		</tr>
	</thead>
		<tbody id="tbody" >
			<?php
if(isset($_GET['shopname'])){
  $shopname=$_GET['shopname'];
$select_query_1="select retail_id from `retail_list` where shopname='$shopname'";
$result_query_1=mysqli_query($con,$select_query_1);
while($row_1=mysqli_fetch_assoc($result_query_1)){
  $retail_id=$row_1['retail_id'];

 $select_query_2="select * from `items` where retail_id='$retail_id'";
$result_query_2=mysqli_query($con,$select_query_2);

while($itemdata=mysqli_fetch_array($result_query_2)){

// $item_name_1=$itemdata['item_name'];
// $item_category_1=$itemdata['item_category'];
// $item_cost_1=$itemdata['item_cost'];  
if(isset($_POST['add_retail']))
    {
      $shopname_1 = $_GET['shopname'];
        
       for ($a = 0; $a < count($_POST["item_name"]); $a++)
    {
      
      $sql = "UPDATE items SET retail_id='$retail_id', item_name='" . $_POST["item_name"][$a] . "',item_category='" . $_POST["item_category"][$a] . "',item_cost='" . $_POST["item_cost"][$a] . "' WHERE retail_id='retail_id'";
    
    }
     $result =   mysqli_query($con, $sql);

 if($result)
                {
                       echo "<script>window.open('display.php?shopname=$shopname_1','_self')</script>";

                }
                else
                {
                     die(mysqli_error($con));
                }
              }

  	?>
    
			  <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><input type="text" class="form-control"  name='item_name[]' value="<?php echo $itemdata['item_name']; ?>"></td>
                        <td><input type="text" class="form-control"  name='item_category[]' value="<?php echo $itemdata['item_category']; ?>"></td>
                        <td><input type="text" class="form-control"  name='item_cost[]' value="<?php echo $itemdata['item_cost']; ?>"></td>
                        <td><button type='button' onclick='deleteRow(this);' class='btn btn-outline-danger'>Remove</button></td>
                        
                        
                      </tr>
                     <?php }}}?>
			
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
<div class="mt-4 ">
  <button type="button" class="btn btn-primary ml-5" onclick="add_item();">Add Item</button>
  <input type="submit" class="btn btn-primary" name="add_retail" value="Update" >
</div>
</form>
</div>

<script>
  var items = <?php echo $i++ ;?>;
  function add_item() {
   
    var html = "<tr>";
      html += "<td >" + items + "</td>";
      html += "<td><input type='text' class='form-control' name='item_name[]'></td>";
      html += "<td><input type='text' class='form-control' name='item_category[]'></td>";
      html += "<td><input type='text' class='form-control' name='item_cost[]'></td>";
            html += "<td><button type='button' onclick='deleteRow(this);' class='btn btn-outline-danger'>Remove</button></td>"
    html += "</tr>";
 items++;

    var row = document.getElementById("tbody").insertRow();
    row.innerHTML = html;
  }

function deleteRow(button) {
    
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
    items--;
}
</script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>