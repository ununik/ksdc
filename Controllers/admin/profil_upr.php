<?php
$html->setTitle($profil->getName() . ' | ADMIN');

if (isset($_POST['firstname'])) {
    $profil->updateProfil(
        $_POST['firstname'], $_POST['lastname'], $_POST['mail']
    );
}

$html->addToContent(include 'Views/admin/profil/upr.php');