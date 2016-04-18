<?php
class ProfilAdmin extends Connection
{
    private $_id = 0;
	private $_firstname = '';
	private $_lastname = '';
	private $_mail = '';
	public $pravomocAddUser = false;
	public $pravomocUprPravomoc = false;
	public $pravomocSeeOtherUsers = false;
	public $pravomocAddKazani = false;
	public $pravomocRecyklace = false;
	public $pravomocAddToKalendar = false;
	
	public function __construct($profilId)
	{
		$result = Connection::connect()->prepare(
			"SELECT * FROM `be_users` WHERE id=:id LIMIT 1;"
		);
		$result->execute(array(':id' => $profilId));
		$login = $result->fetch();
		
		$this->_id = $login['id'];
		$this->_firstname = $login['firstname'];
		$this->_lastname = $login['lastname'];
		$this->_mail = $login['mail'];
		$this->pravomocAddUser = $login['pravomoc-newUser'];
		$this->pravomocUprPravomoc = $login['pravomoc-uprPravomoc'];
		$this->pravomocSeeOtherUsers = $login['pravomoc-seeOtherUsers'];
		$this->pravomocAddKazani = $login['pravomoc-addKazani'];
		$this->pravomocRecyklace = $login['pravomoc-recyklace'];
		$this->pravomocAddToKalendar = $login['pravomoc-addToKalendar'];
	}
	
	public function getName()
	{
		if ($this->_firstname == '' && $this->_lastname == '') {
			return 'Profil';
		}
		return "{$this->_firstname} {$this->_lastname}";
	}
	
	public function getFirstname()
	{
	    return $this->_firstname;
	}
	public function getLastname()
	{
	    return $this->_lastname;
	}
	public function getMail()
	{
	    return $this->_mail;
	}
	
	public function updateProfil($firstname, $lastname, $mail)
    {
        $result = Connection::connect()->prepare(
            "UPDATE `be_users` SET `firstname`=:firstname,`lastname`=:lastname, `mail`=:mail ".
            "WHERE id=:id"
        );
        $result->execute(array(
            ':id' => $this->_id,
            ':firstname' => \Library\Admin\safeText($firstname),
            ':lastname' => \Library\Admin\safeText($lastname),
            ':mail' => \Library\Admin\safeText($mail)
        ));
        
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_mail = $mail;
	}
}