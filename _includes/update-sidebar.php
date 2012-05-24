<?php

// A quick and dirty script to generate the sidebar
// Much more reliable than maintaining the sidebar by hand!

$toc = json_decode(file_get_contents(__DIR__ . "/toc.json"));

$sidebar = "<h3>Contents</h3>\n<ol>";

foreach ($toc as $pageName)
{
	// load the page from the _site folder
	$pageHtmlFilename = __DIR__ . "/../_site/$pageName.html";
	if (!file_exists($pageHtmlFilename))
	{
		echo "Cannot find filename " . $pageHtmlFilename . "\n";
		continue;
	}

	$page = file_get_contents($pageHtmlFilename);

	// extract the page title
	preg_match("|<title>(.*)</title>|", $page, $matches);
	$title = $matches[1];

	// extract the h2 headings
	preg_match_all('|<h2 id=\'(.*)\'>(.*)</h2>|', $page, $matches);
	// var_dump($matches);

	// add the links into the sidebar
	$sidebar .= '<li><a href="' . $pageName . '.html">' . $title . "</a></li>\n";

	if (isset($matches[1]))
	{
		$sidebar .="<ul>\n";

		$i = 0;
		foreach ($matches[1] as $id)
		{
			$sidebar .= "<li><a href=\"$pageName.html#$id\">{$matches[2][$i]}</a></li>\n";
			$i++;
		}

		$sidebar .= "</ul>\n";
	}
}

// all done - output our finished sidebar
$sidebar .= "\n</ol>\n";
file_put_contents(__DIR__ . "/sidebar.html", $sidebar);
