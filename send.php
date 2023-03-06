<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize inputs
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Validate inputs
    $errors = array();

    if (empty($name)) {
        $errors["name"] = "Please enter your name.";
    }

    if (empty($email)) {
        $errors["email"] = "Please enter your email address.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please enter a valid email address.";
    }

    if (empty($message)) {
        $errors["message"] = "Please enter a message.";
    }
    
    // Set the recipient email address
    $to = 'Rudy@Reqtech.net, reqtech.website@gmail.com';


    // Set the email subject
    $subject = "ReqTech Contact Form Submission. This was sent on ".date('M d, Y, h:i:sp', time());;

    // Set the email message
    $message = "Name: $name\nEmail: $email\nMessage: $message";

    // Set the email headers
    $headers = "From: $email\r\nReply-To: $email\r\n"  . "X-Mailer: php"; //mail headers

    // Send the email

    if(count($errors) == 0){

        if (mail($to, $subject, $message, $headers)) {
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
              <body class='parallax'>
               <main>
                <!-- Start Message -->
                <section id='message' class='contact border'>
                    <h2>Thank you for contacting</h2>
                    <p>We will get back to you as soon as possible</p>
                    <p class='back'>Go back to the <a href='index.html'>home page</a></p>
                </section>
                <!-- End Message -->
               </main>
              </body>
                 
            </html>";
        }else{

            // If the email was not sent successfully, send it to a backup email address
            $backup_email = 'reqtech.website@gmail.com';
            $backup_subject = "Backup ReqTech Contact Form Submission. This was sent on ".date('M d, Y, h:i:sp', time());
            $headers = "From: $email\r\nReply-To: $email\r\n"  . "X-Mailer: PHP/" . phpversion() . "\r\n" .
            "X-Backup-Email: " . $backup_email; //mail headers;
            
            mail($backup_email, $backup_subject, $message, $headers);
           

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
              <body class='parallax'>
               <main>
                <!-- Start Message -->
                <section id='message' class='contact border'>
                    <h2>Thank you for contacting</h2>
                    <p>We will get back to you as soon as possible</p>
                    <p class='back'>Go back to the <a href='index.html'>home page</a></p>
                </section>
                <!-- End Message -->
               </main>
              </body>
                 
            </html>";


        }

    }else{
        // Output error messages and add CSS class to invalid inputs
        echo '<ul class="error-list">';
        foreach ($errors as $field => $error) {
            echo '<li>' . $error . '</li>';
            echo '<script>document.getElementById("' . $field . '").classList.add("invalid");</script>';
        }

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
          <body class='parallax'>
           <main>
            <!-- Start Message -->
            <section id='message' class='contact border'>
                <h2>Thank you for contacting</h2>
                <p>We will get back to you as soon as possible</p>
                <p class='back'>Go back to the <a href='index.html'>home page</a></p>
            </section>
            <!-- End Message -->
           </main>
          </body>
             
        </html>";
    }
    
}
?>