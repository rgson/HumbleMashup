<?php

include 'config.php';

/**
<h1 class="bundle-logo">
        <img src="https://humblebundle-a.akamaihd.net/static/hashed/82faa4ec247b01dec55d93021e2ff3cc77b5e968.svg" width="563" height="58" alt="Humble Indie Bundle 11">
</h1>
**/

$dom = new HtmlDom();
$dom->loadHTMLfromURL('https://www.humblebundle.com');

$logo = $dom->getElementsByClass('bundle-logo')->item(0);
$img = $logo->getElementsByTagName('img')->item(0);
$picture = $img->attributes->getNamedItem('src')->nodeValue;
$title = $img->attributes->getNamedItem('alt')->nodeValue;

echo $picture . '<br>' . $title . '<br><br><br>' . "<img src=\"$picture\">";

?>
