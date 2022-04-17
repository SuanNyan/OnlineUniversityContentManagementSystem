<?php

include 'mail/PHPMailer.php';
include 'mail/SMTP.php';

$mail = new PHPMailer(true);

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'ed9c5f3dd2989a';                     // SMTP username
$mail->Password   = '155a7b5eec30ef';                               // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//Recipients
$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress($_POST['toEmail'], 'John Doe');     // Add a recipient
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

// Attachments
$mail->addAttachment('files/file.docx', 'article1.docx'); // Add attachments   // Optional name

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $_POST['subject'];
$mail->Body    = $_POST['body'];

try {
    $mail->send();
    header("Location: index.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}