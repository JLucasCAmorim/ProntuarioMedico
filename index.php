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
$app->get('/registrar', function ()
{
    $AuthController = new \App\Controllers\AuthController;
    $AuthController->create();
});
$app->post('/registrar', function ()
{
    $AuthController = new \App\Controllers\AuthController;
    $AuthController->store();
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
$app->get('/history', function ()
{
    $HomeController = new \App\Controllers\HomeController;
    $HomeController->history();
});
$app->post('/login', function ()
{
    $AuthController = new \App\Controllers\AuthController;
    $AuthController->login();
});
// adição de Pacientes
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
// adição de Medicos
// exibe o formulário de cadastro
$app->get('/medicos', function ()
{
    $MedicoController = new \App\Controllers\MedicoController;
    $MedicoController->index();
});
$app->get('/agendamentos', function ()
{
    $AgendamentoController = new \App\Controllers\AgendamentoController;
    $AgendamentoController->index();
});
$app->get('/add/medico', function ()
{
    $MedicoController = new \App\Controllers\MedicoController;
    $MedicoController->create();
});

$app->post('/add/agendamento', function ()
{
    $AgendamentoController = new \App\Controllers\AgendamentoController;
    $AgendamentoController->store();
});

$app->get('/add/agendamento', function ()
{
    $AgendamentoController = new \App\Controllers\AgendamentoController;
    $AgendamentoController->create();
});

$app->post('/add/medico', function ()
{
    $MedicoController = new \App\Controllers\MedicoController;
    $MedicoController->store();
});
// adição de Estados
$app->get('/estados', function($request){

  $id = $request->getAttribute('id');
  $ClientsController = new \App\Controllers\ClientsController;
  $ClientsController->states($_GET);


});
$app->get('/estados/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->states($id);
});
// edição de Pacientes
// exibe o formulário de edição
$app->get('/edit/{id}/{idcidade}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');
    $idcidade = $request-> getAttribute('idcidade');
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->edit($id, $idcidade);
});

// processa o formulário de edição
$app->post('/edit', function ()
{
    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->update();
});
// edição de Agendamentos
$app->get('/editar/agendamento/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $AgendamentoController = new \App\Controllers\AgendamentoController;
    $AgendamentoController->edit($id);
});
$app->post('/editar/agendamento', function ()
{
    $AgendamentoController = new \App\Controllers\AgendamentoController;
    $AgendamentoController->update();
});

// edição de Medicos
// exibe o formulário de edição
$app->get('/edit/medico/{id}/{idcidade}/{idestado}/{idesp}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');
    $idcidade = $request-> getAttribute('idcidade');
    $idestado = $request-> getAttribute('idestado');
    $idesp = $request-> getAttribute('idesp');
    $MedicoController = new \App\Controllers\MedicoController;
    $MedicoController->edit($id, $idcidade,$idestado,$idesp);
});

// processa o formulário de edição
$app->post('/edit/medico', function ()
{
    $MedicoController = new \App\Controllers\MedicoController;
    $MedicoController->update();
});

// remove um Paciente
$app->get('/remove/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $ClientsController = new \App\Controllers\ClientsController;
    $ClientsController->remove($id);
});
// remove um Medico
$app->get('/remove/medico/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');
    $MedicoController = new \App\Controllers\MedicoController;
    $MedicoController->remove($id);
});
// remove um Agendamento
$app->get('/remove/agendamento/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $AgendamentoController = new \App\Controllers\AgendamentoController;
    $AgendamentoController->remove($id);
});
// remover User
$app->get('/remove/user/{id}', function ($request)
{
    // pega o ID da URL
    $id = $request->getAttribute('id');

    $AuthController = new \App\Controllers\AuthController;
    $AuthController->remove($id);
});

$app->get('/add/atendimento/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $AtendimentoController = new \App\Controllers\AtendimentoController;
    $AtendimentoController->create($id);
});

$app->post('/add/atendimento', function ()
{
    $AtendimentoController = new \App\Controllers\AtendimentoController;
    $AtendimentoController->store();
});
$app->get('/add/sinais/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $SinaisController = new \App\Controllers\SinaisController;
    $SinaisController->create($id);
});

$app->post('/add/sinais', function ()
{
    $SinaisController = new \App\Controllers\SinaisController;
    $SinaisController->store();
});
$app->get('/add/hipotese/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $HipoteseController = new \App\Controllers\HipoteseController;
    $HipoteseController->create($id);
});

$app->post('/add/hipotese', function ()
{
    $HipoteseController = new \App\Controllers\HipoteseController;
    $HipoteseController->store();
});
$app->get('/add/prescricao/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $PrescricaoController = new \App\Controllers\PrescricaoController;
    $PrescricaoController->create($id);
});

$app->post('/add/prescricao', function ()
{
    $PrescricaoController = new \App\Controllers\PrescricaoController;
    $PrescricaoController->store();
});
$app->get('/add/evolucao/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $EvolucaoController = new \App\Controllers\EvolucaoController;
    $EvolucaoController->create($id);
});

$app->post('/add/evolucao', function ()
{
    $EvolucaoController = new \App\Controllers\EvolucaoController;
    $EvolucaoController->store();
});
$app->get('/add/atestado/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $AtestadoController = new \App\Controllers\AtestadoController;
    $AtestadoController->create($id);
});

$app->post('/add/atestado', function ()
{
    $AtestadoController = new \App\Controllers\AtestadoController;
    $AtestadoController->store();
});
$app->get('/timeline/{id}', function ($request)
{
    $id = $request->getAttribute('id');
    $HomeController = new \App\Controllers\HomeController;
    $HomeController->timeline($id);

});
$app->run();
