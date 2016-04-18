<?php
if (!$profil->pravomocRecyklace || !isset($_GET['id']) || $_GET['id'] == "") {
	return include 'Controllers/admin/kazani.php';
}

$kazani = new Kazani();

$kazani->kazaniFromKos($_GET['id']);
header ('location: admin.php?page=kazani');