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
		$this->score = (float) $score;
		$this->appid = (string) $appid;
		$this->picture = (string) $picture;
		$this->owned = (bool) $owned;
	}

	// Title get, set attribut
	public function getTitle() {
		return $this->title;
	
	public function setTitle($newTitle) {
		$this->title = $newTitle;
	}

	// Price get, set attribut
	public function getPrice() {
		return $this->price;
	
	public function setPrice($newPrice) {
		$this->price = $newPrice;
	}

	//Picture get, set attribut
	public function setPicture($newPicture) {
		$this->picture = $newPicture;
	}

	public function getPicture() {
		return $this->picture;
	}

	//Score get, set attribut
	public function setScore($newScore) {
		$this->score = $newScore;
	}

	public function getScore() {
		return $this->Score;
	}

	//Appid get, set attribut
	public function setAppid($newAppid) {
		$this->appid = $newAppid;
	}

	public function getAppid() {
		return $this->appid;
	}

	//Owned get, set attribut
	public function setOwned($newOwned) {
		$this->owned = $newOwned;
	}

	public function getOwned() {
		return $this->owned;
	}
	
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
