<!DOCTYPE html>
<html>
<?php $title = 'Sign Up | E-music';
require '../partials/styles.php'; ?>

<body class="bg-custom">
	<?php require '../partials/menu.php'; ?>
	<div class="content-area mt-5 mb-5 ">
		<h1 class="page-title text-center">𝒮𝒾𝑔𝓃𝓊𝓅 </h1>
		<div class="container">
			<div class="form">
				<div class="row">
					<div class="col-md-12">
						<div class="log">
							<?php show_msg(); ?>

							<form action="../configuration/signup.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="password" class="control-label">User Name</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name">
								</div>

								<div class="form-group">
									<label for="owner" class="control-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter an Email">
								</div>

								<div class="form-group">
									<label for="password" class="control-label">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
								</div>

								<div class="form-group">
									<label for="image" class="control-label">image</label><br>
									<input type="file" class="" id="user_image" name="user_image">
								</div>

								<button type="submit" class="btn btn-custom btn-block">Register an account</button>
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
