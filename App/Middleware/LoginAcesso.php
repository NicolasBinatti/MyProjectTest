<?php
namespace App\Middleware;

class LoginAcesso extends \App\Controller\Base
{

    public function __construct(\Slim\Container $container)
    {
        parent::__construct($container);
    }

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next)
    {
        $token = substr($request->getHeaderLine('Authorization'), 7);
        $version = $request->getUri();
        $var = $this->token->decodeToken($token);

        try {
            switch ($version->getBasePath()) {
                case '/vHomologacao':
                    $v = 1;
                    break;
                case '/v1';
                    $v = 2;
                    break;
                default :
                    throw new \Exception('Serviço fora de Versao');
            }

            if ($var->type != $v) {
                throw new \Exception('Token invalido para essa versao.');
            }

            return $next($request, $response);
        } catch (\Exception $e) {
            return $response->withStatus(406, $e->getMessage());
        }
    }
}
