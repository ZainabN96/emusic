<?php
	require '../../../url.php';
	require '../../../class/cls_db.php';
	$table        = $_GET['tbl'];
	$conditionCol = $_GET['conditionCol'];
	$conditionVal = $_GET['conditionVal'];
	$location     = $_SERVER['HTTP_REFERER'];

if ( $table == 'music' ) {
	$img      = getCustomField( 'music_image', $table, $conditionCol, $conditionVal );
	$img_path = '../../../images/music/' . $img;
	unlink( $img_path );

	$file      = getCustomField( 'music_file', $table, $conditionCol, $conditionVal );
	$file_path = '../../../images/music/songs/' . $file;
	unlink( $file_path );
} elseif ( $table == 'music_category' ) {
	$musicQuery    = "SELECT * FROM music WHERE music_category = $conditionVal";
	$selectedMusic = select( $musicQuery );
	foreach ( $selectedMusic as $Record ) {
		$img      = getCustomField( 'music_image', 'music', 'music_id', $Record['music_id'] );
		$img_path = '../../../images/music/' . $img;
		unlink( $img_path );
		$file      = getCustomField( 'music_file', 'music', 'music_id', $Record['music_id'] );
		$file_path = '../../../images/music/songs/' . $file;
		unlink( $file_path );
	}
}

	$Query = "delete from $table where $conditionCol = $conditionVal";

	$result = delete( $Query );
if ( $result ) {
	$_SESSION['msg-class'] = 'success';
	$_SESSION['msg-text']  = 'Record deleted Successfully!';
}
header( "location: $location" );
