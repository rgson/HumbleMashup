<?php require 'config.php'; ?>

<!doctype html>
<html>
	<head>
		<title>HumbleMashup</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo RESOURCES . '/style.css'; ?>">
	</head>
	<body>
		<!-- Header -->
		<?php include PAGES . '/part/header.php'; ?>
		
		<!-- Navigation -->
		<?php include PAGES . '/part/nav.php'; ?>
		
		<!-- Content -->
		<?php
		if (!isset($_GET['page']))
			include PAGES . '/home.php';
		else
			include PAGES . "/{$_GET['page']}.php";
		?>	
		
		<!-- Footer -->
		<?php include PAGES . '/part/footer.php'; ?>
	</body>
</html>
