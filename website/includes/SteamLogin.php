<?php

	include "../config.php";

	$OpenID = new LightOpenID("localhost");
	$myKey = STEAMKEY;

	session_start();

	function get_content($URL)
	{ 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data; 
	}

	if(!$OpenID->mode)
	{
		if(isset($_GET['login']))
		{
			$OpenID->identity = "http://steamcommunity.com/openid";
			header("Location: {$OpenID->authUrl()}");
		}

		if(!isset($_SESSION['T2SteamAuth']))
		{
			$login = "<div id=\"login\">Welcome. <a href=\"?login\">
			<img src=\"http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_border.png\"/></a></div>"; //måste ha med steambild även om inte här
		}

	}

	elseif ($OpenID->mode == "cancel") 
	{
		echo "User has canceled Authentication";
	}

	else
	{
		if(!isset($_SESSION['T2SteamAuth']))
		{
			$_SESSION['T2SteamAuth'] = $OpenID->validate() ? $OpenID->identity : null;
			$_SESSION['T2SteamID64'] = str_replace("http://steamcommunity.com/openid/id/", "", $_SESSION['T2SteamAuth']);

			if($_SESSION['T2SteamAuth']!== null)
			{
				$steam64 = str_replace("http://steamcommunity.com/openid/id/", "", $_SESSION['T2SteamAuth']);
				$profile = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key={$myKey}&steamids={$steam64}");
				$buffer = fopen("../cache/{$steam64}.json", "w+");
				fwrite($buffer, $profile);
				fclose($buffer);	
			}

			//header("Location: index.php");
		}
	}

	if(isset($_SESSION['T2SteamAuth']))
	{
		$login = "<div id=\"login\"><a href=\"?logout\">Logout</a></div>";		
	}

	if(isset($_GET['logout']))
	{
		unset($_SESSION['T2SteamAuth']);
		unset($_SESSION['T2SteamID64']);
		//header("Location: index.php");
	}

	$steam = json_decode(file_get_contents("../cache/{$_SESSION['T2SteamID64']}.json")); //eller get_content

	echo $login;

	//echo "img src=\"{$steam->response->players[0]->avatarfull}\"/>";
?>
