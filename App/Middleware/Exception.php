<?php
namespace App\Middleware;

class Exception extends \App\Controller\Base
{

    public function __construct(\Slim\Container $container)
    {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next)
    {

        try {
            return $next($request, $response);
        } catch (\Exception $ex) {
            $code = $ex->getCode() ?: 400;
            $this->monolog->addCritical($ex->getMessage(), [$request->getParsedBody()]);
            return $response->withJson(['status' => $code, 'msg' => $ex->getMessage()], $code);
        }
    }
}
