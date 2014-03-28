<?php

session_start();

$_SESSION['steamid'] = "76561197971925906";

if(isset($_GET['login']))
	SteamLogin::login();

else if(isset($_GET['logout']))
	SteamLogin::logout();

$apiUrl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/backup/bundles-mix.json';

$bundles = json_decode(file_get_contents($apiUrl), true);
$bundles = $bundles['bundles'];

function score_color($game) {
	if(!isset($game['score']))
		return '';
		
	if($game['score'] < 50)
		return ' low';
	else if($game['score'] < 75)
		return ' mid';
	else if($game['score'] < 100)
		return ' high';
}
	
?>

<main>

	<div id="login">
		<?php if(isset($_SESSION['steamid'])) { ?>
		<div id="profile">
			<div class="user">
				<img class="avatar" src="<?php echo SteamLogin::getAvatar(); ?>">
				<span class="name"><?php echo SteamLogin::getPersonaName(); ?></span>
			</div>
			<a id="logout" href="?logout">Log out</a>
		</div>
		<?php } else { ?>
		<a href="?login"><img src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_noborder.png" title="Sign in through Steam"/></a>
		<?php } ?>
	</div>
	
	<div class="bundles">
	
		<?php if(!empty($bundles)) foreach($bundles as $bundle) { ?>
		<div class="bundle">
		
			<div class="header">
				<a href="<?php echo $bundle['url']; ?>" alt="<?php echo $bundle['title']; ?>">
					<img src="<?php echo $bundle['picture']; ?>" alt="<?php echo $bundle['title']; ?>">
				</a>
			</div>
			
			<div class="games">
				<?php if(count($bundle['games']) == 0) { ?>
				<p>This bundle contains no games.</p>
				<?php } ?>
				<?php foreach($bundle['games'] as $game) { ?>
				<div class="game">

					<div class="title">
						<div class="poster">
							<?php if(isset($game['picture'])) { ?>
							<a href="<?php echo $game['url']; ?>" alt="<?php echo $game['title']; ?>">
								<img src="<?php echo $game['picture']; ?>" title="<?php echo $game['title']; ?>">
							</a>
							<?php } else { ?>
							<p><?php echo $game['title']; ?></p>
							<?php } ?>
						</div>
					</div>
			
					<div class="info">
						<div class="price">$<?php echo $game['price']; ?></div>
						<div class="score<?php echo score_color($game); ?>"><?php echo (isset($game['score']) ? $game['score'] : '?'); ?></div>
						<?php if (!empty($game['owned'])) { ?>
						<div class="owned">✓</div>
						<?php } ?>
						<?php if(!isset($game['picture'])) { ?>
						<div class="nosteam">
							<img src="resources/pictures/nosteam.png" title="This game is not on Steam.">
						</div>
						<?php } ?>
					</div>
	
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>	
	</div>
	
</main>
