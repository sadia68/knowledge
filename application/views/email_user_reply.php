<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'temail834@gmail.com';          // SMTP username
$mail->Password = 'ra123456'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('', 'Knowledge');
$mail->addReplyTo('', 'Knowledge');
// $mail->addAddress(''.$user_email.'');   // Add a recipient
$mail->addAddress(''.$email.'');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');


$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = $message;
$mail->Subject = 'Message from Knowledge';
$mail->Body    = $bodyContent;
 // echo 1; exit;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	exit;
} else {
    echo 'Message has been sent';
}

?>
