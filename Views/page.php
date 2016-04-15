<?php
$container = '<!DOCTYPE html>';
$container .= '<html>';
$container .= '<head>';
$container .= '<meta http-equiv="Content-language" content="cs">';
$container .= '<meta charset="UTF-8">';
$container .= '<meta name="author" content="Martin Přibyl">';
$container .= '<meta name="description" content="'.$html->getDescription().'">';

$container .= "<title>{$html->getTitle()}</title>";

$container .= '</head>';
$container .= '<body>';

$container .= '<ul>';
foreach ($html->getTopNavigation() as $navigation) {
	$container .= "<li>$navigation</li>";
}
$container .= '</ul>';

$container .= '<ul>';
foreach ($html->getSideNavigation() as $navigation) {
    $container .= "<li>$navigation</li>";
}
$container .= '</ul>';

$container .= "<div id='content'>{$html->getContent()}</div>";

$container .= '</body>';
$container .= '</html>';

return $container;