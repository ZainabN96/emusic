<?php
require '../../class/cls_db.php';

$music_id = $_GET['mid'];
$user_id  = $_SESSION['user'];

$Insert_Query = "INSERT INTO favorite_music (user_id, music_id, status)
            VALUES ('$user_id' ,'$music_id', '1' )";

$id = insert( $Insert_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Music add to Favorite list!';
}

header( 'location: ../pages/wishlist.php' );
