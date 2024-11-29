<div class="card">
	<img class="card-img-top" src="<?php echo $image_path; ?>" alt="image" />
	<div class="card-body">
		<h4 class="card-title"><?php echo $musicRecord['music_title']; ?></h4>
		<div>
			<h5>
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
		<div class="card-options d-flex justify-space-between">

			<?php
			if ( isset( $_SESSION['user'] ) ) {
				$checkPermission  = "select * from music_permission where music_id = '$music_id' AND user_id = " . $_SESSION['user'];
				$music_permission = total( $checkPermission );
			}else {
                $music_permission = 0;
            }

			if ( $musicRecord['price'] == 0 || $music_permission != 0 ) {
				?>
				<a href="<?php echo $site_path . 'images/music/songs/' . $musicRecord['music_file']; ?>" class=" btn btn-custom btn-sm" download><i class="fa fa-download"></i> download</a>
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
				<a href="../configuration/add-to-wishlist.php?mid=<?php echo $music_id; ?>" class="btn btn-custom btn-sm"><i class="fa fa-heart text-danger"></i> Favorite</a>
			<?php } ?>

			<a href="song.php?mid=<?php echo $music_id; ?>" class="btn btn-custom btn-sm "><i class="fa fa-eye text-primary"></i> View</a>
		</div>
	</div>
</div>
