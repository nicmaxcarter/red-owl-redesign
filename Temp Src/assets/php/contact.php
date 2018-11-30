
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


//check if form was sent
if($_POST){
	$to = "contact@redowlmail.com, codobitdev@gmail.com";
	$subject = "Contact Form Submission";
  $fname = $_POST["fname"];
  $header = "From: " . $fname;
	$email = $_POST["email"];
  $message = $_POST["message"];
  
  $content = "Name: " . $fname . "\n";
  $content .= "Email: " . $email . "\n";
  $content .= "Message: " . $message . "\n";

	//honey pot field
	$honeypot = $_POST["firstname"];
	//check if the honeypot field is filled out. If not, send a mail.
	if( strlen($honeypot) > 0 ){
    echo 'error';
	}else{
    mail( $to, $subject, $content, $header );
    
    // Redirect to a thank you page
    header("Location: ../../thank-you.html");
	}
}


?>