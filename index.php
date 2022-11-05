<?php

$dir = scandir("/var/www/html");

$index = [".", "..", "index.php", "index_view.html"];

$dir = array_diff($dir, $index);

//print_r($dir);

$view = new DOMdocument();
$view->loadHTMLFile("index_view.html");

$link = "";
$attributeLink = "";

foreach ($dir as $key => $value) {

    $link = $view->createElement("a", $value);

    $attributeLink = $view->createAttribute("href");
    $attributeLink->value = "/$value";

    $link->appendChild($attributeLink);

    $view->appendChild($link);

}

echo $view->saveHTML();


?>

