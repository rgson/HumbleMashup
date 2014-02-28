<?php

session_start();

if(empty($_SESSION['steamid']) && !empty($_COOKIE['steamid']))
	$_SESSION['steamid'] = $_COOKIE['steamid'];

if(isset($_GET['login']))
	SteamLogin::login();

else if(isset($_GET['logout']))
	SteamLogin::logout();
	
?>

<main>

	<div id="login">
	
		<?php if(isset($_SESSION['steamid'])) { ?>
		
		<p>Logged in as <b><?php echo SteamLogin::getPersonaName(); ?></b></p>
		<a href="?logout">Log out</a>
		
		<?php } else { ?>
		
		<p>Not logged in.</p>
		<a href="?login">
			<img src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_border.png"/>
		</a>
		
		<?php } ?>
		
	</div>
	
</main>
