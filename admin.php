<?php
include 'Configuration/DatabaseConfig.php';
include 'Models/Library/Admin.php';
function __autoload($className)
{
	include_once 'Models/Classes/' . $className . '.class.php';
}

session_start();

$html = new HTML();
$html->setTitle('ADMIN');

if (!isset($_SESSION['ksdc'])) {
	include 'Controllers/admin/login/login.php';
} else {
	$profil = new ProfilAdmin($_SESSION['ksdc']);
	$html->addToTopNavigation("<a href='admin.php?page=profil_upr' title='Upravit profil'>{$profil->getName()}</a>");
	if ($profil->pravomocSeeOtherUsers) {
	   $html->addToTopNavigation("<a href='admin.php?page=users' title='Seznam všech uživatelů'>Uživatelé</a>");
	}
	
	if(isset($_GET['page']) && $_GET['page'] != "") {
		$html->setPage($_GET['page']);
	}
	
	$html->addToSideNavigation('<a href="admin.php?page=kazani" title="Kázání">Kázání</a>');
	$html->addToSideNavigation('<a href="admin.php?page=kalendar" title="Kalendář">Kalendář</a>');
	
	$html->addToTopNavigation('<a href="admin.php?page=unlog" title="Odhlásit se">Odhlásit se</a>');
	
	if (file_exists('Controllers/admin/' . $html->getPage() . '.php')) {
		include 'Controllers/admin/' . $html->getPage() . '.php';
	} else {
		include 'Controllers/NoPage/noPageFound.php';
	}
}

print include 'Views/page.php';