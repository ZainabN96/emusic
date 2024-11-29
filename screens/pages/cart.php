<!DOCTYPE html>
<html>
	<?php $title = 'Cart | E-music';
	require '../partials/styles.php';

	$cartQuery = 'SELECT * FROM cart WHERE user_id = ' . $_SESSION['user'];
	$cartArray = select( $cartQuery ); ?>
	<body class="bg-custom">
		<?php require '../partials/menu.php'; ?>
		<div class="content-area">
			<div class="container">
				<h1 class="page-title mb-5 mt-3 " align="center">Cart</h1>
				<?php show_msg(); ?>
				<div class="row">
					<div class="col-md-8">
					<?php
					$total_price = 0;
					foreach ( $cartArray as $cartRecord ) {
						$music_id   = $cartRecord['music_id'];
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
								<h5 class="text-Dark">
									<?php
									if ( $musicRecord['price'] == 0 ) {
										echo 'Free Music';
									} elseif ( $musicRecord['price'] != 0 && $musicRecord['discount_price'] != 0 ) {
										echo $musicRecord['discount_price'];
										echo ' <del class="text-primary">' . $musicRecord['price'] . '</del>';
										$total_price += $musicRecord['discount_price'];
									} else {
										echo $musicRecord['price'];
										$total_price += $musicRecord['price'];
									}
									?>
								</h5>
								<div class="actions">
									<a href="song.php?mid=<?php echo $music_id; ?>" class="btn btn-lg btn-icon"
										><i class="fa fa-eye text-primary"></i> View</a
									>
									<?php
										$favorite = total( "select * from favorite_music where music_id = '$music_id'" );
									if ( $favorite == 0 ) {
										?>
										<a href="../configuration/add-to-wishlist.php?mid=<?php echo $music_id; ?>" class="btn btn-lg btn-icon"><i class="fa fa-heart text-danger"></i> Favorite</a>
									<?php } ?>
									<a
										href="../configuration/delete-from-cart.php?mid=<?php echo $music_id; ?>"
										class="btn btn-lg btn-icon"
									>
										<i class="fa fa-trash text-dark"></i> Delete
									</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php if ( $total_price != 0 ) { ?>
					<div class="col-md-4">
						<div class="order-box">
							<div class="order-summary">
								<div class="checkout-order-total">
									<div class="order-details">
										<h3>Total: <?php echo $total_price; ?> PKR</h3>
									</div>
									<a href="checkout.php">
										<button type="button" class="btn btn-custom">CHECKOUT</button>
									</a>
								</div>
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
