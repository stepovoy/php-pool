#!/usr/bin/php
<?php
	if ($argc == 2) {
		$source = file_get_contents($argv[1]);
		$dom = new DOMDocument();
		$dom->loadHTML($source, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		$links = $dom->getElementsByTagName("a");
		foreach ($links as $link) {
		    foreach ($link->childNodes as $child) {
		        if ($child instanceof DOMText)
		            $link->replaceChild(new DOMText(strtoupper($child->wholeText)), $child);
		    }
		    if ($link->hasAttribute("title"))
			        $link->setAttribute("title", strtoupper($link->getAttribute("title")));
		    $img_links = $dom->getElementsByTagName("img");
		    foreach ($img_links as $img_link) {
			    if ($img_link->hasAttribute("title"))
			        $img_link->setAttribute("title", strtoupper($img_link->getAttribute("title")));
		    }
		}
		echo $dom->saveHTML();
	}
?>