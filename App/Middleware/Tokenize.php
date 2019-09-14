<?php
namespace App\Middleware;

class Tokenize extends \App\Controller\Base
{

    public function __construct(\Slim\Container $container)
    {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next)
    {

        try {
            $token = substr($request->getHeaderLine('Authorization'),7);
            if(empty($token)){
                throw new \Exception('Token não pode estar vazio');
            }
            $var = $this->token->decodeToken($token);
            return $next($request->withAttribute('token', $var), $response);
        } catch (\Exception $ex) {
            $this->monolog->addAlert($ex->getMessage(), [$request->getHeaderLine('Authorization')]);
            return $response->withJson(['status' => 406, 'msg' => $ex->getMessage()], 406);
        }
    }
}
