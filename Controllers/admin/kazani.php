<?php
$html->setTitle('Kázání | ADMIN');
$kazani = new Kazani();

$html->addToContent(include 'Views/admin/kazani/all.php');