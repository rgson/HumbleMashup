<?php

	include "/classes/LightOpenID.php";

	$Openid = new LightOpenID("localhost");

	session_start();

	if(!$Openid->mode)
	{
		if(isset($_GET['login']))
		{
			$Openid->identity = "http://steamcommunity.com/openid";
			header("Location: {$Openid->authUrl()}");
		}

		if(!isset($_SESSION['T2SteamAuth']))
		{
			$login = "<div id=\"login\">Welcome. Please <a href=\"?login\">
			<img src=\"http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_large_border.png\"/></a> to *TEXT or ACTION* </div>";
		}

	}

	echo $login;
?>