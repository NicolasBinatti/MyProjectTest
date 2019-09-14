<?php
namespace App\Controller\ViaCep;

class ConsultaCep extends \App\Controller\Base
{

    public function __construct(\Slim\Container $container)
    {
        parent::__construct($container);
    }

    public function action($string): string
    {
        $url = 'https://viacep.com.br/ws/' . $string . '/json/';
        return $this->client->request('GET', $url)
                ->getBody()->getContents();
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response)
    {
        $cep = $request->getParam('cep', null);

        try {
            $ret = $this->action($cep);
            if (!empty(json_decode($ret)->erro)) {
                throw new \Exception('', 400);
            }

            return $ret;
        } catch (\Exception $ex) {
            return $response->withJson(['status' => $ex->getCode(), 'msg' => 'Cep Invalido']);
        }
    }
}
