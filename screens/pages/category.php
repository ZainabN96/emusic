<!DOCTYPE html>
<html>
	<?php $title = 'Cinematic | E-music';
	require '../partials/styles.php';
	$cat_id = $_GET['cat_id'];

	$musicQuery = 'SELECT * FROM music WHERE status = 1 AND music_category = ' . $cat_id;

	$musicArray    = select( $musicQuery );
	$category_name = getCustomField( 'cat_name', 'music_category', 'cat_id', $cat_id );
	?>

	<body class="bg-custom">
		<?php require '../partials/menu.php'; ?>

		<div class="container-fluid content-area">
			
			<div id="searchbar">
				<form action="search.php" method="get">
					<div class="row search-bar">
						<div class="col-xl-3 col-lg-4 col-md-6">
							<div class="form-group">
								<div class="input-group flex-nowrap">
									<input class="form-control mr-sm" type="search" placeholder="Search" aria-label="Search" name="search_text" id="search_text" />
									<div class="input-group-append">
										<button class="btn bg-nav" type="submit">Search</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<h1 class="page-title text-center text-dark mt-2"><?php echo $category_name; ?></h1>

			<div class="row mt-5 mb-5" id="song-cards">
				<?php
				foreach ( $musicArray as $musicRecord ) {
					$image_path = $site_path . 'images/music/' . $musicRecord['music_image'];
					$music_id   = $musicRecord['music_id'];
					?>
				<div class="col-xl-3 col-lg-4 col-md-6">
					<?php include '../partials/card.php'; ?>
				</div>
				<?php } ?>
			</div>

		</div>
		<?php require '../partials/footer.php'; ?>
	</body>
	<?php require '../partials/script.php'; ?>
</html>
