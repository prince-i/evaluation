<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$emailAddress = trim($_GET['email_add']);
$fullname = $_GET['name'];
$otp = trim($_GET['otp']);
$otp = hex2bin($otp); ##DECODE HEXADECIMAL TO GET VALID OTP
$type = $_GET['type'];

require 'vendor/autoload.php'; ## AUTOLOAD ALL COMPONENTS MAILER
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 1;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'pytp731@gmail.com';                     // SMTP username
    $mail->Password   = 'premium1234';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('pytp731@gmail.com', 'CCC Evalutation System');
    $mail->addAddress($emailAddress, $fullname);     // Add a recipient
    // $mail->addAddress('');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('');
    // $mail->addBCC('');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'OTP - CCC EVALUATION SYSTEM';
    $mail->Body = '
    <h1>New login detected!</h1><br>
    <p>To confirm login, verify your account using given OTP below.</p>
    <h2>OTP: '.$otp.'</h2><br>
    <p>Best,<br>CCC EVALUATION SYSTEM TEAM</p>';
    $mail->AltBody = 'OTP';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


##MULTI_OPTION REDIRECTION
if($type == 'student'){
    header('location:../../student/account.php');
}

if($type == 'superior'){
    header('location:../../superior/account.php');
}

if($type == 'admin'){
    header('location:../../admin/index.php');
}
if($type == 'peer'){
    header('location:../../peer/index.php');
}
?>