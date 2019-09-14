<?php

$app->group('/teste', function() {
            $this->get('/testando', \App\Controller\Teste\ControllerTeste::class);
        })
        ->add(\App\Middleware\AcceptJsonHeader::class);

$app->group('/viaCep', function() {
    $this->get('/consulta', \App\Controller\ViaCep\ConsultaCep::class);
});

$app->group('/login', function() {
    $this->post('', \App\Controller\Cliente\Login::class);
});

$app->group('/cadastro', function() {
            $this->post('/save', '\App\Controller\Cliente\Cliente:save');
            $this->post('/load', '\App\Controller\Cliente\Cliente:read');
            $this->post('/oneLoad', '\App\Controller\Cliente\Cliente:oneLoad');
            $this->post('/delete', '\App\Controller\Cliente\Cliente:delete');
            $this->post('/update', '\App\Controller\Cliente\Cliente:update');
        })
        ->add(\App\Middleware\Login::class);
