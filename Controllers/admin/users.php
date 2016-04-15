<?php
$html->setTitle('Uživatelé | ADMIN');

$users = new Users();

$html->addToContent(include 'Views/admin/profil/all.php');