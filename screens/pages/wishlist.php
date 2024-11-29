<!DOCTYPE html>
<html>
	<?php $title = 'Wishlist | E-music';
	require '../partials/styles.php';
    
    if ( ! isset( $_SESSION['user'] ) ) {
    header( 'location: ../pages/login.php' );
    exit;
}

	$favoriteMusicQuery = 'SELECT * FROM favorite_music WHERE status = 1 AND user_id = ' . $_SESSION['user'];
	$favoriteMusicArray = select( $favoriteMusicQuery );
	?>

	<body class="bg-custom">
		<?php require '../partials/menu.php'; ?>
		<div class="content-area mt-3">
			<h1 class="page-title mb-5" align="center">Favourite Music</h1>
			<div class="container ">
				<div class="col-md-8">
				
				<?php show_msg(); ?>
				<?php
				foreach ( $favoriteMusicArray as $favoriteMusicRecord ) {
					$music_id   = $favoriteMusicRecord['music_id'];
					$musicQuery = 'SELECT * FROM music WHERE status = 1 AND music_id = ' . $music_id;
					$musicArray = select( $musicQuery );
					foreach ( $musicArray as $musicRecord ) {
						$music_id    = $musicRecord['music_id'];
						$category    = getCustomField( 'cat_name', 'music_category', 'cat_id', $musicRecord['music_category'] );
						$music_image = $site_path . 'images/music/' . $musicRecord['music_image'];
						$music_file  = $site_path . 'images/music/songs/' . $musicRecord['music_file'];
					}
					?>
					<div class="fav-music-card">
						<img src="<?php echo $music_image; ?>" alt="">
						<div class="detail">
							<h3><?php echo $musicRecord['music_title']; ?></h3>
							<h5 class="text-dark">
								<?php
								if ( $musicRecord['price'] == 0 ) {
									echo 'Free Music';
								} elseif ( $musicRecord['price'] != 0 && $musicRecord['discount_price'] != 0 ) {
									echo $musicRecord['discount_price'];
									echo ' <del class="text-primary">' . $musicRecord['price'] . '</del>';
								} else {
									echo $musicRecord['price'];
								}
								?>
							</h5>
							<div class="actions">
								<a href="song.php?mid=<?php echo $music_id; ?>" class="btn btn-lg "><i class="fa fa-eye text-primary"></i> View</a>
							<?php
								$checkPermission  = "select * from music_permission where music_id = '$music_id' AND user_id = " . $_SESSION['user'];
								$music_permission = total( $checkPermission );
							if ( $musicRecord['price'] == 0 || $music_permission != 0 ) {
								?>
								<a href="<?php echo $site_path . 'images/music/songs/' . $musicRecord['music_file']; ?>" class="btn btn-lg " ><i class="fa fa-download"></i> download</a>
								<?php } else { ?>
								<?php
									$cartItem  = total( "select * from cart where music_id = '$music_id'" );
									$orderItem = total( "select * from order_items where music_id = '$music_id'" );
								if ( $cartItem == 0 && $orderItem == 0 ) {
									?>
									<a href="../configuration/add-to-cart.php?mid=<?php echo $music_id; ?>" class="btn btn-lg "><i class="fa fa-shopping-cart text-warning"></i> Cart</a>
									<?php
								}
								}
								?>

								<a href="../configuration/delete-from-wishlist.php?mid=<?php echo $music_id; ?>" class="btn btn-lg">
									<i class="fa fa-trash text-danger"></i> Delete
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php require '../partials/footer.php'; ?>
	</body>
	<?php require '../partials/script.php'; ?>
</html>
