<?php 
include 'includes/db.php';
include 'includes/home_nav.php';
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
    
<?php


if(isset($_GET['owner_uname'])){
  $owner_uname=$_GET['owner_uname'];
	if (isset($_POST["add_retail"]))
	{
		$shopname = $_POST["shopname"];

		$sql = "INSERT INTO retail_list (shopname) VALUES ('$shopname')";
		mysqli_query($con, $sql);
		$retail_id = mysqli_insert_id($con);
		

		for ($a = 0; $a < count($_POST["item_name"]); $a++)
		{
			$sql = "INSERT INTO items (retail_id, item_name, item_category, item_cost) VALUES ('$retail_id', '" . $_POST["item_name"][$a] . "', '" . $_POST["item_category"][$a] . "', '" . $_POST["item_cost"][$a] . "')";
			mysqli_query($con, $sql);
		}

		// echo "<p>Items have been added.</p>";
		echo "<script>alert('List created successfully.')</script>";
    echo "<script>window.open('ip_form.php?owner_uname=$owner_uname','_self')</script>";
	}
}
?>
 
<div class="container" >
	<header class="bg-white mt-4 p-4"><h5><strong><span class="fa"><i class="fa-solid fa-clipboard"></i> &nbsp;</span>PRODUCT/SERVICE LIST</strong></h5></header>
<form method="POST" action="" >

	<div class="col-md-4 mb-5">

<input type='text' name='shopname' class='mb-4 p-3 mt-4 form-control' id='shopname' placeholder="Enter Store/Service Name"  required>


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
			<th scope="col">Remove Item</th>
		</tr>
	</thead>
		<tbody id="tbody" ></tbody>
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
	<input type="submit" class="btn btn-primary" name="add_retail" value="Submit" >
</div>
</form>
</div>
<script>
	var items = 0;
	function add_item() {
		items++;

		var html = "<tr>";
			html += "<td class='text-center'>" + items + "</td>";
			html += "<td><input type='text' class='form-control' name='item_name[]'></td>";
			html += "<td><input type='text' class='form-control' name='item_category[]'></td>";
			html += "<td><input type='text' class='form-control' name='item_cost[]'></td>";
            html += "<td><button type='button' onclick='deleteRow(this);' class='btn btn-outline-danger'>Remove</button></td>"
		html += "</tr>";

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