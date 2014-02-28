<?php
require 'config.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';	// default to page 'home'
if(!file_exists(PAGES . "/$page.php"))
	header('Location: ' . $_SERVER['PHP_SELF']);	// hack; bypass lack of 404 by routing everything unknown to 'home'
?>

<!doctype html>
<html>
	<head>
		<title>HumbleMashup</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="resources/stylesheets/common.css">
		<?php
		$css = "resources/stylesheets/$page.css";
		if(file_exists($css))
			echo "<link rel=\"stylesheet\" href=\"$css\">";
		?>
	</head>
	<body>
		<div id="wrapper">
			<!-- Header -->
			<?php require PAGES . '/part/header.php'; ?>
		
			<!-- Content -->
			<?php require PAGES . "/$page.php"; ?>	
		
			<!-- Footer -->
			<?php require PAGES . '/part/footer.php'; ?>
		</div>
	</body>
</html>
