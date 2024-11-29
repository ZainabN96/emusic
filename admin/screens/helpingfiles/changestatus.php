<?php
	require '../../../class/cls_db.php';
	$table        = $_GET['tbl'];
	$value        = $_GET['val'];
	$conditionCol = $_GET['conditionCol'];
	$conditionVal = $_GET['conditionVal'];
	$location     = $_SERVER['HTTP_REFERER'];


	$Query = "Update $table SET status=$value where $conditionCol=$conditionVal";

	$result = update( $Query );
if ( $result ) {
	header( "location: $location" );
}
