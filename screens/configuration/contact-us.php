<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load files
require '../../mailer/src/Exception.php';
require '../../mailer/src/PHPMailer.php';
require '../../mailer/src/SMTP.php';
require '../../mailer/mail_conf.php';

$mail = new PHPMailer( true );

$sender_email = $_POST['email'];
$sender_name = $_POST['name'];
$sender_msg = $_POST['message'];

try {
	// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host       = Host;
	$mail->SMTPAuth   = true;
	$mail->Username   = Username;
	$mail->Password   = Password;
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port       = 587;

	// Recipients
	$mail->setFrom( Username , 'E Music' );
	$mail->addAddress( Username , 'Mutahir Shaikh' );
	$mail->addReplyTo( $sender_email, $sender_name );

	// Content
	$mail->isHTML( true );
	$mail->Subject = $sender_name;
	$mail->Body    = $sender_msg;

    $mail->send();
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Message received! Please wait until we contact you on provided email.';
} catch ( Exception $e ) {
    $_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header('location: ../pages/contactus.php');
