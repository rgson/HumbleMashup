<?php

	include "../config.php";

	$OpenID = new LightOpenID("localhost");
	$myKey = STEAMKEY;

	session_start();

	if(!$OpenID->mode)
	{
		if(isset($_GET['login']))
		{
			$OpenID->identity = "http://steamcommunity.com/openid";
			header("Location: {$OpenID->authUrl()}");
		}

		if(!isset($_SESSION['SteamAuth']))
		{
			$login = "<div id=\"login\"><a href=\"?login\">
			<img src=\"http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_border.png\"/></a></div>"; //måste ha med steambild även om inte här
		}

	}

	elseif ($OpenID->mode == "cancel") 
	{
		echo "User has canceled Authentication";
	}

	else
	{
		if(!isset($_SESSION['SteamAuth']))
		{
			$_SESSION['SteamAuth'] = $OpenID->validate() ? $OpenID->identity : null;
			$_SESSION['SteamID64'] = str_replace("http://steamcommunity.com/openid/id/", "", $_SESSION['SteamAuth']);

			if($_SESSION['SteamAuth'] !== null)
			{
				$steam64 = str_replace("http://steamcommunity.com/openid/id/", "", $_SESSION['SteamAuth']);
	
				setcookie($steam64);

				if(isset($_COOKIE[$steam64]))
				{
					$_SESSION['SteamAuth'] = $OpenID->validate();
					$myCookie = "test";
					setcookie($myCookie);
					print_r($_COOKIE);
				}
				//$profile = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key={$myKey}&steamids={$steam64}");
				//$buffer = fopen("../cache/{$steam64}.json", "w+");
				//fwrite($buffer, $profile);
				//fclose($buffer);	
			}

			//header("Location: index.php");
		}
	}

//om man gör setcookie när inloggningen gått igenom (nånstans strax efter att SESSION-variabeln sätts)

//och sen i index kollar man ifall isset($_COOKIE['steamid']) och isf sätter man session-variabeln utan att användaren behöver logga in


	if(isset($_SESSION['SteamAuth']))
	{
		$login = "<div id=\"login\"><a href=\"?logout\">Logout</a></div>";		
	}

	if(isset($_GET['logout']))
	{
		unset($_SESSION['SteamAuth']);
		unset($_SESSION['SteamID64']);
		//header("Location: index.php");
	}

	//$steam = json_decode(file_get_contents("../cache/{$_SESSION['SteamID64']}.json")); //eller get_content

	echo $login;

	//echo "img src=\"{$steam->response->players[0]->avatarfull}\"/>";
?>
