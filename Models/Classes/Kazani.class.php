<?php
class Kazani extends Connection
{
    public $date = '';
    public $time = 0;
    public $nazev = '';
    public $autor = '';
    public $dnyVTydnu = array('Ne', 'Po', 'Út', 'St', 'Čt', 'Pá', 'So', 'Ne');
    private $_autorId = 0;
    public $odkaz = '';
    public $popis = '';
    private $_err = array();
    
    public function getAllKazatele()
    {
        $result = Connection::connect()->prepare(
                "SELECT * FROM `kazani_autor` ORDER BY jmeno;"
                );
        $result->execute();
        return $result->fetchAll();
    }
    public function getAllKazani()
    {
        $result = Connection::connect()->prepare(
                "SELECT * FROM `kazani` WHERE active=1 ORDER BY date DESC;"
                );
        $result->execute();
        return $result->fetchAll();
    }
    public function getAllKazaniFromKos()
    {
    	$result = Connection::connect()->prepare(
    			"SELECT * FROM `kazani` WHERE active=0 ORDER BY date DESC;"
    	);
    	$result->execute();
    	return $result->fetchAll();
    }
    public function getAutor($id)
    {
        $result = Connection::connect()->prepare(
                "SELECT * FROM `kazani_autor` WHERE id=:id;"
                );
        $result->execute(array(':id' => $id));
        return $result->fetch();
    }
    
    public function checkDatum($date)
    {
        $this->date = \Library\Admin\safeText($date);
        $time = strtotime(\Library\Admin\safeText($date));
        if ($time == 0) {
            $this->_err[] = 'Špatné datum!';
        }
        $this->time = $time;
        
    }
    public function checkNazev($new)
    {
        $this->nazev = \Library\Admin\safeText($new);
        if (strlen($this->nazev) == 0) {
            $this->_err[] = 'Není vyplněný název!';
        }
        if (strlen($this->nazev) > 255) {
            $this->_err[] = 'Název je příliš dlouhý!';
        }
    }
    public function checkAuthor($new)
    {
        $this->autor = \Library\Admin\safeText($new);
        if (strlen($this->autor) > 255) {
            $this->_err[] = 'Autor je příliš dlouhý!';
        }
    }
    public function checkOdkaz($new)
    {
        $this->odkaz = \Library\Admin\safeText($new);
        
        if ($this->odkaz != "") {
            if (!filter_var($this->odkaz, FILTER_VALIDATE_URL) === false) {
            } else {
                $this->odkaz = 'http://' . $this->odkaz;
            }
        }
        
        if (strlen($this->odkaz) > 255) {
            $this->_err[] = 'Odkaz je příliš dlouhý!';
        }
    }
    public function checkPopis($new)
    {
        $this->popis = \Library\Admin\safeText($new);
    }
    
    public function getErrors()
    {
        return $this->_err;
    }
    
    public function setAutor()
    {
        $result = Connection::connect()->prepare(
            "SELECT `id` FROM `kazani_autor` WHERE `jmeno` LIKE '%{$this->autor}%';"
        );
        $result->execute();
        $autor = $result->fetch();
        
        if (isset($autor['id']) && ($autor['id'] != 0 || $autor['id'] != '' )) {
            return $this->_autorId = $autor['id'];
        }
        
        $result = Connection::connect()->prepare(
            "INSERT INTO `kazani_autor`(`jmeno`) VALUES (:jmeno);"
        );
        $result->execute(array(':jmeno' => $this->autor));
        
        return $this->_autorId = Connection::connect()->lastInsertId();
    }
    
    public function saveNew()
    {
        $result = Connection::connect()->prepare(
                "INSERT INTO `kazani`(`date`, `nazev`, `autor`, `odkaz`, `popis`, `createdBy`, `timestamp`) VALUES (:date, :nazev, :autor, :odkaz, :popis, :createdBy, :timestamp);"
                );
        $result->execute(array(
            ':date' => $this->time,
            ':nazev' => $this->nazev,
            ':autor' => $this->_autorId,
            ':odkaz' => $this->odkaz,
            ':popis' => $this->popis,
            ':createdBy' => $_SESSION['ksdc'],
            ':timestamp' => time()
        ));
    }
    
    public function update($id)
    {
        $result = Connection::connect()->prepare(
                "UPDATE `kazani` SET `date`=:date,`nazev`=:nazev,`autor`=:autor,`odkaz`=:odkaz,`popis`=:popis WHERE id=:id;"
                );
        $result->execute(array(
                ':date' => $this->time,
                ':id' => $id,
                ':nazev' => $this->nazev,
                ':autor' => $this->_autorId,
                ':odkaz' => $this->odkaz,
                ':popis' => $this->popis
        ));
    }
    
    public function delete($id)
    {
        $result = Connection::connect()->prepare(
                "UPDATE `kazani` SET `active`=0 WHERE id=:id;"
                );
        $result->execute(array(
                ':id' => $id
        ));
    }
    public function kazaniFromKos($id)
    {
    	$result = Connection::connect()->prepare(
    			"UPDATE `kazani` SET `active`=1 WHERE id=:id;"
    	);
    	$result->execute(array(
    			':id' => $id
    	));
    }
    
    public function getOneKazani($id)
    {
        $result = Connection::connect()->prepare(
                "SELECT * FROM `kazani` WHERE id=:id AND active=1 ;"
                );
        $result->execute(array(':id' => $id));
        $kazani = $result->fetch();
        $this->nazev = $kazani['nazev'];
        $this->odkaz = $kazani['odkaz'];
        $this->popis = $kazani['popis'];
        $this->date = date("Y-m-d", $kazani['date']);
        $this->autor = $this->getAutor($kazani['autor'])['jmeno'];
        
        return $kazani;
    }
}