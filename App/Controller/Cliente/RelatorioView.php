<?php
namespace App\Controller\Cliente;
use App\Helpers\OpenView;

class RelatorioView extends \App\Controller\Base
{

    public function __construct(\Slim\Container $container)
    {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response)
    {
        OpenView::dir('relatorio.html');
    }
}
