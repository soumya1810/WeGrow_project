<?php
session_start();
include 'class/Rating_functions.php';
$rating = new Rating();
if(!empty($_POST['action']) && $_POST['action'] == 'userLogin') {
	$user = $_POST['user'];
	// $pass = $_POST['pass'];
	$loginDetails = $rating->userLogin($user);	
	$loginStatus = 0;
	$user_username = "";
	if (!empty($loginDetails)) {
		$loginStatus = 1;
		$_SESSION['user_id'] = $loginDetails[0]['user_id'];
		$_SESSION['user_username'] = $loginDetails[0]['user_username'];		
		$user_username = $loginDetails[0]['user_username'];
	}		
	$data = array(
		"user_username" => $user_username,
		"success"	=> $loginStatus,	
	);
	echo json_encode($data);	
}
if(!empty($_POST['action']) && $_POST['action'] == 'saveRating' 
	&& !empty($_SESSION['user_id']) 
	&& !empty($_POST['rating']) ) {
		$user_id = $_SESSION['user_id'];	
		$rating->saveRating($_POST, $user_id);	
		$data = array(
			"success"	=> 1,	
		);
		echo json_encode($data);		
}
if(!empty($_GET['action']) && $_GET['action'] == 'logout') {
	session_unset();
	session_destroy();
	header("Location:index.php");
}
?>