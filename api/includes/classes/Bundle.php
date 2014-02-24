<?php

class Bundle {

	private $title:
	private $picture;
	private $url;
	private $games;

	public function Construct($title, $picture, $url, $games)
	{
		$this->title = (string) $title;
		$this->picture = (string) $picture;
		$this->url = (string) $url;
		$this->games = array();
	}

	// Title get, set attribut
	function SetTitle($newTitle) {
		this->title = $newTitle;
	}

	function GetTitle() {
		return $this->title;
	}

	//Picture get, set attribut
	function SetPicture($newPicture) {
		this->picture = $newPicture;
	}

	function GetPicture() {
		return $this->picture;
	}

	// Url get, set attribut
	function SetUrl($newUrl) {
		this->url = $newUrl;
	}

	function GetUrl() {
		return $this->url;
	}

	// Games get, set attribut
	function SetGames($newGames) {
		this->games[] = $newGames;
	}

	function GetGames() {
		return $this->games[];
	}

	//Stub.
	//TODO Member variables for title, picture, url and games.
}

?>
