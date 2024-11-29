<?php
// code for insertion and updation of Category records
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	foreach ( $_POST as $name => $value ) {
		$$name = $value;
	}

	if ( $status == 'on' ) {
		$status = 1;
	} else {
		$status = 0;
	}

	if ( ! isset( $cat_id ) ) {
		// insert

		$Insert_Query = "INSERT INTO music_category (cat_name, status)
        VALUES ('$catname', '$status' )";

		$id = insert( $Insert_Query );

		if ( $id ) {
			$_SESSION['msg-class'] = 'success';
			$_SESSION['msg-text']  = 'Record has been Created Successfully!';
        }
	} else {
		// update
		$Update_Query = "Update music_category SET cat_name = '$catname', status = '$status' where cat_id = '$cat_id'";

		$id = update( $Update_Query );

		if ( $id ) {
			$_SESSION['msg-class'] = 'success';
			$_SESSION['msg-text']  = 'Record has been Updated Successfully!';
		}
	}

	header( 'location: list-category.php' );
}

// for viewing inserted record
if ( isset( $_GET['cat_id'] ) ) {
	$cat_id = $_GET['cat_id'];

	$category_Get_Query = "SELECT * FROM music_category where cat_id= $cat_id";
	$selected_array     = select( $category_Get_Query );

	$record = mysqli_fetch_array( $selected_array );

	$title  = $record['cat_name'];
	$status = $record['status'];
} else {
	// defining variables default values to pervent PHP Notices
	$title  = '';
	$status = 1;
}
