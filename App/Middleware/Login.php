<?php

namespace App\Middleware;

class Login extends \App\Controller\Base {

    public function __construct(\Slim\Container $container) {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next) {
        try {
            $auth = $request->getHeaders();

            if (empty($auth['HTTP_AUTHORIZATION'][0])) {
                throw new \Exception('Login inexistente.');
            }
            $base = substr($auth['HTTP_AUTHORIZATION'][0], 6, 999999);

            $arr = explode(':', base64_decode($base));
            $model = new \App\Model\Cliente\Login();
            $login = $model->loadOneData($arr[0], $arr[1]);


            if (empty($login)) {
                throw new \Exception('Autorizacao Invalida.');
            }
            return $next($request, $response);
        } catch (\Exception $e) {
            return $response->withStatus(406, $e->getMessage());
        }
    }

}
