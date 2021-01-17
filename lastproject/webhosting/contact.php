<?php

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$message = $_POST['message'];
$embg = $_POST['embg'];

$email_from = 'sekohattrick@hotmail.com';
$email_subject = "NASLOV";
$email_body = "Name: $name.\n".
	          "Surname: $surname.\n".		
               "Email: $visitor_email.\n".
	          "Embg: $embg.\n".	
	          "Message: $message.\n".	
			  
$to = "sekohattrick@hotmail.com";

$headers = "From: $email_from \r\n";

$headers .= "Reply_to: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);
 header("Location: https://formazareg.000webhostapp.com/");
?>
