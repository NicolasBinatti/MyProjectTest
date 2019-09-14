<?php
namespace App\Middleware;

class Cors
{

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, $next)
    {
        if ($request->getMethod() <> 'OPTIONS') {
            $response = $next($request, $response);
        }
        if ($request->getMethod() == 'OPTIONS') {
            $response->withHeader('Content-Type', 'text/plain');
        }
        return $response->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }
}
