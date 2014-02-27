<?php

	require 'config.php';
	
	$steamid = (isset($_GET['steamid']) ? $_GET['steamid'] : null);
	$bundleid = (isset($_GET['bundle']) ? $_GET['bundle'] : null);
		
	$response = array();
	
	if(!empty($steamid))
		$response['user'] = $steamid;
	
	if(empty($bundleid)) {
		$response['bundles'] = getAllBundles();
		
	} else {
	
		switch($bundleid) {
		
			case 'regular':
				$bundle = getRegularBundle();
				break;
			
			case 'weekly':
				$bundle = getWeeklyBundle();
				break;
			
			default:
				APIOutput::http_response(401, "Invalid bundle: $bundleid");
			
		}
			
		$response['bundle'] = $bundle;
		
	}
	
	APIOutput::output($response);
	
	// -------------
	
	function fillGame($game) {
	
		global $steamid;
	
		$score = Metacritic::getScore($game->getTitle());
		$appid = Steam::getAppId($game->getTitle());
		
		if(!empty($appid)) {
			$picture = Steam::getPicture($appid);
			$url = Steam::getURL($appid);
		}
		
		if(isset($score))	$game->setScore($score);
		if(isset($appid))	$game->setAppid($appid);
		if(isset($picture))	$game->setPicture($picture);
		if(isset($url))		$game->setUrl($url);
	
		if(!empty($steamid) && !empty($appid)) {
			$owned = Steam::ownedBy($appid, $steamid);
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
