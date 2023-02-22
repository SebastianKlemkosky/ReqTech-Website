<?php
// Set the recipient email address
$to = "sebastianklemkosky@gmail.com";

// Get the form fields
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Format the email message
$subject = "New Contact Form Submission";
$body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

// Set the email headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

// Send the email
if (mail($to, $subject, $body, $headers)) {
    // If the email was sent successfully, redirect to a thank-you page
    
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
    exit;
} else {
    // If there was an error sending the email, display an error message
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
      <h2>There was an error sending your message</h2>
      <p>Please try again later</p>
      <p class='back'>Go back to the <a href='index.html'>home page</a></p>
    </section>
    <!-- End Message -->

   
  </body>
</html>";
}
?>




