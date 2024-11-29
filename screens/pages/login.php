<!DOCTYPE html>
<html>
<?php $title = 'Login | E-music';
require '../partials/styles.php'; ?>

<body class="bg-custom">
	<?php require '../partials/menu.php'; ?>
	<div class="content-area mt-5 mb-5">
		<h1 class="page-title mt-3 text-center"> 𝐿o𝑔𝒾𝓃</h1>
		<div class="container">
			<div class="form ">
				<div class="row">
					<div class="col-md-12">
							<?php show_msg(); ?>
						<div class="log mt-3">
							
							<form action="../configuration/login.php" method="post">
								<div class="form-group">
									<label for="owner" class="control-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter An Email Address">
								</div>

								<div class="form-group">
									<label for="password" class="control-label">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
								</div>

								<button type="submit" class="btn btn-custom btn-block ">Login</button>
								<p class="text-a"><a href="../pages/signup.php" class="btn">Create an account</a></p>
								<p class="text-a"><a href="../../admin/index.php" class="btn">Admin Panel</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require '../partials/footer.php'; ?>
</body>
<?php require '../partials/script.php'; ?>
</html>
