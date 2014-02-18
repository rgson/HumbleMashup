<?php

class HumbleBundle {

	// Stub
	// TODO: Scrape Bundle info from Humble Bundle's website (regular and weekly bundles).
	public static function getBundles() {
		
		return array(
		
			'bundle' => array(
			
				'title' => 'The Humble Sid Meier Bundle',
				'picture' => 'https://humblebundle-a.akamaihd.net/static/hashed/07c4d0d64f50d134ea0b32bcac67fd644fe96ab5.svg',
				'url' => 'https://www.humblebundle.com/',
				'games' => array(
				
					array(
						
						'title' => 'Sid Meier\'s Civilization III Complete',
						'price' => 1.0,
						'score' => null,
						'appid' => null,
						'picture' => null,
						'url' => null,
						'owned' => null
						
					)
				
				)
				
			)
		
		);
		
	}

}

?>
