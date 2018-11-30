
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


//check if form was sent
if($_POST){
	$to = "contact@redowlmail.com, codobitdev@gmail.com";
  $subject = "Application Form Submission";
  $loc = $_POST["loc"];
  $firstname = $_POST["first-name"];
  $lastname = $_POST["last-name"];
  $header = "From: " . $firstname;
	$email = $_POST["email"];
	$phone = $_POST["cell-number"];
  $experience = $_POST["experience"];
  $about = $_POST["about-you"];
  
  $content = "Location: " . $loc . "\n\n";
  $content .= "Name: " . $firstname . " " . $lastname .  "\n";
  $content .= "Email: " . $email . "\n";
  $content .= "Cell Phone: " . $phone . "\n\n";
  $content .= "Experience: " . $experience . "\n\n";
  $content .= "About: " . $about . "\n";

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