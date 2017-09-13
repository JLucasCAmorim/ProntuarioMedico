<?php
namespace App\Controllers;
use \App\Models\Client;
use \App\Models\City;
use \App\Models\State;
class ClientsController {

  /** * Listagem de usuários */
  public function index()
  {
    $clients = Client::selectAll(); \App\View::make('Index Paciente','clients/index', [ 'clients' => $clients,
        ]);
    }


    /**
     * Exibe o formulário de criação de usuário
     */
    public function create()
    {
        $estados = State::selectAll();
        $cidades = City::selectAll();

        \App\View::make('Inserindo Paciente','clients/create', [ 'cidades' => $cidades,
        'estados' => $estados]);
    }


    /**
     * Processa o formulário de criação de usuário
     */
    public function store()
    {
        // pega os dados do formuário
        $nomeCompleto = isset($_POST['nomeCompleto']) ? $_POST['nomeCompleto'] : null;
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
        $naturalidade = isset($_POST['naturalidade']) ? $_POST['naturalidade'] : null;
        $nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
        $celular= isset($_POST['celular']) ? $_POST['celular'] : null;
        $idcidade = isset($_POST['idcidade']) ? $_POST['idcidade'] : null;
        $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
        $nomePai = isset($_POST['nomePai']) ? $_POST['nomePai'] : null;
        $nomeMae = isset($_POST['nomeMae']) ? $_POST['nomeMae'] : null;
        $tipoSangue= isset($_POST['tipoSangue']) ? $_POST['tipoSangue'] : null;
        $datanascimento = isset($_POST['datanascimento']) ? $_POST['datanascimento'] : null;

        if (Client::save($nomeCompleto, $cpf, $rg, $datanascimento,
         $naturalidade, $nacionalidade, $email, $telefone, $celular, $idcidade,
          $cep, $complemento, $nomePai, $nomeMae, $tipoSangue))
        {
            header('Location: /pacientes');
            exit;
        }
    }



    /**
     * Exibe o formulário de edição de usuário
     */
    public function edit($idclient)
    {
        $client = Client::selectAll($idclient)[0];
        $estados = State::selectAll();
        $cidades = City::selectAll();
        \App\View::make('Editando Paciente','clients/edit',[
            'client' => $client, 'cidades' => $cidades,
            'estados' => $estados
        ]);
    }


    /**
     * Processa o formulário de edição de usuário
     */
    public function update()
    {
        // pega os dados do formuário
        $idclient = $_POST['idclient'];
        $nomeCompleto = isset($_POST['nomeCompleto']) ? $_POST['nomeCompleto'] : null;
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
        $naturalidade = isset($_POST['naturalidade']) ? $_POST['naturalidade'] : null;
        $nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
        $celular= isset($_POST['celular']) ? $_POST['celular'] : null;
        $idcidade = isset($_POST['idcidade']) ? $_POST['idcidade'] : null;
        $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
        $nomePai = isset($_POST['nomePai']) ? $_POST['nomePai'] : null;
        $nomeMae = isset($_POST['nomeMae']) ? $_POST['nomeMae'] : null;
        $tipoSangue= isset($_POST['tipoSangue']) ? $_POST['tipoSangue'] : null;
        $datanascimento = isset($_POST['datanascimento']) ? $_POST['datanascimento'] : null;
        if (Client::update($id, $nomeCompleto, $cpf, $rg, $datanascimento,
         $naturalidade, $nacionalidade, $email, $telefone, $celular, $idcidade,
          $cep, $complemento, $nomePai, $nomeMae, $tipoSangue))
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
            header('Location: /pacientes');
            exit;
        }
    }

    public function states(){
      $states = State::selectAll($id);

      echo json_encode(array("erro" => "0", "proc" => $states));
    }
}
