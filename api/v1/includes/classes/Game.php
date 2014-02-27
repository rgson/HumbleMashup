<?php

class Game implements JsonSerializable {

	private $title;
	private $price;
	private $score;
	private $appid;
	private $picture;
	private $url;
	private $owned;

	public function __construct($title, $price = 1.0, $score = null, $appid = null, $picture = null, $url = null, $owned = false) {
		$this->title = (string) $title;
		$this->price = (float) $price;
		$this->score = $score;
		$this->appid = $appid;
		$this->picture = $picture;
		$this->url = $url;
		$this->owned = (bool) $owned;
	}

	// Title get, set attribut
	public function getTitle() {
		return $this->title;
	}
	
	public function setTitle($newTitle) {
		$this->title = (string) $newTitle;
	}
	
	// Price get, set attribut
	public function getPrice() {
		return $this->price;
	}
	
	public function setPrice($newPrice) {
		$this->price = (float) $newPrice;
	}

	//Score get, set attribut
	public function getScore() {
		return $this->Score;
	}

	public function setScore($newScore) {
		$this->score = $newScore;
	}

	//Appid get, set attribut
	public function getAppid() {
		return $this->appid;
	}

	public function setAppid($newAppid) {
		$this->appid = $newAppid;
	}

	//Picture get, set attribut
	public function getPicture() {
		return $this->picture;
	}

	public function setPicture($newPicture) {
		$this->picture = $newPicture;
	}

	//URL get, set attribut
	public function getURL() {
		return $this->url;
	}

	public function setURL($newUrl) {
		$this->url = $newUrl;
	}

	//Owned get, set attribut
	public function getOwned() {
		return $this->owned;
	}

	public function setOwned($newOwned) {
		$this->owned = (bool) (isset($newOwned) ? $newOwned : false);
	}
	
	/*
	*	Implementerar JsonSerializable för att tillåta
	*	automatisk serialisering med json_encode()
	*	trots att klassens properties är private.
	*/
	public function jsonSerialize() {
	
		return array(
			'title' => $this->title,
			'price' => $this->price,
			'score' => $this->score,
			'appid' => $this->appid,
			'picture' => $this->picture,
			'url' => $this->url,
			'owned' => $this->owned
		);
		
	}

}

?>
