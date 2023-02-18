<?php 

//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'root', '', 'wegrow');

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

    // require_once('config.php');

    if(isset($_POST['fsub']))
    {
        $shopname = mysqli_real_escape_string($mysqli,$_POST['shopname']);
        $domain = mysqli_real_escape_string($mysqli,$_POST['domain']);
        $address = mysqli_real_escape_string($mysqli,$_POST['address']);
        $phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
        $email = mysqli_real_escape_string($mysqli,$_POST['email']);
        $links = mysqli_real_escape_string($mysqli,$_POST['links']);
        $city = mysqli_real_escape_string($mysqli,$_POST['city']);
        $state = mysqli_real_escape_string($mysqli,$_POST['state']);
        $description = mysqli_real_escape_string($mysqli,$_POST['description']);
        $discount = mysqli_real_escape_string($mysqli,$_POST['discount']);
        $intro_file = mysqli_real_escape_string($mysqli,$_POST['intro_file']);
        $files = mysqli_real_escape_string($mysqli,$_POST['files']);
        $hiring_msg = mysqli_real_escape_string($mysqli,$_POST['hiring_msg']);
        

        if(empty($shopname) || empty($domain) || empty($address) || empty($phone) || empty($email) || empty($links) || empty($city) || empty($state)  || empty($description) || empty($discount) || empty($intro_file) || empty($files) || empty($hiring_msg))
        {
            echo ' Please Fill in the Details ';
        }
        else
        {
            
                $query = "insert into ip (shopname,domain,address,phone,email,links,city,state,description,discount,intro_file,files,hiring_msg) values ('$shopname','$domain','$address','$phone','$email' ,'$links' ,'$city','$state','$description','$discount','$intro_file','$files','$hiring_msg')";
                $result = mysqli_query($mysqli,$query);

                if($result)
                {
                     // echo ' Your Page will be created soon. ';
                }
                else
                {
                    echo ' Please Check Your Details Again';
                }
            
        }
    }


?>