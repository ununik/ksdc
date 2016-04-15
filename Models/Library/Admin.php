<?php
namespace Library\Admin;

function safeText($text)
{
	return htmlspecialchars(addslashes($text));
}
function hashPassword($password){
	return md5('2016' . $password);
}