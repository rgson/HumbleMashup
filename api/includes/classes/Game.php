<?php

class Game implements JsonSerializable {

	private $title;
	private $price;
	private $score;
	private $appid;
	private $picture;
	private $owned;

	public function __construct($title, $price = 1.0, $score = null, $appid = null, $picture = null, $owned = false) {
		$this->title = (string) $title;
		$this->price = (float) $price;
		$this->score = $score;
		$this->appid = $appid;
		$this->picture = $picture;
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

	public function getScore() {
		return $this->Score;
	}

	//Score get, set attribut
	public function setScore($newScore) {
		$this->score = $newScore;
	}

	public function getAppid() {
		return $this->appid;
	}

	//Appid get, set attribut
	public function setAppid($newAppid) {
		$this->appid = $newAppid;
	}

	public function getPicture() {
		return $this->picture;
	}

	//Picture get, set attribut
	public function setPicture($newPicture) {
		$this->picture = $newPicture;
	}

	public function getOwned() {
		return $this->owned;
	}

	//Owned get, set attribut
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
