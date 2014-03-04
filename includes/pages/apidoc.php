<main>

	<article id="apidoc">
		<h1>API documentation</h1>
		<p>This page describes the available API resources of the HumbleMashup API. The API gives developers access to all of the data used to build the HumbleMashup website.</p>
		<p>Please note that the HumbleMashup API does not provide any original data; we simply gather our data from <a href="http://www.humblebundle.com/" target="_blank">Humble Bundle</a>, <a href="http://www.steampowered.com/" target="_blank">Steam</a> and <a href="http://www.metacritic.com/" target="_blank">Metacritic</a> and present it in a new format.</p>
	
		<section id="v1" class="version">
			<h2>Version 1</h2>
		
			<section id="v1-res">
				<h3>Resources</h3>
			
				<section id="v1-res-bundles" class="resource">
					<h4>bundles</h4>
					<p class="info">
						<span class="verb">GET</span>
						<span class="uri"><a href="api/v1/bundles">api/v1/bundles</a></span>
					</p>
					<p class="desc">
						Returns an array of all available <a href="#v1-data-bundle">Bundle</a>s,
					</p>
					<h5>Parameters</h5>
					<div class="params">
						<div class="key">
							<span class="name">steamid</span>
							<span class="desc"><span class="note">(Optional)</span> The Steam user ID used when checking for owned games.</span>
						</div>
					</div>
					<h5>Response</h5>
					<div class="response">
						<div class="key">
							<span class="name">success</span>
							<span class="desc">A boolean representation of the request's completion status. (See <a href="#v1-data-error">Error</a>)</span>
						</div>
						<div class="key">
							<span class="name">bundles</span>
							<span class="desc">An array of all available <a href="#v1-data-bundle">Bundle</a>s.</span>
						</div>
					</div>
				</section>
			
				<section id="v1-res-bundles-regular" class="resource">
					<h4>bundles/regular</h4>
					<p class="info">
						<span class="verb">GET</span>
						<span class="uri"><a href="api/v1/bundles/regular">api/v1/bundles/regular</a></span>
					</p>
					<p class="desc">
						Returns the regular Humble Bundle found at <a href="http://www.humblebundle.com/" target="_blank">humblebundle.com</a> as a <a href="#v1-data-bundle">Bundle</a> object,
					</p>
					<h5>Parameters</h5>
					<div class="params">
						<div class="key">
							<span class="name">steamid</span>
							<span class="desc"><span class="note">(Optional)</span> The Steam user ID used when checking for owned games.</span>
						</div>
					</div>
					<h5>Response</h5>
					<div class="response">
						<div class="key">
							<span class="name">success</span>
							<span class="desc">A boolean representation of the request's completion status. (See <a href="#v1-data-error">Error</a>)</span>
						</div>
						<div class="key">
							<span class="name">bundle</span>
							<span class="desc">A <a href="#v1-data-bundle">Bundle</a> object representing the regular Humble Bundle.</span>
						</div>
					</div>
				</section>
			
				<section id="v1-res-bundles-weekly" class="resource">
					<h4>bundles/weekly</h4>
					<p class="info">
						<span class="verb">GET</span>
						<span class="uri"><a href="api/v1/bundles/weekly">api/v1/bundles/weekly</a></span>
					</p>
					<p class="desc">
						Returns the Humble Weekly Sale bundle found at <a href="http://www.humblebundle.com/weekly" target="_blank">humblebundle.com/weekly</a> as a <a href="#v1-data-bundle">Bundle</a> object,
					</p>
					<h5>Parameters</h5>
					<div class="params">
						<div class="key">
							<span class="name">steamid</span>
							<span class="desc"><span class="note">(Optional)</span> The Steam user ID used when checking for owned games.</span>
						</div>
					</div>
					<h5>Response</h5>
					<div class="response">
						<div class="key">
							<span class="name">success</span>
							<span class="desc">A boolean representation of the request's completion status. (See <a href="#v1-data-error">Error</a>)</span>
						</div>
						<div class="key">
							<span class="name">bundle</span>
							<span class="desc">A <a href="#v1-data-bundle">Bundle</a> object representing the Humble Weekly Sale bundle.</span>
						</div>
					</div>
				</section>
			
			</section>
		
			<section id="v1-data">
				<h3>Data</h3>
			
				<section id="v1-data-bundle" class="data">
					<h4>Bundle</h4>
					<p class="desc">
						A data type representing a bundle found at <a href="http://www.humblebundle.com/" target="_blank">humblebundle.com</a>.
					</p>
					<div class="keys">
						<div class="key">
							<span class="name">title</span>
							<span class="desc">A string representation of the bundle's title.</span>
						</div>
						<div class="key">
							<span class="name">picture</span>
							<span class="desc">A URL pointing to the bundle's logo.</span>
						</div>
						<div class="key">
							<span class="name">url</span>
							<span class="desc">A URL pointing to the bundle's original location.</span>
						</div>
						<div class="key">
							<span class="name">games</span>
							<span class="desc">An array of <a href="#v1-data-game">Game</a> objects representing the bundle's content.</span>
						</div>
					</div>
				</section>
			
				<section id="v1-data-game" class="data">
					<h4>Game</h4>
					<p class="desc">
						A data type representing a game found in a <a href="http://www.humblebundle.com/" target="_blank">Humble Bundle</a>, complemented with data from <a href="http://www.steampowered.com/" target="_blank">Steam</a> and <a href="http://www.metacritic.com/" target="_blank">Metacritic</a>.
						<br><p>Note: <span class="note">(Optional)</span> response keys are omitted if the associated value is <span class="code">null</span>. This happens when the data does not exist (i.e. a Humble Bundle game that's not available on Steam, or a game that hasn't been given a Metacritic score) or when the data could not be retrieved (i.e. a game listed under a different name on Steam/Metacritic, or no Steam user ID being provided for the ownership check).</p>
					</p>
					<div class="keys">
						<div class="key">
							<span class="name">title</span>
							<span class="desc">A string representation of the game's title.</span>
						</div>
						<div class="key">
							<span class="name">price</span>
							<span class="desc">A float representation of the game's price.</span>
						</div>
						<div class="key">
							<span class="name">score</span>
							<span class="desc"><span class="note">(Optional)</span> An integer representation of the game's Metacritic score, in the range 0-100.</span>
						</div>
						<div class="key">
							<span class="name">appid</span>
							<span class="desc"><span class="note">(Optional)</span> A string representation of the game's Steam AppID.</span>
						</div>
						<div class="key">
							<span class="name">picture</span>
							<span class="desc"><span class="note">(Optional)</span> A URL pointing to the game's Steam header picture.</span>
						</div>
						<div class="key">
							<span class="name">url</span>
							<span class="desc"><span class="note">(Optional)</span> A URL pointing to the game's Steam Store page.</span>
						</div>
						<div class="key">
							<span class="name">owned</span>
							<span class="desc"><span class="note">(Optional)</span> A boolean representation of the ownership status of the game for the specified Steam user.</span>
						</div>
					</div>
				</section>
			
				<section id="v1-data-error" class="data">
					<h4>Error</h4>
					<p class="desc">
						A description of the error message format for failed or invalid requests.
					</p>
					<div class="keys">
						<div class="key">
							<span class="name">status</span>
							<span class="desc">The HTTP status code. Also provided in the HTTP response header.</span>
						</div>
						<div class="key">
							<span class="name">message</span>
							<span class="desc">A custom error message further specifying the reason for the failed request.</span>
						</div>
					</div>
				</section>
			
			</section>
		
		</section>

	</article>
		
</main>
