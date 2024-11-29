<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<body class="bg-nav">
	<?php
		require '../../includes/header.php';
		require '../../../class/cls_db.php';
		require '../configuration/conf-review.php';
	?>

		<main class="main" id="top">
			<div class="container-fluid content-area" data-layout="container">
				<?php require '../../includes/navbar.php'; ?>

					<div class="content">
						<?php require '../../includes/menu.php'; ?>

							<form method="POST" action="" enctype="multipart/form-data" class="validate">
							<?php
							if ( isset( $review_id ) ) {
								echo '<input name="review_id" value="' . $review_id . '" hidden >';
								echo '<input name="music_id" value="' . $music_id . '" hidden >';
							}
							?>
								<div class="row no-gutters">
									<div class="col-lg-12 pr-lg-2">
										<?php echo show_msg(); ?>
										<div class="card mb-3">
											<div class="card-header">
												<h5 class="mb-0">Music reviews</h5>
											</div>
											<div class="card-body bg-light">
											<a href="view-music.php?music_id=<?php echo $music_id; ?>" class="btn btn-info btn-custom mb-3 text-black"> <i class="fa fa-arrow-left"></i> Back To Music Page</a>

												<div class="form-row">
													<div class="col-sm-12">
														<div class="form-group">
															<label for="field-name">Review Text</label>
															<textarea class="form-control" name="review_txt"><?php echo $review_txt; ?></textarea>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-12">
														<div class="row justify-content-between align-items-center">
															<div class="col-md">
																<div class="form-group">
																	<label for="field-type">Status</label>
																	<div class="custom-control custom-switch">
																		<input type="checkbox" class="custom-control-input" id="status" name="status"
																		<?php
																		if ( $status ) {
																			echo 'checked';}
																		?>
																		 />
																		<label class="custom-control-label" for="status"></label>
																	</div>
																</div>
															</div>

															<div class="col-auto">
																<button type="submit" class="btn btn-custom btn-sm mr-2">Save</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
					</div>
			</div>
		</main>

		<?php require '../../includes/footer-script.php'; ?>

</body>

</html>
