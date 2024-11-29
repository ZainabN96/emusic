<!DOCTYPE html>
<html>
<?php $title = 'My Profile | E-music';
require '../partials/styles.php';?>

<body class="bg-custom">
	<?php
	require '../partials/menu.php';
	$password = base64_decode( base64_decode( $userRecord['password'] ) );
	?>
	<div class="content-area">
		<div class="container">
			<div class="form-box">
				<h1 class="page-title text-center text-dark">Profile</h1>
				<?php show_msg(); ?>
				<form action="../configuration/update_profile.php" method="post" enctype="multipart/form-data">
					<input hidden name="user_id" value="<?php echo $userRecord['user_id']; ?>">
					<div class="form-group">
						<label for="password" class="control-label">Name</label>
						<input type="text" class="form-control" id="username" name="username" value="<?php echo $userRecord['user_name']; ?>">
					</div>

					<div class="form-group">
						<label for="owner" class="control-label">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $userRecord['email']; ?>">
					</div>

					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
					</div>

					<div class="form-group">
						<div class="im">
							<img src="<?php echo $user_img; ?>" alt="" class="form-img"><br/>
							<label for="image" class="control-label"> image</label><br>
							<input type="file" class="" id="user_image" name="user_image">
						</div>
					</div>

					<button type="submit" class="btn btn-custom btn-lg">Edit Information</button>
				</form>
			</div>

			<div class="form-box">
				<h2 class="page-title text-center text-dark">My Orders</h2>
				<table class="tbl tbl-bordered tbl-striped" width="100%">
					<thead class="bg-light">
						<tr>
							<th>Order ID</th>
							<th>Date</th>
							<th>Amount</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$user_id     = $userRecord['user_id'];
						$ordersQuery = "SELECT * FROM orders WHERE user_id = '$user_id'";
						$ordersArray = select( $ordersQuery );
						foreach ( $ordersArray as $orderRecord ) {
							if ( $orderRecord['status'] == 2 ) {
								$status = 'In Progress';
							} elseif ( $orderRecord['status'] == 1 ) {
								$status = 'Approved';
							} elseif ( $orderRecord['status'] == 0 ) {
								$status = 'Declined';
							}
							?>
							<tr>
								<td><?php echo $orderRecord['order_id']; ?></td>
								<td><?php echo $orderRecord['cr_date']; ?></td>
								<td><?php echo $orderRecord['amount']; ?></td>
								<td><?php echo $status; ?></td>
								<td>
									<a href="order.php?order_id=<?php echo $orderRecord['order_id']; ?>" class="btn btn-lg"> <i class="fa fa-eye text-primary"></i> View</a>

									<a href="../configuration/delete-order.php?order_id=<?php echo $orderRecord['order_id']; ?>" class="btn btn-lg"> <i class="fa fa-trash text-danger"></i> Delete</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<a href="../configuration/delete-account.php" class="btn btn-custom btn-lg mt-5 mb-5" onclick='return confirm("Are You Sure?");'> <i class="fa fa-trash text-danger"></i> Delete account</a>
		</div>
	</div>
</body>
<?php require '../partials/script.php'; ?>
</html>
