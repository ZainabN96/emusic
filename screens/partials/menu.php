<?php
if (isset($_SESSION['user'])){
    $user_id    = $_SESSION['user'];
    $userQuery  = "SELECT * FROM users WHERE user_id = $user_id";
    $userArray  = select( $userQuery );
    $userRecord = mysqli_fetch_array( $userArray );

    $user_img = $site_path . 'images/profile/' . $userRecord['user_image'];
}
?>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-nav">
		<a href="home.php">
			<img src="<?php echo $site_path; ?>images/site/icon/logo.png" class="img" />
		</a>

		<button
			class="navbar-toggler"
			type="button"
			data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link link" href="home.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a
						class="nav-link link dropdown-toggle"
						href="#"
						id="navbarDropdown"
						role="button"
						data-toggle="dropdown"
						aria-haspopup="true"
						aria-expanded="false"
					>
						Categories
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
						  $catSelectQuery = 'select * from music_category where status = 1';
						 $catArray        = select( $catSelectQuery );
						foreach ( $catArray as $catRecord ) {
							echo '<a class="dropdown-item" href="category.php?cat_id=' . $catRecord['cat_id'] . '">' . $catRecord['cat_name'] . '</a>
								<div class="dropdown-divider"></div>';
						}
						?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link link" href="contactus.php">Contact us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link link" href="aboutus.php">About us</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-5">
				<?php if ( isset( $_SESSION['user'] ) ) { ?>
					<li class="nav-item dropdown account-dropdown">
					<a class="nav-link" href="javascript:void()" role="menu" data-toggle="dropdown" href="cart.html"
						><i class="fa fa-user fa-menu text-primary fa-lg "></i
					> <?php echo $userRecord['user_name']; ?></a>

					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<div class="profile-details">
							<img src="<?php echo $user_img; ?>" width="100px" height="100px" alt='No Image'/>
							<h5><?php echo $userRecord['user_name']; ?></h5>
							<div class="email-address"><?php echo $userRecord['email']; ?></div>
						</div>

						<div class="profile-button mb-5">
							<a href="profile.php" class="btn btn-custom mt-2 ml-2">Manage Account</a>
							<a class="btn btn-custom mt-2 ml-3" href="logout.php">Logout</a>
						</div>
					</div>
				</li>

				<li class="navbar-nav">
					<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart fa-menu text-warning fa-lg"></i> Cart</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="wishlist.php"><i class="fa fa-heart fa-menu text-danger fa-lg"></i> Favourite</a>
				</li>
				<?php } else { ?>
				<li class="nav-item d-flex">
					<a class="nav-link btn" href="login.php">Login</a>
					<a class="nav-link  btn " href="signup.php">Sign Up</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</header>
