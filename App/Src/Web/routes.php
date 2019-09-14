<?php
$app->group('/admin', function() {
    $this->get('', \App\Controller\Cliente\MenuView::class);
    $this->get('/login', \App\Controller\Cliente\LoginView::class);
    $this->get('/cadastro', \App\Controller\Cliente\CadastroView::class);
    $this->get('/relatorio', \App\Controller\Cliente\RelatorioView::class);
    $this->get('/editar', \App\Controller\Cliente\CadastroView::class);
});

