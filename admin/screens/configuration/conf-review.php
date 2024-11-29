<?php
// code for insertion and updation of Category records
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	foreach ( $_POST as $name => $value ) {
		$$name = $value;
	}
	$music_page = '&music_id=' . $music_id;

	if ( $status == 'on' ) {
		$status = 1;
	} else {
		$status = 0;
	}

	// update
	$Update_Query = "Update music_reviews SET review_txt = '$review_txt', status = '$status' where review_id = '$review_id'";

	$id = update( $Update_Query );

	if ( $id ) {
		$_SESSION['msg-class'] = 'success';
		$_SESSION['msg-text']  = 'Record has been Updated Successfully!';
    }

	$location = 'view-review.php?review_id=' . $review_id . $music_page;
	header( 'location: ' . $location );
}

// for viewing inserted record
if ( isset( $_GET['review_id'] ) ) {
	$review_id = $_GET['review_id'];

	$category_Get_Query = "SELECT * FROM music_reviews where review_id= $review_id";
	$selected_array     = select( $category_Get_Query );
	$record             = mysqli_fetch_array( $selected_array );

	$review_txt = $record['review_txt'];
	$status     = $record['status'];
	$music_id   = $_GET['music_id'];
}
