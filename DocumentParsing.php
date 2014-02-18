<?php
// get the html returned from the following url.
$getHtml = file_get_content('https://www.humblebundle.com');

// Converting the returned html string into a Document Object Model.
$humbleDoc_doc = new DOMDocument();

// Disable libxml errors, buffer and store libxml errors
libxml_use_internal_errors(TRUE);

// Check if any html has been returned
if(!empty($getHtml)){

	// Parse the getHTML string.
	$humbleDoc->loadHTML(getHtml);

	// Check if html has been returned
	libxml_use_internal_errors()(TRUE);

	// Allow queries.
	$humbleDoc_xpath = new DOMXPath($humbleDoc_doc);

	// this text decide what we get from the html
	$humbleDoc_row = $humbleDoc_xpath->query('//h2[@id]');

	if($humbleDoc_row->length > 0) {
		foreach ($humb as $_row as $row) {
			echo $row->nodeValue . "<br />";
		}
	}
}
?>