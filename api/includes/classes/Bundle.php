<?php

class Bundle {

	private $title;
	private $picture;
	private $url;
	private $games;

	public function __construct($title, $picture, $url, array $games = null)
	{
		$this->title = (string) $title;
		$this->picture = (string) $picture;
		$this->url = (string) $url;
		$this->games = (isset($games) ? $games : array());
	}

	// Title get, set attribut
	function setTitle($newTitle) {
		$this->title = $newTitle;
	}

	function getTitle() {
		return $this->title;
	}

	//Picture get, set attribut
	function setPicture($newPicture) {
		$this->picture = $newPicture;
	}

	function getPicture() {
		return $this->picture;
	}

	// Url get, set attribut
	function setUrl($newUrl) {
		$this->url = $newUrl;
	}

	function getUrl() {
		return $this->url;
	}

	// Games get, set attribut
	function setGames(array $newGames) {
		$this->games = $newGames;
	}

	function getGames() {
		return $this->games;
	}
	
	function addGame($newGame) {
		$this->games[] = $newGame;
	}
	
}

?>
