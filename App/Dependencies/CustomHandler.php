<?php

namespace App\Dependencies;

class CustomHandler {

    public function __construct($tipo = 500) {
        $this->tipo = $tipo;
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        return $response->withStatus($this->tipo)->withHeader('Content-Type', 'application/json');
    }

}
