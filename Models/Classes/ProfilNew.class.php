<?php
class ProfilNew extends Connection
{
    private $_firstname = '';
    private $_lastname = '';
    private $_login = '';
    private $_password = '';
    private $_addNewUser = false;
    private $_uprPravomoc = false;
    private $_seeAllUser = false;
    private $_err = array();
    
    public function checkSeeAllUser($value)
    {
        $this->_seeAllUser = $value;
    }
    public function seeAllUsers()
    {
        return $this->_seeAllUser;
    }
    public function checkAddNewUser($value)
    {
        $this->_addNewUser = $value;
    }
    public function addNewUser()
    {
        return $this->_addNewUser;
    }
    public function checkUprPravomoc($value)
    {
        $this->_uprPravomoc = $value;
    }
    public function uprPravomoc()
    {
        return $this->_uprPravomoc;
    }
    
    public function checkFirstname($name)
    {
        $this->_firstname = \Library\Admin\safeText($name);
    }
    public function checkLastname($name)
    {
        $this->_lastname = \Library\Admin\safeText($name);
    }
    public function getFirstname()
    {
        return $this->_firstname;
    }
    public function getLastname()
    {
        return $this->_lastname;
    }
    
    public function checkLogin($login)
    {
        $this->_login = \Library\Admin\safeText($login);
        
        if (strlen($this->_login) > 255) {
            $this->_err[] = 'Příliš dlouhý login!';
        }
        if (strlen($this->_login) == 0) {
            $this->_err[] = 'Není vyplněný login!';
        }
    }
    public function getLogin()
    {
        return $this->_login;
    }
    
    public function checkPassword($password)
    {
        $this->_password = \Library\Admin\safeText($password);
        
        if (strlen($this->_password) == 0) {
            $this->_err[] = 'Není vyplněné heslo!';
        }
    }
    
    public function getErrors()
    {
        return $this->_err;
    }
    
    public function addUser()
    {
        $result = Connection::connect()->prepare(
            "INSERT INTO `be_users`(`login`, `password`, `firstname`, `lastname`, `pravomoc-newUser`, `pravomoc-uprPravomoc`, `addByUser`, `pravomoc-seeOtherUsers`) VALUES (:login, :password, :firstname, :lastname, :newUser, :uprPravomoc, :id, :seeOthers)"
        );
        $result->execute(array(
            ':id' => $_SESSION['ksdc'],
            ':firstname' => $this->_firstname,
            ':lastname' => $this->_lastname,
            ':login' => $this->_login,
            ':password' => \Library\Admin\hashPassword($this->_password),
            ':newUser' => $this->_addNewUser,
            ':uprPravomoc' => $this->_uprPravomoc,
            ':seeOthers' => $this->_seeAllUser
        ));
    }
}