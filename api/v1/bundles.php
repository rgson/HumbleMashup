<?php
	require '../config.php';
	
	if(isset($_GET['steamid']) && !isset($_GET['steamkey']))
			APIOutput::http_response(401, 'No Steam API key provided.');

	$steamEnabled = isset($_GET['steamkey']) && isset($_GET['steamid']);

	$bundleUrls = json_decode(file_get_contents('bundles.json'), true);

	$bundles = array();
	foreach($bundleUrls as $url)
		$bundles[] = HumbleBundle::getBundle($url);

	foreach($bundles as $bundle) {
		foreach($bundle->games as $game) {
		
			$game->score = GiantBomb::getScore($game->title);
			$game->appid = Steam::getAppId($game->title);
			$game->picture = Steam::getPicture($game->appid);
		
			if($steamEnabled)
				$game->owned = Steam::ownedBy($game->appid, $_GET['steamid'], $_GET['steamkey']);
		}
	}

	$response = array(
		'success' => true,
		'user' => $_GET['steamid'],
		'bundles' => $bundles
	);

	APIOutput::output($response);

?>
