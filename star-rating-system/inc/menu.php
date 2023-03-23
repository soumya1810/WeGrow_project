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
	<a href="action.php?action=logout">Logout</a>
</div>
<br><br><br>