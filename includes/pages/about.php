<main>

	<article id="about">
		<h1>About</h1>
		<p>HumbleMashup is a mashup project for easily evaluating the currently available Humble Bundles.</p>
		<p>HumbleMashup gathers data from <a href="http://www.humblebundle.com/" target="_blank">Humble Bundle</a>, <a href="http://www.steampowered.com/" target="_blank">Steam</a> and <a href="http://www.metacritic.com/" target="_blank">Metacritic</a> and presents it in a new format to help you in evaluating the relative value of a bundle from <em>your</em> personal perspective.</p>

		<section>
			<h2>How it works</h2>
			<h3>Humble Bundle</h3>
			<p>Humble Bundle is used for gathering information about the currently available bundles and the included games, such as the games' titles and the minimum donation required to get them at the time.</p>
			<h3>Steam</h3>
			<p>The titles gathered from the bundles are checked against the Steam store to see if each game is offered on Steam. If a game is found, then the game's Steam store picture is used to represent the game and to provide a link to the Steam store to give easy access to further information about the game.</p>
			<p>If the user signs in using Steam's OpenID function (&quot;Sign in through Steam&quot; on the front page), the game is also checked against the user's game library and is specifically flagged to show if the user already owns the game. Signing in through Steam's OpenID is entirely safe and no account information is ever passed through this site. Authentication is handled entirely by Steam and the only information sent back to HumbleMashup is a link to the user's profile.</p>
			<h3>Metacritic</h3>
			<p>Lastly, the game's title is checked against Metacritic to get the game's Metascore, serving as an indicator of the game's overall quality.</p>
		</section>
		
		<section>
			<h2>API</h2>
			<p>HumbleMashup also offers an API for application developers. The API documentation can be found <a href="apidoc">here</a>.</p>
		</section>
		
	</article>
	
</main>
