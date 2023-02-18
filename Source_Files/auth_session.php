<?php
    session_start();
    if(!isset($_SESSION["name"])) {
        header("Location: owner_login.php");
        exit();
    }
?>