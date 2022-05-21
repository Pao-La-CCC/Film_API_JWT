<?php 

namespace NewJWTProvider ;

use DateTimeImmutable;


use Firebase\JWT\JWT;



class UseJWT {

    
    static function createJWT($datas) {


        $id = uniqid() ;
        $role = "standard";
    
        $issuedAt   = new DateTimeImmutable() ;
        $expire     = $issuedAt->modify('+6 minutes')->getTimestamp();      
    
        $data = [
            'iat'  => $issuedAt->getTimestamp(),         
            'nbf'  => $issuedAt->getTimestamp(),         
            'exp'  => $expire,                           
            "data" => $datas                
        ];
    
        echo JWT::encode(
            $data,
            JWT_SECRET,
            JWT_ALGO
        );
    

    }

   



}