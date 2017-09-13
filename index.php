<?php
require 'vendor/autoload.php';
require 'init.php';
// inclui o autoloader do Composer require 'vendor/autoload.php';
// inclui o arquivo de inicialização require 'init.php';
 // instancia o Slim, habilitando os erros (útil para debug, em desenvolvimento)
 $app = new \Slim\App([ 'settings' => [
        'displayErrorDetails' => true
    ]
]);

// página inicial
// listagem de usuários
$app->get('/', function ()
{
    $AuthController = new \App\Controllers\AuthController;
    $AuthController->index();
});
$app->get('/estados', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->states();
});

$app->post('/logout', function ()
{
    $AuthController = new \App\Controllers\AuthController;
    $AuthController->logout();
});
$app->get('/home', function ()
{
    $HomeController = new \App\Controllers\HomeController;
    $HomeController->index();
});
$app->post('/login', function ()
{
    $AuthController = new \App\Controllers\AuthController;
    $AuthController->login();
});
// adição de usuário
// exibe o formulário de cadastro
$app->get('/pacientes', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->index();
});
$app->get('/add', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->create();
});

// processa o formulário de cadastro
$app->post('/add', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->store();
});


// edição de usuário
// exibe o formulário de edição
$app->get('/edit/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->edit($id);
});

// processa o formulário de edição
$app->post('/edit', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->update();
});

// remove um usuário
$app->get('/remove/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->remove($id);
});

$app->run();
