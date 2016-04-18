<?php
$html->setTitle('Nový uživatel | ADMIN');

$newProfil = new ProfilNew();
if (isset($_POST['login'])) {
    if (isset($_POST['addNewUser']) && $_POST['addNewUser'] == 'on') {
        $newProfil->checkAddNewUser(true);
    }
    if (isset($_POST['uprPravomoc']) && $_POST['uprPravomoc'] == 'on') {
        $newProfil->checkUprPravomoc(true);
    }
    if (isset($_POST['seeOthers']) && $_POST['seeOthers'] == 'on') {
        $newProfil->checkSeeAllUser(true);
    }
    if (isset($_POST['addKazani']) && $_POST['addKazani'] == 'on') {
    	$newProfil->checkAddKazani(true);
    }
    if (isset($_POST['addToKalendar']) && $_POST['addToKalendar'] == 'on') {
    	$newProfil->checkAddToKalendar(true);
    }
    $newProfil->checkFirstname($_POST['firstname']);
    $newProfil->checkLastname($_POST['lastname']);
    $newProfil->checkLogin($_POST['login']);
    $newProfil->checkPassword($_POST['password']);
    
    if (count($newProfil->getErrors()) == 0) {
        $newProfil->addUser();
        header ('location: admin.php');
    }
}

$html->addToContent(include 'Views/admin/profil/new.php');