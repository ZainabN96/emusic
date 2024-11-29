<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<body class="bg-nav">
	<?php
		require '../../includes/header.php';
		require '../../../class/cls_db.php';
		require '../configuration/conf-music.php';

		$cat_list_Query = 'select * from music_category where status=1';
		$cat_list       = select( $cat_list_Query );
	?>

		<main class="main" id="top">
			<div class="container-fluid content-area" data-layout="container">
				<?php require '../../includes/navbar.php'; ?>

					<div class="content">
						<?php require '../../includes/menu.php'; ?>

							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validate">
								<div class="row no-gutters">
									<div class="col-lg-12 pr-lg-2">
										<div class="card mb-3">
											<div class="card-header d-flex justify-content-between">
												<h5 class="mb-0">Create Music</h5>
												<a href="list-music.php">
									            <button type="button" class="btn btn-sm btn-custom"> <i class="fa fa-list"></i> Music List</button></a>
											</div>
											<div class="card-body bg-light">
											<?php
											if ( isset( $music_id ) ) {
												echo '<input name="music_id" value="' .$music_id.'" hidden >';
											}
											?>
												<div class="form-row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="field-name">Music title</label>
															<input class="form-control" id="musictitle" name="musictitle" type="text" placeholder="Music Title" value="<?php echo $title; ?>" required>
														</div>
													</div>

													<div class="col-sm-6">
														<div class="form-group">
															<label for="field-name">Music Category</label>
															<select name="music_cat" id="music_cat" class="form-control custom-select" required="">
															<option value=""> Select Category</option>
															<?php
															foreach ( $cat_list as $record ) {
																?>
																<option value="<?php echo $record['cat_id']; ?>"
																<?php
																if ( $record['cat_id'] == $category ) {
																	echo 'selected';}
																?>
																> <?php echo $record['cat_name']; ?> </option>
															<?php } ?>
															</select>
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="field-name">Price</label>
															<input class="form-control" id="price" name="price" type="number" placeholder="Price" value="<?php echo $price; ?>">
														</div>
													</div>

													<div class="col-sm-6">
														<label for="field-name">Discount Price</label>
															<input class="form-control" id="pricediscount" name="pricediscount" type="number" placeholder="Price" value="<?php echo $discount_price; ?>">
													</div>
												</div>

												<div class="form-row">
													<div class="col-sm-6">
														<?php echo $image; ?>
													</div>

													<div class="col-sm-6">
														<?php echo $file; ?>
													</div>
												</div>

												<div class="form-row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="music_image">Music Image</label> <br>
															<input id="music_image" name="music_image" type="file">
														</div>
													</div>

													<div class="col-sm-6">
														<label for="music_file">Music File</label> <br>
														<input id="music_file" name="music_file" type="file">
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
