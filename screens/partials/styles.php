<?php require "../../url.php"; ?>
<?php require '../../class/cls_db.php'; ?>
<head>
	<meta charset="utf-8" />
	<meta lang="en-us" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php if ( isset( $title ) ) {
		echo $title;} ?></title>
	<link href="<?php echo $site_path; ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $site_path; ?>assets/css/front-style.css" rel="stylesheet" />
	<link href="<?php echo $site_path; ?>assets/css/custom.css" rel="stylesheet" />
	<link href="<?php echo $site_path; ?>assets/css/fonts/css/all.min.css" rel="stylesheet" />
</head>
