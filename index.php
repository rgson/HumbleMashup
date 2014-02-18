<?php require 'config.php'; ?>

<!doctype html>
<html>
	<head>
		<title>HumbleMashup</title>
		<meta charset="utf-8">
	</head>
	<body>
		<!-- Header -->
		<?php include PAGES . '/header.php'; ?>
		
		<!-- Content -->
		<?php
		if (!isset($_GET['page']))
			include PAGES . '/home.php';
		else
			include PAGES . "/{$_GET['page']}.php";
		?>	
		
		<!-- Footer -->
		<?php include PAGES . '/footer.php'; ?>
	</body>
</html>
