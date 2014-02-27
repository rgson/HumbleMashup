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
		<?php require PAGES . '/part/header.php'; ?>
		
		<!-- Content -->
		<?php
		if (!isset($_GET['page']))
			require PAGES . '/home.php';
		else
			require PAGES . "/{$_GET['page']}.php";
		?>	
		
		<!-- Footer -->
		<?php require PAGES . '/part/footer.php'; ?>
	</body>
</html>
