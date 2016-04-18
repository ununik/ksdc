<?php
$container = '<h1>Nová akce</h1>';

$container .= '<ul>';
foreach ($kalendar->getErrors() as $err) {
	$container .= "<li>$err</li>";
}
$container .= '</ul>';

$container .= '<form action="" method="post">';
$container .= '<table>';
$container .= '<tr><td>Název akce:</td><td><input type="text" name="nazev" value="'.$kalendar->nazev.'"></td></tr>';
$container .= '<tr><td>Datum od:</td><td><input type="date" name="date1" value="'.$kalendar->date1.'"> - <input type="text" placeholder="HH" name="time1Hod" value="'.$kalendar->hod1.'">:<input type="text" placeholder="MM" name="time1Min" value="'.$kalendar->min1.'"></td></tr>';
$container .= '<tr><td>Datum do:</td><td><input type="date" name="date2" value="'.$kalendar->date2.'"> - <input type="text" placeholder="HH" name="time2Hod" value="'.$kalendar->hod2.'">:<input type="text" placeholder="MM" name="time2Min" value="'.$kalendar->min2.'"></td></tr>';
$container .= '<tr><td>Odkaz:</td><td><input type="text" name="odkaz" value="'.$kalendar->odkaz.'"></td></tr>';
$container .= '<tr><td>Místo:</td><td><input type="text" name="misto" value="'.$kalendar->misto.'"></td></tr>';
$container .= '<tr><td>Popis:</td><td><textarea name="popis">'.$kalendar->popis.'</textarea></td></tr>';
$container .= '<tr><td colspan="2"><input type="submit" value="uložit"></td></tr>';
$container .= '</form>';

$container .= '</table>';

return $container;