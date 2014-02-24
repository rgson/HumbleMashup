<?php

class Game {

	private $title;
	private $price;
	private $score;
	private $appid;
	private $owned;

	public function __construct($title, $picture, $score, $appid, $owned) {
		$this->title = (string) $title;
		$this->picture = (string) $picture;
		$this->score = (float) $score;
		$this->appid = (string) $appid;
		$this->owned = (bool) $owned;
	}

	// Title get, set attribut
	function setTitle($newTitle) {
		$this->title = $newTitle;
	}

	//Picture get, set attribut
	function setPicture($newPicture) {
		$this->picture = $newPicture;
	}

	function getPicture() {
		return $this->picture;
	}

	//Score get, set attribut
	function setScore($newScore) {
		$this->score = $newScore;
	}

	function getScore() {
		return $this->Score;
	}

	//Appid get, set attribut
	function setAppid($newAppid) {
		$this->appid = $newAppid;
	}

	function getAppid() {
		return $this->appid;
	}

	//Owned get, set attribut
	function setOwned($newOwned) {
		$this->owned = $newOwned;
	}

	function getOwned() {
		return $this->owned;
	}
	
	//TODO Magic method __get for url and picture
}

?>
