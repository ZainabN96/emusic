<!DOCTYPE html>
<html>
	<?php $title = 'Order | E-music';
	require '../partials/styles.php';

	$orderQuery = 'SELECT * FROM orders WHERE order_id = ' . $_GET['order_id'];
	$orderArray = select( $orderQuery );
	foreach ( $orderArray as $orderRecord ) {
		$order_id = $orderRecord['order_id'];
		if ( $orderRecord['status'] == 2 ) {
			$status = 'In Progress';
		} elseif ( $orderRecord['status'] == 1 ) {
			$status = 'Approved';
		} elseif ( $orderRecord['status'] == 0 ) {
			$status = 'Declined';
		}
	}
	?>

	<body>
		<?php require '../partials/menu.php'; ?>
		<div class="content-area">
			<div class="container">

				<h1 class="page-title">order</h1>
				<div class="row">
					<div class="col-md-8">
					<?php
					$orderItemsQuery = 'SELECT * FROM order_items WHERE order_id = ' . $order_id;
					$orderItemsArray = select( $orderItemsQuery );
					foreach ( $orderItemsArray as $orderItemsRecord ) {
						$music_id   = $orderItemsRecord['music_id'];
						$musicQuery = 'SELECT * FROM music WHERE music_id = ' . $music_id;
						$musicArray = select( $musicQuery );
						foreach ( $musicArray as $musicRecord ) {

							?>
						<div class="fav-music-card">
							<img src="<?php echo $site_path . 'images/music/' . $musicRecord['music_image']; ?>" alt="" />
							<div class="detail">
								<h3><?php echo $musicRecord['music_title']; ?></h3>
                                <h5>
                                <?php
								if ( $musicRecord['price'] != 0 && $musicRecord['discount_price'] != 0 ) {
									echo $musicRecord['discount_price'].' <del class="text-warning">' . $musicRecord['price'] . '</del>';
								} else {
									echo $musicRecord['price'];
								}
                                ?>
                                </h5>
								<div class="actions">
									<a href="song.php?mid=<?php echo $musicRecord['music_id']; ?>" class="btn btn-success btn-sm btn-icon"><i class="fa fa-eye"></i> View</a>
								</div>
							</div>
						</div>
							<?php
						}
					}
					?>
					</div>

					<div class="col-md-4">
						<div class="form-box mt-0">
							<h3>Amount Total: <?php echo $orderRecord['amount']; ?></h3>
							<h3>Status: <?php echo $status; ?></h3>
							<a href="profile.php" class="btn btn-primary btn-icon mt-5"> <i class="fa fa-arrow-left"></i>Back to Profile </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php require '../partials/script.php'; ?>
</html>
