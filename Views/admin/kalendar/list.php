<?php
$container = '<h1>Kalendář</h1>';
if ($profil->pravomocAddToKalendar) {
	$container .= '<a href="admin.php?page=kalendar_new" title="Přidat novou akci">Přidat novou akci</a>';
}

return $container;