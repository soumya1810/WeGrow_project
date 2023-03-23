
		<?php


  include 'includes/db.php'; 


    $message = '<div>
     <p><b>Hello!</b></p>
     <p>Thank you for staying connect with WeGrow.</p>
     <p>You are kindly requested to update your store page with the recent details.</p>
     <br>
    
     <p>If all the details have already been updated till date then no further updation is required.</p><br><br>
      <p>Thank You</p>
     <p>Regards, </p>
     <p>Team WeGrow</p>
    </div>';

include_once("SMTP/src/PHPMailer.php");
include_once("SMTP/src/SMTP.php");
// $email = $owner_email; 
  $mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "soumyasingh.2019@vitbhopal.ac.in";   //Enter your username/emailid
$mail->Password = "glpbkkvqdvmecqrm";   //Enter your password
$mail->FromName = "WeGrow";

$select_query="Select owner_email from `owners`";
$result_query=mysqli_query($con,$select_query);

while ($row=mysqli_fetch_assoc($result_query)) {
  $mail->addBCC($row['owner_email']);
}
// $mail->AddAddress($email);
$mail->Subject = "Updation Reminder";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  
  
}




?> 

