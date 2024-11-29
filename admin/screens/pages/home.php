<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
	require '../../includes/header.php';
	require '../../../class/cls_db.php';
?>

  <body class="bg-nav">

	<main class="main" id="top">
	  <div class="container-fluid content-area" data-layout="container">
		<?php require '../../includes/navbar.php'; ?>

		<div class="content">
		<?php require '../../includes/menu.php'; ?>
		  <div class="card mb-3">
			<div class="card-body">
			  <h3 class="mb-0"><?php echo "Welcome " . $adminRecord['user_name']; ?></h3>
			</div>
		  </div>
		</div>
	  </div>
	</main>
	<?php require '../../includes/footer-script.php'; ?>

  </body>
</html>
