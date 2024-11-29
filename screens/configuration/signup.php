<?php
require '../../class/cls_db.php';

foreach ( $_POST as $name => $value ) {
	$$name = $value;
}

$emailCheckQuery = "SELECT * FROM users where email = '$email'";
$emailCheck      = total( $emailCheckQuery );

if ( $emailCheck > 0 ) {
	$_SESSION['msg-class'] = 'danger';
	$_SESSION['msg-text']  = 'Email already existed! Try another one.';
    header( 'location: ../pages/signup.php' );
    exit;
}

$user_image = upload( 'user_image', '../../images/profile/' );
$password   = base64_encode( base64_encode( $password ) );

$Insert_Query = "INSERT INTO users (user_name, user_type, email, password, user_image, status)
            VALUES ('$username', '2' , '$email' ,'$password', '$user_image', '1' )";

$id = insert( $Insert_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Account registered Successfully! Login for Access ';
	header( 'location: ../pages/login.php' );
} else {
	header( 'location: ../pages/signup.php' );
}
