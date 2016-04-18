<?php
$container = '<h1>Úprava profilu</h1>';

$container .= '<form action="" method="post">';
$container .= '<table>';
$container .= '<tr><td>Jméno:</td><td><input type="text" value="' . $profil->getFirstname() . '" name="firstname"></td></tr>';
$container .= '<tr><td>Příjmení:</td><td><input type="text" value="' . $profil->getLastname() . '" name="lastname"></td></tr>';
$container .= '<tr><td>Mail:</td><td><input type="text" value="' . $profil->getMail() . '" name="mail"></td></tr>';
$container .= '<tr><td colspan="2"><input type="submit" value="uložit"></td></tr>';

$container .= '<tr><td>Pravomoci:</td><td><ul>';
if ($profil->pravomocAddUser) {
    $container .= '<li><a href="admin.php?page=add-new-user" title="Přidat nového uživatele">Přidání nového uživatele</a></li>';
}
if ($profil->pravomocSeeOtherUsers) {
    $container .= '<li><a href="admin.php?page=users" title="Seznam všech uživatelů">Vidět profily ostatních uživatelů</a></li>';
}
if ($profil->pravomocUprPravomoc) {
    $container .= '<li>Upravit pravomoci uživatele</li>';
}
if ($profil->pravomocAddKazani) {
    $container .= '<li><a href="admin.php?page=kazani_new" title="Přidat nové kázání">Přidat kázání</a></li>';
}
if ($profil->pravomocAddToKalendar) {
	$container .= '<li><a href="admin.php?page=kalendar" title="Přidat akce do kalendář">Přidat akce do kalendáře</a></li>';
}
if ($profil->pravomocRecyklace) {
	$container .= '<li>Vytahování smazaných položek z koše</li>';
}
$container .= '</ul></td><tr>';

$container .= '</table>';
$container .= '</form>';

return $container;