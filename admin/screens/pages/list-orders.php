<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
		require '../../includes/header.php';
		require '../../../class/cls_db.php';
		require '../configuration/conf-orders.php';
		$list_title = 'Order list';
?>

	<body class="bg-nav">
		<main class="main" id="top">
			<div class="container-fluid content-area" data-layout="container">
				<?php require '../../includes/navbar.php'; ?>

					<div class="content">
						<?php require '../../includes/menu.php'; ?>
						<?php show_msg(); ?>
							<div class="card mb-3">
								<div class="card-body">
									<h3 class="mb-0"><?php echo $list_title; ?> </h3>
								</div>
							</div>

							<div class="row no-gutters">
								<div class="bg-light w-100 pt-3 pb-2">
									<table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100 ">
										<thead class="bg-200">
											<tr>
												<th>Order id</th>
												<th>User Name</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody class="bg-white">
											<?php
											if ( $orders_list ) {
												foreach ( $orders_list as $record ) {
													$record_id = $record['order_id'];
													if ( $record['status'] == 2 ) {
														$status = 'In Progress';
													} elseif ( $record['status'] == 1 ) {
														$status = 'Approved';
													} elseif ( $record['status'] == 0 ) {
														$status = 'Declined';
													}

													$user_name = getCustomField( 'user_name', 'users', 'user_id', $record['user_id'] );
													?>
													<tr>
														<td><?php echo $record['order_id']; ?></td>
														<td><?php echo $user_name; ?></td>
														<td><?php echo $record['amount']; ?></td>
														<td><?php echo $record['cr_date']; ?></td>
														<td><?php echo $status; ?></td>
														<td>
														<a href='view-order.php?order_id=<?php echo $record_id; ?>' class='mr-2 badge badge-soft-success'>View <i class='fa fa-eye'></i></a>

														<a href='../helpingfiles/delete.php?tbl=orders&conditionCol=order_id&conditionVal=<?php echo $record_id; ?>' class='mr-2 badge badge-soft-danger' onclick='return confirm("Are You Sure?");'>Delete <i class='fa fa-trash'></i></a>
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
												<th>User Name</th>
												<th>Amount</th>
												<th>Date</th>
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
