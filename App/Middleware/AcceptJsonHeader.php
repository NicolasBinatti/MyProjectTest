<?php
namespace App\Middleware;

class AcceptJsonHeader extends \App\Controller\Base
{

    public function __construct(\Slim\Container $container)
    {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next)
    {
        
        $content = !empty($request->getContentType()) ? $request->getContentType() : '';
        if ($content == 'application/json' || strpos($request->getUri()->getBasePath(), 'Web')) {
            return $next($request, $response);
        }
        echo '<pre>';
//        $this->monolog->addAlert('Erro de content-type / ' . $content . ' invalido');
        return $response->withJson(['status' => 415, 'msg' => 'Erro de content-type / ' . $content . ' invalido'], 415);
    }
}
