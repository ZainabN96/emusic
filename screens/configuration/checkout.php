<?php
require '../../class/cls_db.php';

foreach ( $_POST as $name => $value ) {
	$$name = $value;
}
$user_id = $_SESSION['user'];
$date    = date( 'Y/m/d' );

$order_insert_Query = "INSERT INTO orders (user_id, owner, cvv, card_number, year, month, amount, status, cr_date)
            VALUES ('$user_id', '$owner', '$cvv', '$card_number', '$year', '$month', '$amount', '2', '$date' )";

$order_id = insert( $order_insert_Query );

if ( $order_id ) {

	$cart_select_query = "SELECT * FROM cart WHERE user_id = '$user_id'";
	$cart_Array        = select( $cart_select_query );
	foreach ( $cart_Array as $cart_record ) {

		$music_id                = $cart_record['music_id'];
		$order_item_insert_query = "INSERT INTO order_items (order_id, music_id) VALUES ('$order_id', '$music_id')";
		$id                      = insert( $order_item_insert_query );

		if ( $id ) {
			$cart_item_delete_query = "DELETE FROM cart WHERE music_id = '$music_id'";
			delete( $cart_item_delete_query );
		}
	}

	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Order Generated Successfully!';
}

header( 'location: ../pages/home.php' );
