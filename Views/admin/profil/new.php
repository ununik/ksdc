<?php
$container = '<h1>Nový uživatel</h1>';

$container .= '<ul>';
foreach ($newProfil->getErrors() as $err) {
    $container .= "<li>$err</li>";
}
$container .= '</ul>';

$container .= '<form action="" method="post">';
$container .= '<table>';
$container .= '<tr><td>Jméno:</td><td><input type="text" value="'.$newProfil->getFirstname().'" name="firstname"></td></tr>';
$container .= '<tr><td>Příjmení:</td><td><input type="text" value="'.$newProfil->getLastname().'" name="lastname"></td></tr>';
$container .= '<tr><td>Login (Přihlašovací jméno):</td><td><input type="text" value="'.$newProfil->getLogin().'" name="login"></td></tr>';
$container .= '<tr><td>Heslo:</td><td><input type="password" value="" name="password"></td></tr>';

if ($profil->pravomocUprPravomoc) {
    $container .= '<tr><td>Pravomoci:</td><td><ul>';

    $container .= '<li>';
    if ($newProfil->addNewUser()) {
        $container .= '<input type="checkbox" checked="checked" name="addNewUser">';
    } else {
        $container .= '<input type="checkbox" name="addNewUser">';
    }
    $container .= ' Přidání nového uživatele</li>';
    
    $container .= '<li>';
    if ($newProfil->seeAllUsers()) {
        $container .= '<input type="checkbox" checked="checked" name="seeOthers">';
    } else {
        $container .= '<input type="checkbox" name="seeOthers">';
    }
    $container .= ' Vidět profily ostatních uživatelů</li>';
    
    $container .= '<li>';
    if ($newProfil->uprPravomoc()) {
        $container .= '<input type="checkbox" checked="checked" name="uprPravomoc">';
    } else {
        $container .= '<input type="checkbox" name="uprPravomoc">';
    }
    $container .= ' Upravit pravomoci uživatele</li>';

    $container .= '</ul></td><tr>';
}
$container .= '<tr><td colspan="2"><input type="submit" value="uložit"></td></tr>';
$container .= '</table>';
$container .= '</form>';

return $container;