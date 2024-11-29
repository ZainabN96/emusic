<!DOCTYPE html>
<html>
	<?php $title = 'Home Page | E-music';
	require '../partials/styles.php';

	$musicQuery = 'SELECT * FROM music WHERE status = 1';

	$musicArray = select( $musicQuery );
	?>

	<body class="bg-custom">
		<?php require '../partials/menu.php'; ?>
        <div class="content-area">
            <div class="container-fluid">
                <?php echo show_msg(); ?>
                <div class="mt-4" id="searchbar">
                    <form action="search.php" method="get">
                        <div class="row search-bar">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="form-group">
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control mr-sm" type="search" placeholder="Search" aria-label="Search" name="search_text" id="search_text" />
                                        <div class="input-group-append">
                                            <button class="bg-nav btn " type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row mt-5 mb-5" id="song-cards">
                    <?php
                    foreach ( $musicArray as $musicRecord ) {
                        $image_path = $site_path . 'images/music/' . $musicRecord['music_image'];
                        $music_id   = $musicRecord['music_id'];
                        ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <?php include('../partials/card.php'); ?>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <?php require '../partials/footer.php' ?>
	</body>
	<?php require '../partials/script.php'; ?>
</html>
