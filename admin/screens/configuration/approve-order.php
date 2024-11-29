<?php
require '../../../class/cls_db.php';

$order_id = $_GET['order_id'];
$user_id  = getCustomField( 'user_id', 'orders', 'order_id', $order_id );

$order_update_Query = "UPDATE orders SET status = '1' WHERE order_id = '$order_id'";
$update             = update( $order_update_Query );

if ( $update ) {

	$order_items_select_query = "SELECT * FROM order_items WHERE order_id = '$order_id'";
	$order_items_Array        = select( $order_items_select_query );
	foreach ( $order_items_Array as $order_item_record ) {

		$music_id                      = $order_item_record['music_id'];
		$music_permission_insert_query = "INSERT INTO music_permission (user_id, music_id) VALUES ('$user_id', '$music_id')";
		$id                            = insert( $music_permission_insert_query );
	}

	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Order Generated Successfully!';
}

header( 'location: ../pages/list-orders.php' );
