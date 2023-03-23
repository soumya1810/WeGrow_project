
<?php 
session_start();
// unset($_SESSION['user_username']);
session_unset();
header("location:home.php?logout=true");

?>