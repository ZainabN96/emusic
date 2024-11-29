<?php
require '../../class/cls_db.php';

foreach ( $_POST as $name => $value ) {
	$$name = $value;
}

$emailCheckQuery = "SELECT * FROM users WHERE email = '$email' AND user_id != '$user_id'";
$emailCheck      = total( $emailCheckQuery );

if ( $emailCheck > 1 ) {
	$_SESSION['msg-class'] = 'danger';
	$_SESSION['msg-text']  = 'Email already existed! Try another one.';
	header( 'location: ../pages/profile.php' );
}

// update
$user_select_Query = "SELECT * FROM users where user_id = '$user_id'";
$selected_array    = select( $user_select_Query );
$record            = mysqli_fetch_array( $selected_array );

$user_image = upload( 'user_image', '../../images/profile/', $record['user_image'] );

$password   = base64_encode( base64_encode( $password ) );

echo $Update_Query = "Update users SET user_name= '$username', email = '$email', password = '$password', user_image = '$user_image' where user_id = '$user_id'";

$id = update( $Update_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Account Updated Successfully!';
	header( 'location: ../pages/profile.php' );
} else {
	header( 'location: ../pages/profile.php' );
}
