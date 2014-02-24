<?php

	require '../config.php';
	
	if(isset($_GET['steamid']) && !isset($_GET['steamkey']))
		APIOutput::http_response(401, 'Provided SteamID but no Steam API key.');
	
	if(empty($_GET['id'])) {
	
		$response = array(
			'success' => true,
			'user' => $_GET['steamid'],
			'bundles' => getAllBundles()
		);
		
	} else {
	
		switch($_GET['id']) {
		
			case 'regular':
				$bundle = getRegularBundle();
				break;
			
			case 'weekly':
				$bundle = getWeeklyBundle();
				break;
			
			default:
				APIOutput::http_response(401, "Invalid bundle ID: \"{$_GET['id']}\".");
			
		}
			
		$response = array(
			'success' => true,
			'user' => $_GET['steamid'],
			'bundle' => $bundle
		);
		
	}
	
	APIOutput::output($response);
	
	// -------------
	
	function fillGame($game) {
	
		global $steamEnabled;
	
		$score = GiantBomb::getScore($game->getTitle());
		$appid = Steam::getAppId($game->getTitle());
		
		if(isset($appid)) {
			$picture = Steam::getPicture($appid);
			$url = Steam::getURL($appid);
		}
		
		if(isset($score))	$game->setScore($score);
		if(isset($appid))	$game->setAppid($appid);
		if(isset($picture))	$game->setPicture($picture);
		if(isset($url))		$game->setUrl($url);
	
		if(isset($_GET['steamkey']) && isset($_GET['steamid']) && isset($appid)) {
			$owned = Steam::ownedBy($game->getAppid(), $_GET['steamid'], $_GET['steamkey']);
			if(isset($owned))	$game->setOwned($owned);
		}
		
	}
	
	function getRegularBundle() {
	
		$bundle = HumbleBundle::getHumbleBundle();
		
		foreach($bundle->getGames() as $game)
			fillGame($game);
			
		return $bundle;
	
	}
	
	function getWeeklyBundle() {
	
		$bundle = HumbleBundle::getWeeklyBundle();
		
		foreach($bundle->getGames() as $game)
			fillGame($game);
			
		return $bundle;
		
	}
	
	function getAllBundles() {
	
		return array(
			getRegularBundle(),
			getWeeklyBundle()
		);
	
	}

?>
