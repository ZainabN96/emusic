<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
		require '../../includes/header.php';
		require '../../../class/cls_db.php';

		$Query    = 'SELECT * FROM music_category';
		$cat_list = select( $Query );

		$list_title = 'Music Category list';
?>
	<body class="bg-nav">
		<main class="main" id="top">
			<div class="container-fluid content-area" data-layout="container">
				<?php require '../../includes/navbar.php'; ?>

					<div class="content">
						<?php require '../../includes/menu.php'; ?>
							<?php show_msg(); ?>
							<div class="card mb-3">
								<div class="card-body d-flex justify-content-between">
									<h3 class="mb-0"><?php echo $list_title; ?></h3>
									<a href="add-category.php">
									<button class="btn btn-sm btn-custom"> <i class="fa fa-plus"></i> Add Category </button></a>

								</div>
							</div>

							<div class="row no-gutters">
								<div class="bg-light w-100 pt-3 pb-2">
									<table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100 ">
										<thead class="bg-200">
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody class="bg-white">
											<?php
											if ( $cat_list ) {
												$sr_no = 0;
												foreach ( $cat_list as $record ) {
													$record_id = $record['cat_id'];

													if ( $record['status'] ) {
														$status = "<a href='../helpingfiles/changestatus.php?tbl=music_category&val=0&conditionCol=cat_id&conditionVal=$record_id' class='badge badge rounded-capsule badge-soft-success'>Enabled <i class='fa fa-check'></i></a>";
													} else {
														$status = "<a href='../helpingfiles/changestatus.php?tbl=music_category&val=1&conditionCol=cat_id&conditionVal=$record_id' class='badge badge rounded-capsule badge-soft-secondary'>Disabled <i class='fa fa-ban'></i></a>";
													}

													$sr_no++;
													?>
													<tr>
														<td><?php echo $sr_no; ?></td>
														<td><?php echo $record['cat_name']; ?></td>

														<td><?php echo $status; ?></td>
														<td>
															<a href='add-category.php?cat_id=<?php echo $record_id; ?>' class='mr-2 badge badge-soft-info'>Edit <i class='fa fa-edit'></i></a>

															<a href='../helpingfiles/delete.php?tbl=music_category&conditionCol=cat_id&conditionVal=<?php echo $record_id; ?>' class='mr-2 badge  badge-soft-danger' onclick='return confirm("Are You Sure?");'>Delete <i class='fa fa-trash'></i></a>
														</td>
													</tr>
													<?php
												}
											}
											?>
										</tbody>
										<tfoot class="bg-200">
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
					</div>
			</div>
		</main>
		<?php require '../../includes/footer-script.php'; ?>
	</body>
</html>
