<?php

class SteamLogin {
	
	public static function login() {
	
		$openid = new LightOpenID('localhost');

		if (!$openid->mode)
		{
			$openid->identity = 'http://steamcommunity.com/openid';
			header("Location: {$openid->authUrl()}");
		}

		else if ($openid->mode !== 'cancel')
		{
			if ($openid->validate())
			{					
				$steamid = str_replace("http://steamcommunity.com/openid/id/", "", $openid->identity);

				$_SESSION['steamid'] = $steamid;
				setcookie('steamid', $steamid);
				
				header('Location: ' . $_SERVER['PHP_SELF']);
			}
		}
	
	}
	
	public static function logout() {
	
		setcookie('steamid', '', time()-100);
		unset($_SESSION['steamid']);
		
		header('Location: ' . $_SERVER['PHP_SELF']);
	
	}

	public static function getPersonaName() {
	
		if(empty($_SESSION['steamid']))
			return null;
	
		$profile = json_decode(file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . STEAMKEY . '&steamids=' . $_SESSION['steamid']), true);
		
		try {
			$name = $profile['response']['players'][0]['personaname'];
		} catch (Exception $e) {
			$name = null;
		}
		
		return $name;
	
	}

	public static function getAvatar() {
	
		if(empty($_SESSION['steamid']))
			return null;
	
		$profile = json_decode(file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . STEAMKEY . '&steamids=' . $_SESSION['steamid']), true);
		
		try {
			$name = $profile['response']['players'][0]['avatar'];
		} catch (Exception $e) {
			$name = null;
		}
		
		return $name;
	
	}

}

?>
