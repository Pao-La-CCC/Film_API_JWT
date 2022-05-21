<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require "./auth/config.php" ;
require "./auth/UserClass.php" ;
require "/Applications/MAMP/htdocs/app/backend/vendor/autoload.php";
require('/Applications/MAMP/htdocs/app/backend/vendor/firebase/php-jwt/src/JWT.php') ;



$email = $_POST['mail'] ;
$password = $_POST['password'] ;
$users_name = $_POST['usersName'] ;



// $email = "Laura@gmail.com" ;
// $password = "sanglier@" ;
// $users_name = "miele" ;

$data = [
    ':mail' => $email,
    ':passwords' => password_hash($password, PASSWORD_DEFAULT),
    ':users_name' => $users_name,
    ':privilege' => 'standards',
];
$conn_user = new User() ; 
$conn_user->register_new_users($data) ;




    

 




