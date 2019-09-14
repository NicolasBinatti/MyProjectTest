<?php

namespace App\Controller\Cliente;

class Login extends \App\Controller\Base {

    public function __construct(\Slim\Container $container) {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $user = $request->getParam('user', null);
        $pass = $request->getParam('pass', null);
        $model = new \App\Model\Cliente\Login();

        $login = $model->loadOneData($user, $pass);
        if (empty($login)) {
            return $response->withJson(["code" => 400, "msg" => "Login Invalido"]);
        }

        return $response->withJson(["code" => 200, "msg" => "Logado com Sucesso"]);
    }

}
