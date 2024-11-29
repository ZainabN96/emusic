<?php
require '../../class/cls_db.php';

$music_id = $_GET['mid'];
$delete_Query = "DELETE FROM cart WHERE music_id = '$music_id'";

$id = delete( $delete_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Deleted from Cart!';
}

header( 'location: ../pages/cart.php' );
