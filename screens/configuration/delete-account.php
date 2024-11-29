<?php
require '../../class/cls_db.php';

$user_id = $_SESSION['user'];
$delete_Query = "DELETE FROM users WHERE user_id = '$user_id'";

$id = delete( $delete_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Your account Deleted!';
}

header( 'location: ../pages/logout.php' );
