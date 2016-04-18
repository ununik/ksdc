<?php
$container = '<h1>Kázání</h1>';
if ($profil->pravomocAddKazani) {
    $container .= '<a href="admin.php?page=kazani_new" title="Přidat nové kázání">Přidat nové</a>';
}

foreach ($kazani->getAllKazani() as $kazani_one) {
    $container .= '<div>';
    $date = date('j. n. Y', $kazani_one['date']);
    $denVTydnu = date('w', $kazani_one['date']);
    $container .= "<span>{$kazani->dnyVTydnu[$denVTydnu]} $date</span>";
    $container .= '<a href="'.$kazani_one['odkaz'].'" title="'.$kazani_one['nazev'].' - '.$kazani->getAutor($kazani_one['autor'])['jmeno'].'" target="_blank">'.$kazani_one['nazev'].'</a>';
    $container .= "<span>{$kazani->getAutor($kazani_one['autor'])['jmeno']}</span>";
    if ($profil->pravomocAddKazani) {
        $container .= '<a href="admin.php?page=kazani_upr&id='.$kazani_one['id'].'">Upravit</a>';
    }
    $container .= '<div>';
}

if ($profil->pravomocRecyklace) {
	$container .= '<h2>Koš</h2>';
	foreach ($kazani->getAllKazaniFromKos() as $kazani_one) {
		$container .= '<div>';
		$date = date('j. n. Y', $kazani_one['date']);
		$denVTydnu = date('w', $kazani_one['date']);
		$container .= "<span>{$kazani->dnyVTydnu[$denVTydnu]} $date</span>";
		$container .= '<a href="'.$kazani_one['odkaz'].'" title="'.$kazani_one['nazev'].' - '.$kazani->getAutor($kazani_one['autor'])['jmeno'].'" target="_blank">'.$kazani_one['nazev'].'</a>';
		$container .= "<span>{$kazani->getAutor($kazani_one['autor'])['jmeno']}</span>";
		$container .= '<a href="admin.php?page=kazani_from_kos&id='.$kazani_one['id'].'">Vytáhnout z koše</a>';
		$container .= '<div>';
	}	
}

return $container;