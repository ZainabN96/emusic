<?php
session_start();

function make_connection() {
	return mysqli_connect( 'localhost', 'root', '', 'emusic_db' );
}

function insert( $Query ) {
	$conn   = make_connection();
	$result = mysqli_query( $conn, $Query );

	if ( $result ) {
		$result = mysqli_insert_id( $conn );
	} else {
		$result = 0;
	}

	if ( $result ) {
		return $result;
	} else {
		$_SESSION['msg-class'] = 'danger';
		$_SESSION['msg-text']  = mysqli_error( $conn );
		return 0;
	}
}

function select( $Query ) {
	$conn         = make_connection();
	$result_array = mysqli_query( $conn, $Query );

	if ( empty( $result_array ) ) {
		return 0;
	} else {
		return $result_array;
	}
}

function update( $Query ) {
	$conn   = make_connection();
	$result = mysqli_query( $conn, $Query );

	if ( $result ) {
		return $result;
	} else {
		$_SESSION['msg-class'] = 'danger';
		$_SESSION['msg-text']  = mysqli_error( $conn );
		return 0;
	}
}

function total( $Query ) {
	$conn   = make_connection();
	$result = mysqli_query( $conn, $Query );
	$result = mysqli_num_rows( $result );
	if ( $result ) {
		return $result;
	} else {
		return 0;
	}
}

function delete( $Query ) {
	$conn   = make_connection();
	$result = mysqli_query( $conn, $Query );

	if ( $result ) {
		return $result;
	} else {
		$_SESSION['msg-class'] = 'danger';
		$_SESSION['msg-text']  = mysqli_error( $conn );
		return 0;
	}
}

function getCustomField( $fieldToGet, $table, $conditionAttr, $conditionAttrValue ) {
	$conn  = make_connection();
	$Query = "Select * from $table where $conditionAttr = $conditionAttrValue";

	$resultArray = mysqli_query( $conn, $Query );
	$record      = mysqli_fetch_array( $resultArray );
	if ( $record ) {
		return $record[ $fieldToGet ];
	} else {
		$_SESSION['msg-class'] = 'danger';
		$_SESSION['msg-text']  = mysqli_error( $conn );
		return 0;
	}
}

function getCustomTotal( $table, $conditionAttr, $conditionAttrValue ) {
	$conn  = make_connection();
	$Query = "Select * from $table where $conditionAttr = $conditionAttrValue";

	$result = mysqli_query( $conn, $Query );
	$result = mysqli_num_rows( $result );
	if ( $result ) {
		return $result;
	} else {
		return 0;
	}
}

function upload( $new_file, $path, $old_file = '' ) {
	if ( isset( $_FILES[ $new_file ]['name'][0] ) ) {
		$random_no   = time();
		$target_file = basename( $_FILES[ $new_file ]['name'] );
		$target_file = $random_no . '-' . $target_file;
		$target_file = str_replace( "'", '', $target_file );

		$target_dir = $path . $target_file;
		$old_dir    = $path . $old_file;
		if ( $old_file != '' ) {
			unlink( $old_dir );
		}
		move_uploaded_file( $_FILES[ $new_file ]['tmp_name'], $target_dir );
	} else {
		$target_file = $old_file;
	}

	return $target_file;
}

function authenticate( $email, $password ) {
	$conn     = make_connection();
	$password = base64_encode( base64_encode( $password ) );

	$Query = "select * from users where email='$email' AND password='$password'";

	$result_array = mysqli_query( $conn, $Query );
	$count        = mysqli_num_rows( $result_array );

	if ( $count == 1 ) {
		$record = mysqli_fetch_array( $result_array );

		if ( $record['status'] == 0 ) {
			$_SESSION['msg-class'] = 'danger';
			$_SESSION['msg-text']  = 'your status is disabled, contact admin';
            header( 'location: ' . $_SERVER['HTTP_REFERER'] );
		} elseif ( $record['user_type'] == 1 ) {
			$_SESSION['admin'] = $record['user_id'];
			header( 'location: home.php' );
		} elseif ( $record['user_type'] == 2 ) {
			$_SESSION['user'] = $record['user_id'];
			header( 'location: ../pages/home.php' );
		} else {
			$_SESSION['msg-class'] = 'danger';
			$_SESSION['msg-text']  = 'Some Systematic Error! Try again';
            header( 'location: ' . $_SERVER['HTTP_REFERER'] );
		}
	} else {
		$_SESSION['msg-class'] = 'danger';
		$_SESSION['msg-text']  = 'Email or Password is wrong!';
        header( 'location: ' . $_SERVER['HTTP_REFERER'] );
	}
}

function show_msg() {
	if ( isset( $_SESSION['msg-class'] ) ) {
		$msgCls  = $_SESSION['msg-class'];
		$msgText = $_SESSION['msg-text'];
		echo "<div class='alert alert-" . $msgCls . "'>" . $msgText . '</div>';
		unset( $_SESSION['msg-class'] );
		unset( $_SESSION['msg-text'] );
	}
}
