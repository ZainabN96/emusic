<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
		require '../../includes/header.php';
		require '../../../class/cls_db.php';
		require '../configuration/conf-music.php';

		$list_title = 'Music list';

		$category = getCustomField( 'cat_name', 'music_category', 'cat_id', $category );

		$ReviewsQuery = "Select * from music_reviews where music_id = $music_id";
		$ReviewsArray = select( $ReviewsQuery );
?>

	<body class="bg-nav">
		<main class="main" id="top">
			<div class="container-fluid content-area" data-layout="container">
				<?php require '../../includes/navbar.php'; ?>

				<div class="content">
					<?php require '../../includes/menu.php'; ?>

					<a href="list-music.php" class="btn btn-info btn-custom mb-3 text-black"> <i class="fa fa-arrow-left"></i> Back To List</a>

					<div class="form-row">
						<div class="col-md-2">
							<img src="<?php echo $image_src; ?>" alt="" class="music-cover-img">
						</div>
						<div class="col-md-10 music-data">
							<h3 class="title">Title : <?php echo $title; ?></h3>
							<h4 class="category">Category : <?php echo $category; ?></h4>
							<p><strong>Price:</strong> <?php echo $price; ?><br>
							<strong>Discount Price:</strong> <?php echo $discount_price; ?></p>
							<audio src="<?php echo $file_src; ?>" controls class="music-file"></audio>
						</div>
					</div>
					<?php
					foreach ( $ReviewsArray as $Record ) {
						$user_name  = getCustomField( 'user_name', 'users', 'user_id', $Record['user_id'] );
						$user_image = getCustomField( 'user_image', 'users', 'user_id', $Record['user_id'] );

						$user_image_src = $site_path . 'images/profile/' . $user_image;
						?>
					<div class="music-review d-flex align-items-center">
						<div class="d-flex flex-column">
							<img src="<?php echo $user_image_src; ?> " alt="" class="review-img">
							<?php echo $user_name; ?>
						</div>
						<p class="review-text"><?php echo $Record['review_txt']; ?></p>
						<div class="review-action">
							<a href='view-review.php?review_id=<?php echo $Record['review_id']; ?>&music_id=<?php echo $music_id; ?>' class='mr-2 badge badge-soft-info'>Edit <i class='fa fa-edit'></i></a>
							<a href='../helpingfiles/delete.php?tbl=music_reviews&conditionCol=review_id&conditionVal=<?php echo $Record['review_id']; ?>' class='mr-2 badge badge-soft-danger' onclick='return confirm("Are You Sure?");'>Delete <i class='fa fa-trash'></i></a>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</main>
		<?php require '../../includes/footer-script.php'; ?>
	</body>

</html>
