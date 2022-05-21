<?php

use Tools\BaseModel\BaseModel;
use NewJWTProvider\UseJWT ;

require_once('/Applications/MAMP/htdocs/app/backend/src/auth/BaseModel.php')  ;
require_once('/Applications/MAMP/htdocs/app/backend/src/auth/useJWT.php')  ;

class User extends BaseModel {
  
  public $error = "";
  // private $pdo = null;
  private $stmt = null;
  public $id_user ;
  public $email ; 
  public $password ;
  public $username ;
  public $table = 'users';
  public $all_users ;


  
  function __construct () {

    try {
      $this->pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);

    } 
    catch (Exception $ex) 
      { exit($ex->getMessage()); }
  }
 


  public function register_new_users($addData) {

    $data = $addData ;
    $sql = "INSERT INTO users ( `mail`, `password`, `users_name`, `privilege`) VALUES (:mail, :passwords, :users_name, :privilege)";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);

    $jwt = UseJWT::createJWT($data) ;

  }

  function get_All () {
    $this->all_users = $this->getAll($this->table) ;
    return $this->all_users ;
  }
  /**   Partie GETTER  */

  function get_user_ID(){ 
      $this->id_user  = $this->getOneById('user_id',$this->table, 38) ;
      return $this->id_user ;
  }

  function get_email () {
      $this->email = $this->getOneById('mail',$this->table, 38) ;
      return $this->email ;
  }


  function get_username () {
      $this->username = $this->getOneById('users_name',$this->table, 38);
      return $this->username ;
  }


  function get_password (){
      $this->getOneById('password',$this->table, 38);
  }


  public function login_user ($data_login) {
    $jwt_login = UseJWT::createJWT($data_login) ;

  }
}