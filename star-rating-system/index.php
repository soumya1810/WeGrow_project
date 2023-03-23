<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>phpzag.com : Demo Star Rating System with Ajax, PHP and MySQL</title>
<script src="js/rating.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="">
<div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="http://www.phpzag.com" class="navbar-brand">PHPZAG.COM</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.phpzag.com">Home</a></li>
           
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>
<div class="container">		
	<h2>Example: Star Rating System with Ajax, PHP and MySQL</h2>
	<?php
$user_username = '';
$show = '';
if(!empty($_SESSION['user_id']) && $_SESSION['user_id']) {
	$user_username =  $_SESSION['user_username'];		
} else {
	$show = 'hidden';
}
?>	
<br>
<span><a href="index.php">Home</span>
<div id="loggedPanel" class="<?php echo $show; ?>">
	Logged in <span id="loggedUser" class="logged-user"><?php echo $user_username; ?></span>
	<a href="rating_action.php?action=logout">Logout</a>
</div>
<br><br><br>
	<?php
	include 'class/Rating_functions.php';
	$rating = new Rating();
	$shopList = $rating->getshopList();
	foreach($shopList as $item){
		$average = $rating->getRatingAverage($item["shopname"]);
	?>	
	<div class="row">
		<div class="col-sm-2" style="width:150px">
			<img class="product_image" src="imgs/<?php echo $item["intro_file"]; ?>" style="width:100px;height:200px;padding-top:10px;">
		</div>
		<div class="col-sm-4">
		<h4 style="margin-top:10px;"><?php echo $item["shopname"]; ?></h4>
		<div><span class="average"><?php printf('%.1f', $average); ?> <small>/ 5</small></span> <span class="rating-reviews"><a href="show_rating.php?shopname=<?php echo $item["shopname"]; ?>">Rating & Reviews</a></span></div>
		<?php echo $item["description"]; ?>		
		</div>		
	</div>
	<?php } ?>	
</div>	
</div>	
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body></html>






