<?php

namespace App\Controller\Cliente;

class Cliente extends \App\Controller\Base {

    public function __construct(\Slim\Container $container) {
        parent::__construct($container);
    }

    public function delete(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $idcliente = $request->getParam('idcliente', null);
        $model = new \App\Model\Cliente\Cliente();
        return $response->withJson($model->delete($idcliente));
    }

    public function save(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $data = \App\Helpers\UtfEncode::utf8_decode_recursive($request->getParam('data'));
        $model = new \App\Model\Cliente\Cliente();
        return $response->withJson($model->saveData($data));
    }

    public function read(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $date = $request->getParam('idcliente');
        $model = new \App\Model\Cliente\Cliente();
        return $response->withJson($model->loadAllData($date));
    }

    public function update(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $data = \App\Helpers\UtfEncode::utf8_decode_recursive($request->getParam('data'));
        $model = new \App\Model\Cliente\Cliente();
        return $response->withJson($model->update($data));
    }

    public function oneLoad(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        $idcliente = $request->getParam('idcliente');
        $model = new \App\Model\Cliente\Cliente();
        return $response->withJson($model->loadOneData($idcliente));
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response) {
        return true;
    }

}
