<?php
require '../../class/cls_db.php';

foreach ( $_POST as $name => $value ) {
	$$name = $value;
}

$Insert_Query = "INSERT INTO music_reviews (review_txt, user_id, music_id, status)
            VALUES ('$review_text', '$user_id' ,'$music_id', '1' )";

$id = insert( $Insert_Query );

if ( $id ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Thanks for your Feedback!';
}

header( 'location: ../pages/song.php?mid=' . $music_id );
