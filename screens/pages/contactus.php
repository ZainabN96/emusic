<!DOCTYPE html>
<html>
<?php $title = 'Contact Us | E-music';
require '../partials/styles.php'; ?>

<body class="bg-custom">
	<?php require '../partials/menu.php'; ?>
	<section class="container mb-4">
		<h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
		<h3 class="text-center w-responsive mx-auto mb-6">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</h3>
		<div class="row">
			<div class="col-md-9 mb-md-0 mb-5">
				<?php show_msg(); ?>
				<form id="contact-form" action="../configuration/contact-us.php" method="post">
					<div class="row">
						<div class="col-md-12">
							<label for="name">Name :</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Your name.." />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="email">Email :</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Write your Email here" />
						</div>
					
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<label for="message">Message :</label>
							<textarea class="form-control" id="message" name="message" placeholder="Write something.." rows="8"></textarea>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-custom">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-md-3 mt-5 text-center">
				<ul class="list-unstyled mb-0">
					<li><i class="fa fa-map fa-2x text-primary"></i>
						<p>Prime ICS, Lahore , Pakistan</p>
					</li>

					<li><i class="fa fa-phone mt-4 fa-2x text-success"></i>
						<p>+ 11 22 33 44 55</p>
					</li>

					<li><i class="fa fa-envelope mt-4 fa-2x text-danger"></i>
						<p>contact@E-music.com</p>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<?php require '../partials/footer.php'; ?>
</body>
<?php require '../partials/script.php'; ?>
</html>
