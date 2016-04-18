<?php
$html->setTitle('Nová akce | Kalendář | ADMIN');

$kalendar = new Kalendar();
if (isset($_POST) && count($_POST) > 0) {
	$kalendar->checkNazev($_POST['nazev']);
	
	$kalendar->checkDate1($_POST['date1'], $_POST['time1Hod'], $_POST['time1Min']);
	$kalendar->checkDate2($_POST['date2'], $_POST['time2Hod'], $_POST['time2Min']);
	$kalendar->checkOdkaz($_POST['odkaz']);
	$kalendar->checkMisto($_POST['misto']);
	$kalendar->checkPopis($_POST['popis']);
	$kalendar->checkTimes();
	
	if (count($kalendar->getErrors()) == 0) {
		$kalenar->saveNewEvent();
	}
}

$html->addToContent(include 'Views/admin/kalendar/new.php');