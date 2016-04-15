<?php
$html->setTitle('Nové kázání | ADMIN');

$kazani = new Kazani();
$kazani->date = date("Y-m-d");

if (isset($_POST) && count($_POST) > 0) {
    $kazani->checkDatum($_POST['datum']);
    $kazani->checkNazev($_POST['nazev']);
    $kazani->checkAuthor($_POST['autor']);
    $kazani->checkOdkaz($_POST['odkaz']);
    $kazani->checkPopis($_POST['popis']);
    
    if (count($kazani->getErrors()) == 0) {
        $kazani->setAutor();
        $kazani->saveNew();
        if (isset($_POST['save'])) {
            header ('location: admin.php?page=kazani');
        }
    }
}

$html->addToContent(include 'Views/admin/kazani/new.php');
$html->addToContent(include 'Views/admin/kazani/kazateleList.php');