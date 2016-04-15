<?php
class Users extends Connection
{
    public $countOfColloms = 3;
    
    public function getAllUsers() {
        $result = Connection::connect()->prepare(
			"SELECT * FROM `be_users`;"
		);
		$result->execute();
		return $result->fetchAll();
    }
}