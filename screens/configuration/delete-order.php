<?php
require '../../class/cls_db.php';

$order_id = $_GET['order_id'];
$delete_Query = "DELETE FROM orders WHERE order_id = '$order_id'";

$id = delete( $delete_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Order Deleted!';
}

header( 'location: ../pages/profile.php' );
