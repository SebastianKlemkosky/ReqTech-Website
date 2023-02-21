<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = "This is a Test of PHP Contact Form";

$mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "sebs.klemkoskyalt@gmail.com";

mail($recipient, $subject, $message, $mailheader) or die("Error!");


echo "<!DOCTYPE html>
<html>
  <head>
    <title>ReqTech</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link
    rel='stylesheet'
    href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'
    integrity='sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay'
    crossorigin='anonymous'
    />  
  </head>
  <body>
    <header>
      
    </header>


    <!-- Start Message -->
    <section id='message' class='contact'>
      <h2>Thank you for contacting</h2>
      <p>We will get back to you as soon as possible</p>
      <p class='back'>Go back to the <a href='index.html'>home page</a></p>
    </section>
    <!-- End Message -->

   
  </body>
</html>";

?>
