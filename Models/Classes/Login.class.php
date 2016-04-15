<?php
class Login extends Connection
{
	private $_login = '';
	private $_password = '';
	private $_err = array();
	
	public function getLogin()
	{
		return $this->_login;
	}
	
	public function checkLogin($login)
	{
		$this->_login = \Library\Admin\safeText($login);
	}
	
	public function checkPassword($password)
	{
		$this->_password = \Library\Admin\safeText($password);
	}
	
	public function getErrors()
	{
		return $this->_err;
	}
	
	public function checkInDB()
	{
		$result = Connection::connect()->prepare(
			"SELECT id FROM `be_users` WHERE login=:login AND password=:password LIMIT 1;"
		);
		$result->execute(array(':login' => $this->_login, ':password' => \Library\Admin\hashPassword($this->_password)));
		$login = $result->fetch();
		
		if (isset($login['id'])) {
			$_SESSION['ksdc'] = $login['id'];
			header ('location: admin.php');
			return;
		}
		
		$this->_err[] = "Špatné jméno nebo heslo";
		return;
	}
}