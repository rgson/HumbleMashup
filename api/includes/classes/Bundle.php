<?php

class Bundle implements JsonSerializable {

	private $title;
	private $picture;
	private $url;
	private $games;

	public function __construct($title, $picture, $url, array $games = null) {
		$this->title = (string) $title;
		$this->picture = (string) $picture;
		$this->url = (string) $url;
		$this->games = (isset($games) ? $games : array());
	}

	// Title get, set attribut
	public function setTitle($newTitle) {
		$this->title = $newTitle;
	}

	public function getTitle() {
		return $this->title;
	}

	//Picture get, set attribut
	public function setPicture($newPicture) {
		$this->picture = $newPicture;
	}

	public function getPicture() {
		return $this->picture;
	}

	// Url get, set attribut
	public function setUrl($newUrl) {
		$this->url = $newUrl;
	}

	public function getUrl() {
		return $this->url;
	}

	// Games get, set attribut
	public function setGames(array $newGames) {
		$this->games = $newGames;
	}

	public function getGames() {
		return $this->games;
	}
	
	public function addGame($newGame) {
		$this->games[] = $newGame;
	}
	
	/*
	*	Implementerar JsonSerializable för att tillåta
	*	automatisk serialisering med json_encode()
	*	trots att klassens properties är private.
	*/
	public function jsonSerialize() {
	
		return array(
			'title' => $this->title,
			'picture' => $this->picture,
			'url' => $this->url,
			'games' => $this->games
		);
	
	}
	
}

?>
