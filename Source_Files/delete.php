<?php

$mysqli = new mysqli('localhost', 'root', '', 'wegrow');

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$id = $_GET['idth'];
$deletequery = " delete from ip where id=$id ";
$dquery =mysqli_query($mysqli, $deletequery);

header('location:ip_update.php');
?>
