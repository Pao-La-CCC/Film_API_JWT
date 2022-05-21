<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require "./auth/config.php" ;
require "/Applications/MAMP/htdocs/app/backend/src/auth/UserClass.php" ;
require "/Applications/MAMP/htdocs/app/backend/vendor/autoload.php";
require('/Applications/MAMP/htdocs/app/backend/vendor/firebase/php-jwt/src/JWT.php') ;
require_once('/Applications/MAMP/htdocs/app/backend/src/auth/useJWT.php')  ;




$email = $_POST['mail'] ;
$password = $_POST['password'] ;
$users_name = $_POST['usersName'] ;


// $email = "Laura@gmail.com" ;
// $password = "sanglier@" ;
// $users_name = "miele" ;


if( empty($email ) || empty($password ) || empty($users_name)) {

    exit("Impossible de continuer");

}
else {


$data = [
    ':mail' => $email,
    ':passwords' => password_hash($password, PASSWORD_DEFAULT),
    ':users_name' => $users_name,
    ':privilege' => 'standards',
];

$login = new User() ;
$login->login_user($data) ;

  

    
}


