<!DOCTYPE html>
<html>
	<?php $title = 'Cinematic | E-music';
	require '../partials/styles.php';
	$search_text = $_GET['search_text'];

	$musicQuery = 'SELECT * FROM music WHERE status = 1 AND music_title LIKE "%' . $search_text . '%"';

	$musicArray = select( $musicQuery );
	?>

	<body>
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
										<button class="bg-nav btn btn-info text-dark" type="submit">Search</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<h1 class="page-title text-center text-dark mt-2">Search results for: <?php echo $search_text; ?></h1>
			
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
