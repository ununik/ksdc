<?php
$container = '<h1>Login</h1>';

if (count($login->getErrors()) > 0) {
	$container .= '<ul>';
	foreach ($login->getErrors() as $err) {
		$container .= '<li>' . $err . '</li>';
	}
	$container .= '</ul>';
}

$container .= '<form action="" method="post">';

$container .= '<div class="form_input_text_and_labels">';
$container .= '<label for="login">Login</label>';
$container .= "<input type='text' name='login' id='login' value='{$login->getLogin()}'>";
$container .= '</div>';

$container .= '<div class="form_input_text_and_labels">';
$container .= '<label for="password">Heslo</label>';
$container .= "<input type='password' name='password' id='password' value=''>";
$container .= '</div>';

$container .= '<input type="submit" value="Přihlásit se" class="form_submit">';

$container .= '</form>';

return $container;