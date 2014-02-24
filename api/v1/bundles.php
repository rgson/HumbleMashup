<?php
	require '../config.php';
	
	if(isset($_GET['steamid']) && !isset($_GET['steamkey']))
			APIOutput::http_response(401, 'No Steam API key provided.');

	$steamEnabled = isset($_GET['steamkey']) && isset($_GET['steamid']);

	$bundles = array(
		HumbleBundle::getHumbleBundle(),
		HumbleBundle::getWeeklyBundle()
	);

	foreach($bundles as $bundle) {
		foreach($bundle->getGames() as $game) {
	
			$score = GiantBomb::getScore($game->getTitle());
			$appid = Steam::getAppId($game->getTitle());
		
			if(isset($appid))
				$picture = Steam::getPicture($game->getAppid());
		
			if(isset($score))	$game->setScore($score);
			if(isset($appid))	$game->setAppid($appid);
			if(isset($picture))	$game->setPicture($picture);
	
			if($steamEnabled && isset($appid)) {
				$owned = Steam::ownedBy($game->getAppid(), $_GET['steamid'], $_GET['steamkey']);
			
				if(isset($owned))	$game->setOwned($owned);
			}
		}
	}

	$response = array(
		'success' => true,
		'user' => $_GET['steamid'],
		'bundles' => $bundles
	);

	APIOutput::output($response);

?>
