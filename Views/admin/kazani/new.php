<?php
$container = '<h1>Nové kázání</h1>';
$container .= '<form action="" method="post">';
$container .= '<table>';
$container .= '<tr><td>Datum:</td><td><input type="date" name="datum" value="'.$kazani->date.'"></td></tr>';
$container .= '<tr><td>Název:</td><td><input type="text" name="nazev" value="'.$kazani->nazev.'"></td></tr>';
$container .= '<tr><td>Autor:</td><td><input type="text" list="kazatele" name="autor" value="'.$kazani->autor.'"></td></tr>';
$container .= '<tr><td>Odkaz:</td><td><input type="text" name="odkaz" value="'.$kazani->odkaz.'"></td></tr>';
$container .= '<tr><td>Popis:</td><td><textarea name="popis">'.$kazani->popis.'</textarea></td></tr>';
$container .= '<tr><td colspan="2"><input type="submit" value="uložit" name="save"><input type="submit" value="připojit přílohu" name="attachment"></td></tr>';
$container .= '</table>';
$container .= '</form>';

return $container;