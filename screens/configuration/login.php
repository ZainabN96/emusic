<?php
require '../../class/cls_db.php';

foreach ( $_POST as $name => $value ) {
	$$name = $value;
}

authenticate( $email, $password );
