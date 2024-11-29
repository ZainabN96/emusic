<!DOCTYPE html>
<html>
	<?php $title = 'Checkout | E-music';
	require '../partials/styles.php';

    $total_price = 0;

	$cartQuery = 'SELECT * FROM cart WHERE user_id = ' . $_SESSION['user'];
	$cartArray = select( $cartQuery );

	foreach ( $cartArray as $cartRecord ) {
		$music_id   = $cartRecord['music_id'];
		$musicQuery = 'SELECT * FROM music WHERE status = 1 AND music_id = ' . $music_id;
		$musicArray = select( $musicQuery );

		foreach ( $musicArray as $musicRecord ) {
			if ( $musicRecord['price'] != 0 && $musicRecord['discount_price'] != 0 ) {
				$total_price += $musicRecord['discount_price'];
			} else {
				$total_price += $musicRecord['price'];
			}
		}
	} ?>

	<body>
		<?php require '../partials/menu.php'; ?>
		<div class="content-area">
			<div class="container">
				<div class="form-box">
					<h1 class="page-title text-center text-dark">Check Out</h1>
					<form action="../configuration/checkout.php" method="post">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="owner" class="control-label">Owner</label>
									<input type="text" class="form-control" id="owner" name="owner" required >
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="cvv" class="control-label">CVV</label>
									<input type="text" class="form-control" id="cvv" name="cvv" required >
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="card-number" class="control-label">Card Number</label>
									<input type="text" class="form-control-sm" id="card_number" name="card_number" required >
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="amount" class="control-label">Amount</label>
									<input type="text"  readonly class="form-control" id="amount" name="amount" value="<?php echo $total_price ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="card-number" class="control-label">Expiration Date</label>
									<div class="form-row">
										<div class="col-md-6">
											<select name="month" id="month" class="form-control" required >
												<option value="">Month</option>
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
										</div>
										<div class="col-md-6">
											<select name="year" id="year" class="form-control" required >
												<option value="">Year</option>
												<option value="2020">2020</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-danger btn-block">Check Out</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	<?php require '../partials/script.php'; ?>
</html>
