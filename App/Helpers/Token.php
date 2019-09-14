<?php
namespace App\Helpers;

use \Firebase\JWT\JWT;

class Token extends JWT {

    private $key = 'ChaveParaoJWT';
    
    public function __construct($key){
        
        $this->key = $key;
    }

    public function encodeToken(array $data, string $expiration = '1 day') {
        $_date = new \DateTime();
        $token = [
            'iss' => 'http://japensouemumlink.com.br',
            'iat' => $_date->getTimestamp(),
            'exp' => $_date->add(\DateInterval::createFromDateString($expiration))->getTimestamp(),
            'sub' => 666
        ];
        $_data = array_merge($token, $data);
        $dados = array_merge($token, $_data);
        
        return parent::encode($dados,  $this->key, 'HS256');
    }

    public function decodeToken($token) {
        
        return parent::decode($token, $this->key, ['HS256']);
    }

}
