<?php
namespace App\Controllers;
use \App\Models\Client;
use \App\Models\City;
use \App\Models\State;
class ClientsController {

  /** * Listagem de usuários */
  public function index()
  {
    $clients = Client::selectAll(); \App\View::make('clients/index', [ 'clients' => $clients,
        ]);
    }


    /**
     * Exibe o formulário de criação de usuário
     */
    public function create()
    {
        $estados = State::selectAll();
        $cidades = City::selectAll();

        \App\View::make('clients/create', [ 'cidades' => $cidades,
        'estados' => $estados]);
    }


    /**
     * Processa o formulário de criação de usuário
     */
    public function store()
    {
        // pega os dados do formuário
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        if (Client::save($name, $email, $gender, $birthdate))
        {
            header('Location: /');
            exit;
        }
    }



    /**
     * Exibe o formulário de edição de usuário
     */
    public function edit($id)
    {
        $client = Client::selectAll($id)[0];

        \App\View::make('clients/edit',[
            'client' => $client,
        ]);
    }


    /**
     * Processa o formulário de edição de usuário
     */
    public function update()
    {
        // pega os dados do formuário
        $id = $_POST['id'];
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        if (Client::update($id, $name, $email, $gender, $birthdate))
        {
            header('Location: /');
            exit;
        }
    }


    /**
     * Remove um usuário
     */
    public function remove($id)
    {
        if (Client::remove($id))
        {
            header('Location: /');
            exit;
        }
    }
}
