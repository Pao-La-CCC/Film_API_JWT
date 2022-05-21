<?php


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once("./auth/config.php" ) ;
require_once('/Applications/MAMP/htdocs/app/backend/src/auth/commentsClass.php')  ;