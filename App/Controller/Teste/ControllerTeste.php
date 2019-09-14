<?php
namespace App\Controller\Teste;

class ControllerTeste extends \App\Controller\Base
{

    public function __construct(\Slim\Container $container)
    {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response)
    {
        $id = $request->getParam('id', 10);
        print_r($id);exit;
        
    }
}
