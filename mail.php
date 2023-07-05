<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["submit"])) {

    $name = $_POST["name"];  
    $email = $_POST["email"]; 
    $phone = $_POST["phone"]; 
    $message = $_POST["message"];   

    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kanekarsanjeet@gmail.com';                     //SMTP username
    $mail->Password   = 'viwlgmocaugzxwub';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you 

    $mail->setFrom($email);

    $mail->addAddress($email);     //Add a recipient

    $mail->isHTML(true); 

    $mail->Subject = "Enquiry By ".$name;
    $mail->Body    =  "<html>
    <body>
        <p><b>	Dear Admin,</b></p>
        <p>Following are the details of the enquiry:</p>
        <p>
            <b>Customer Name:</b> ".$name."<br>
            <b>Customer Contact Number:</b> ".$phone."<br>
            <b>Customer Email:</b> ".$email."<br>
            <b>Message from Customer:</b> ".$message."
        </p>
    </body>
    </html>";
    try {
        $mail->send();  
        echo "<script>alert('We will get back to you soon!')</script>";
        echo "<script>window.location='index.html'</script>";          

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

?>