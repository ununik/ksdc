<?php
$html->setTitle('Kalendář | ADMIN');
$kalendar = new Kalendar();

$html->addToContent(include 'Views/admin/kalendar/list.php');
$html->addToContent(include 'Views/admin/kalendar/kalendar.php');