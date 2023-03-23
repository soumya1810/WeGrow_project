<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","root","","wegrow");
//  $con = mysqli_connect("wegrow-server.mysql.database.azure.com
// ","wegrow_admin","Capstone123@azure","wegrow");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>