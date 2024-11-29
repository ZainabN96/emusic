<!DOCTYPE html>
<html>
<?php $title = 'Cinematic 1 | E-music';
require '../partials/styles.php';

$music_id = $_GET['mid'];

$musicQuery = 'SELECT * FROM music WHERE status = 1 AND music_id = ' . $music_id;
$musicArray = select( $musicQuery );
foreach ( $musicArray as $musicRecord ) {
	$music_id    = $musicRecord['music_id'];
	$category    = getCustomField( 'cat_name', 'music_category', 'cat_id', $musicRecord['music_category'] );
	$music_image = $site_path . 'images/music/' . $musicRecord['music_image'];
	$music_file  = $site_path . 'images/music/songs/' . $musicRecord['music_file'];
}

$musicReviewQuery = 'SELECT * FROM music_reviews WHERE status = 1 AND music_id = ' . $music_id;
$musicReviewArray = select( $musicReviewQuery );

?>

<body class="bg-custom">
	<?php require '../partials/menu.php'; ?>
	<div class="container">
		<?php if ( $musicRecord['price'] == 0 || isset( $_SESSION['user'] ) ) { ?>
			<div class="container-fluid">
				<h1 class="page-title mt-3" align="center"><?php echo $musicRecord['music_title']; ?></h1>

				<div class="row">
					<div class="col-md-6">
						<h3 class="text-white">Category: <?php echo $category; ?></h3>

						<div class="song" style="background-image: url('<?php echo $music_image; ?>')">
							<button class="btn btn-custom btnPlay">
								<i class="fa fa-play"></i>
								<audio id="player">
									<source src="<?php echo $music_file; ?>" />
									</audio>
								</button>
							</div>
							<div class="container">
								<h5 class="mt-5 text-dark">
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
							</div>

							<div class="container"> 

								<div class="song-actions">
									<?php
									if ( isset( $_SESSION['user'] ) ) {
										$checkPermission  = "select * from music_permission where music_id = '$music_id' AND user_id = " . $_SESSION['user'];
										$music_permission = total( $checkPermission );
									}else {
										$music_permission = 0;
									}
									if ( $musicRecord['price'] == 0 || $music_permission != 0 ) {
										?>
										<a href="<?php echo $site_path . 'images/music/songs/' . $musicRecord['music_file']; ?>" class="btn btn-custom btn-sm btn-icon" download><i class="fa fa-download text-dark"></i> download</a>
									<?php } else { ?>
										<?php
										$cartItem  = total( "select * from cart where music_id = '$music_id'" );
										$orderItem = total( "select * from order_items where music_id = '$music_id'" );
										if ( $cartItem == 0 && $orderItem == 0 ) {
											?>
											<a href="../configuration/add-to-cart.php?mid=<?php echo $music_id; ?>" class="btn btn-custom btn-sm "><i class="fa fa-shopping-cart text-warning"></i> Cart</a>
											<?php
										}
									}
									?>
									<?php
									$favorite = total( "select * from favorite_music where music_id = '$music_id'" );
									if ( $favorite == 0 ) {
										?>
										<a href="../configuration/add-to-wishlist.php?mid=<?php echo $music_id; ?>" class="btn btn-custom btn-sm"><i class="fa fa-heart text-danger "></i> Favorite</a>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md-9 mb-5">
									<div class="review-box">
										<div class="reviews">
											<?php
											foreach ( $musicReviewArray as $reviewRecord ) {
												$review_username   = getCustomField( 'user_name', 'users', 'user_id', $reviewRecord['user_id'] );
												$review_user_image = getCustomField( 'user_image', 'users', 'user_id', $reviewRecord['user_id'] );
												$review_user_image = $site_path . 'images/profile/' . $review_user_image;
												?>
												<div class="song-review">
													<img src="<?php echo $review_user_image; ?>" alt="" class="review-img" />
													<h5 class="user-name"><?php echo $review_username; ?></h5>
													<p class="review-text"><?php echo $reviewRecord['review_txt']; ?></p>
												</div>
											<?php } ?>
										</div>
										<hr />
										<div class="review-form">
											<?php show_msg(); ?>
											<?php if ( isset( $_SESSION['user'] ) ) { ?>
												<form action="../configuration/make_review.php" method="post">
													<input hidden name="user_id" value="<?php echo $_SESSION['user']; ?>"/>
													<input hidden name="music_id" value="<?php echo $music_id; ?>"/>

													<div class="form-group">
														<div class="input-group">
															<input type="text" class="form-control" placeholder="Give us Feedback..." id="review_text" name="review_text"/>
															<div class="input-group-append">
																<button class="btn"><i class="fa fa-paper-plane text-dark"></i></button>
															</div>
														</div>
													</div>
												</form>
											<?php } else { ?>
												<span class="text-white"><a href="login.php" class="text-warning">login</a> to give review.</span>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="container-fluid">
					<div class="login-required">
						<a href="login.php" class="btn btn-custom">Login to View Paid Music.</a>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php require '../partials/footer.php'; ?>
	</body>
	<?php require '../partials/script.php'; ?>
	</html>
