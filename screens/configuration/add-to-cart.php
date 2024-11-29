<?php
require '../../class/cls_db.php';

if ( ! isset( $_SESSION['user'] ) ) {
    header( 'location: ../pages/login.php' );
    exit;
}

$music_id = $_GET['mid'];
$user_id  = $_SESSION['user'];

$Insert_Query = "INSERT INTO cart (user_id, music_id)
            VALUES ('$user_id' ,'$music_id' )";

$id = insert( $Insert_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Music add to cart!';
}

header( 'location: ../pages/cart.php' );
