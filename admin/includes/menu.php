<?php
if ( ! isset( $_SESSION['admin'] ) ) {
	echo "<script>window.location.href = '" . $admin_path . "screens/login.php?message=Session Expired.'</script>";
}
$admin_id    = $_SESSION['admin'];
$adminQuery  = "SELECT * FROM users WHERE user_id = $admin_id";
$adminArray  = select( $adminQuery );
$adminRecord = mysqli_fetch_array( $adminArray );

$admin_img = $site_path . 'images/profile/' . $adminRecord['user_image'];
?>

	<nav class="navbar navbar-light fs--1 font-weight-semi-bold row navbar-top sticky-kit navbar-expand p-3">
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
		</button>
		<a class="navbar-brand text-left menu-logo" href="<?php echo $admin_path; ?>screens/pages/home.php">
			<div class="d-flex align-items-center">
				<img src="<?php echo $site_path; ?>images/site/icon/logo.png" alt="">
			</div>
		</a>

		<div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavDropdown1">
			<div class="d-flex align-items-center">
				<img src="<?php echo $admin_img; ?> " alt="" class="menu-img">
				<?php echo $adminRecord['user_name']; ?>
			</div>
			<ul class="navbar-nav align-items-center ml-auto">
				<li class="nav-item">
					<a class="dropdown-item text-black fs--1" href="<?php echo $admin_path; ?>screens/pages/logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
