<?php


namespace Tools\BaseModel ;



use PDO ;
use PDOException ;

abstract class BaseModel  { 

    public PDO $pdo;
    public $_table ;

    public function __construct() {

        try {
            $this->pdo = new PDO(
              "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
              DB_USER, DB_PASSWORD, [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
      
          } 
          catch (PDOException $ex) 
            { exit($ex->getMessage()); }

    }

        public function getPdo(): PDO
        {
            return $this->pdo;
        }

		
		public function getAllById($table , $id)
		{
			$req = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE id=?");
			$req->execute(array($id));
			print_r($req->fetch()) ;
			return $req->fetch();
		}

		public function getOneById ($element,$table , $id) {
			$req = $this->pdo->prepare("SELECT ". $element . " FROM " . $table . " WHERE id=?");
			$req->execute(array($id));
			print_r($req->fetch()) ;
			return $req->fetch();
		}
	
		public function getAll($table ) {
			$req = $this->pdo->prepare("SELECT * FROM " . $table);
			$req->execute();
			// $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->_obj);
			echo "<pr>" ;
			print_r($req->fetchAll()) ;
			echo "<pr>" ;
			return $req->fetchAll();
		}
		
		// public function create($obj)
		// {
			
		// }
		
		// public function update($obj)
		// {
			
		// }
		
		public function delete($table , $obj)
		{
			$req = $this->pdo->prepare("DELETE FROM " . $table . " WHERE id=?");
			return $req->execute(array($obj->id));
		}
	



    


}