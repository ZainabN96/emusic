<?php
// code for insertion and updation of Music records
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	foreach ( $_POST as $name => $value ) {
		$$name = $value;
	}

	if ( $status == 'on' ) {
		$status = 1;
	} else {
		$status = 0;
	}

	if ( ! isset( $music_id ) ) {
		// insert
		$music_image = upload( 'music_image', '../../../images/music/' );
		$music_file  = upload( 'music_file', '../../../images/music/songs/' );

        $musictitle = str_replace( "'", '', $musictitle );

		$Insert_Query = "INSERT INTO music (music_title, music_image, music_file, music_category, price, discount_price, status)
        VALUES ('$musictitle', '$music_image' , '$music_file' ,'$music_cat', '$price', '$pricediscount', '$status' )";

		$id = insert( $Insert_Query );

		if ( $id ) {
			$_SESSION['msg-class'] = 'success';
			$_SESSION['msg-text']  = 'Record has been Created Successfully!';
		}
	} else {
		// update
		$music_select_Query = "SELECT * FROM music where music_id = '$music_id'";
		$selected_array     = select( $music_select_Query );
		$record             = mysqli_fetch_array( $selected_array );

		$music_image = upload( 'music_image', '../../../images/music/', $record['music_image'] );
		$music_file  = upload( 'music_file', '../../../images/music/songs/', $record['music_file'] );

		$Update_Query = "Update music SET music_title = '$musictitle', music_image='$music_image', music_file = '$music_file', music_category = '$music_cat', price = '$price', discount_price = '$pricediscount', status = '$status' where music_id = '$music_id'";

		$id = update( $Update_Query );
		if ( $id ) {
			$_SESSION['msg-class'] = 'success';
			$_SESSION['msg-text']  = 'Record has been Updated Successfully!';
		}
	}

	header( 'location: list-music.php' );
}

// for viewing inserted record
if ( isset( $_GET['music_id'] ) ) {
	$music_id = $_GET['music_id'];

	$music_Get_Query = "SELECT * FROM music where music_id= $music_id";
	$selected_array  = select( $music_Get_Query );

	$record = mysqli_fetch_array( $selected_array );

	$title          = $record['music_title'];
	$category       = $record['music_category'];
	$price          = $record['price'];
	$discount_price = $record['discount_price'];
	$file_path      = $record['music_file'];
	$image_path     = $record['music_image'];
	$status         = $record['status'];

	$image_src = "../../../images/music/$image_path";
	$file_src  = "../../../images/music/songs/$file_path";

	$image = "<img src='$image_src' class='form-img' />";
	$file  = '<audio controls="" >';
	$file .= "<source src='$file_src' />";
	$file .= '</audio>';
} else {
	// defining variables default values to pervent PHP Notices
	$title  = $category = $price = $discount_price = $file = $image = '';
	$status = 1;
}
