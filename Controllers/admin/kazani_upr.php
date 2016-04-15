<?php
if (!isset($_GET['id']) || $_GET['id']=='') {
    return include 'Controllers/admin/kazani.php';
}
$kazani = new Kazani();
$kazani_one = $kazani->getOneKazani($_GET['id']);

$html->setTitle($kazani_one['nazev'] . ' | Úprava kázání | ADMIN');

if (isset($_POST) && count($_POST) > 0) {
    if (isset($_POST['delete'])) {
        $kazani->delete($_GET['id']);
        header ('location: admin.php?page=kazani');
    }
    $kazani->checkDatum($_POST['datum']);
    $kazani->checkNazev($_POST['nazev']);
    $kazani->checkAuthor($_POST['autor']);
    $kazani->checkOdkaz($_POST['odkaz']);
    $kazani->checkPopis($_POST['popis']);
    
    if (count($kazani->getErrors()) == 0) {
        $kazani->setAutor();
        $kazani->update($_GET['id']);
        if (isset($_POST['save'])) {
            header ('location: admin.php?page=kazani');
        }
    }
}

$html->addToContent(include 'Views/admin/kazani/upr.php');