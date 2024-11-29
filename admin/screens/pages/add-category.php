<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<body class="bg-nav">
	<?php
		require '../../includes/header.php';
		require '../../../class/cls_db.php';
		require '../configuration/conf-category.php';
	?>

		<main class="main" id="top">
			<div class="container-fluid content-area " data-layout="container">
				<?php require '../../includes/navbar.php'; ?>

					<div class="content">
						<?php require '../../includes/menu.php'; ?>

							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" class="validate">
								<div class="row no-gutters">
									<div class="col-lg-12 pr-lg-2">
										<div class="card mb-3">
											<div class="card-header d-flex justify-content-between">
												<h5 class="mb-0">Create Music Category</h5>
												<a href="list-category.php">
									            <button type="button" class="btn btn-sm btn-custom text-black"> <i class="fa fa-list"></i> Category List</button></a>
											</div>
											<div class="card-body bg-light">
												<?php
												if ( isset( $cat_id ) ) {
													echo '<input name="cat_id" value="' . $cat_id . '" hidden >';
												}
												?>

												<div class="form-row text-black">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="field-name">Category Name</label>
															<input class="form-control" id="catname" name="catname" type="text" placeholder="Category Name" value="<?php echo $title; ?>" required>
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
