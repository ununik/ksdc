<?php
$container = '<h1>Uživatelé</h1>';

foreach ($users->getAllUsers() as $user) {
    $container .= '<div>';
    $container .= "<h2>{$user['firstname']} {$user['lastname']}</h2>";
    if ($profil->pravomocUprPravomoc) {
        $container .= '<ul>';
        if ($user['pravomoc-newUser']) {
            $container .= '<li>Přidání nového uživatele</li>';
        }
        if ($user['pravomoc-seeOtherUsers']) {
            $container .= '<li>Vidět profily ostatních uživatelů</li>';
        }
        if ($user['pravomoc-uprPravomoc']) {
            $container .= '<li>Upravit pravomoci uživatele</li>';
        }
        $container .= '</ul>';
    }
    $container .= '</div>';
}

return $container;