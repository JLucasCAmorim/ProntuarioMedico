<?php
namespace App\Controllers;
use \App\Models\Client;
use \App\Models\City;
use \App\Models\State;
class ClientsController {

  /** * Listagem de usuários */
  public function index()
  {
    session_start();
    if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['admin'])))
    {
    $clients = Client::selectAll(); 
    \App\View::make('Pacientes','clients/index', [ 'clients' => $clients,
        ]);
    }
    else{
        \App\View::make('Login','Auth/login');
      }
    }


    /**
     * Exibe o formulário de criação de usuário
     */
    public function create()
    {
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['admin'])))
        {
        $estados = State::selectAll();
        $cidades = City::selectAll();

        \App\View::make('Inserindo Paciente','clients/create', [ 'cidades' => $cidades,
        'estados' => $estados]);
          }
          else{
            \App\View::make('Login','Auth/login');
        }
    }

    /**
     * Processa o formulário de criação de usuário
     */
    public function store()
    {
        session_start();
        $estados = State::selectAll();
        $cidades = City::selectAll();
        $dados = $_POST;
        // pega os dados do formuário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
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

        if(empty($_POST['idcidade']) && Client::rg($rg) == true && Client::cpf($cpf) == true  ){
            $cidade_error = "Selecione sua cidade";
            $rg_error = "RG já está inserido!";
            $cpf_error = "CPF já está inserido!";
            \App\View::make('Inserindo Paciente','clients/create', ['cpf_error' => $cpf_error,'rg_error' => $rg_error,'cidade_error' => $cidade_error,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]);
        }
        elseif(Client::rg($rg) == true && Client::cpf($cpf) == true ){
            $rg_error = "RG já está inserido!";
            $cpf_error = "CPF já está inserido";
            \App\View::make('Inserindo Paciente','clients/create', ['cpf_error' => $cpf_error ,'rg_error' => $rg_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]); 
        }
        elseif(Client::cpf($cpf) == true &&  empty($_POST['idcidade'])  ){
            $cpf_error = "CPF já está inserido!";
            $cidade_error = "Selecione sua cidade";
            \App\View::make('Inserindo Paciente','clients/create', ['cidade_error' => $cidade_error,'cpf_error' => $cpf_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]); 
        }
        
        elseif(empty($_POST['idcidade']) == true && Client::rg($rg) == true  ){
            $cidade_error = "Selecione sua cidade";
            $rg_error = "RG já está inserido!";
            \App\View::make('Inserindo Paciente','clients/create', ['rg_error' => $rg_error ,'cidade_error' => $cidade_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]); 
        }
        elseif(Client::cpf($cpf) == true ){
            $cpf_error = "CPF já está inserido!";
            
            \App\View::make('Inserindo Paciente','clients/create', ['cpf_error' => $cpf_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]); 
        }
        elseif(Client::rg($rg) == true){
            $rg_error = "RG já está inserido!";
            \App\View::make('Inserindo Paciente','clients/create', ['rg_error' => $rg_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]); 
        }
        elseif(empty($_POST['idcidade'])){
            $cidade_error = "Selecione sua cidade";
            \App\View::make('Inserindo Paciente','clients/create', ['cidade_error' => $cidade_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]);
        }
        elseif(empty($_POST['datanascimento'])){
            $data_error = "Selecione sua data de Nascimento";
            \App\View::make('Inserindo Paciente','clients/create', ['data_error' => $data_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades]);
        }
        
        if (Client::save($nome, $cpf, $rg, $datanascimento,
         $naturalidade, $nacionalidade, $email, $telefone, $celular, $idcidade,
          $cep, $complemento, $nomePai, $nomeMae, $tipoSangue))
        {
            session_start();
            $sucessMsg = "Cadastro adicionado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /pacientes');
            exit;
        }
        
    }



    /**
     * Exibe o formulário de edição de usuário
     */
    public function edit($id, $idcidade)
    {   
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['admin'])))
        {
        $client = Client::selectAll($id)[0];
        $cidadeclient = City::selectAll($idcidade)[0];
        $estados = State::selectAll();

        \App\View::make('Editando Paciente','clients/edit',[
            'client' => $client,
            'estados' => $estados, 'cidadeclient' => $cidadeclient
        ]);
        }
        else{
            \App\View::make('Login','Auth/login');
        }
    }

    /**
     * Processa o formulário de edição de usuário
     */
    public function update()
    {
        // pega os dados do formuário
        $idclient = $_POST['idclient'];
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
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



        if (Client::update($idclient, $nome, $cpf, $rg, $datanascimento,
         $naturalidade, $nacionalidade, $email, $telefone, $celular, $idcidade,
          $cep, $complemento, $nomePai, $nomeMae, $tipoSangue))
        {
            session_start();
            $sucessMsg = "Cadastro editado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /pacientes');
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
            session_start();
            $sucessMsg = "Cadastro removido com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /pacientes');
            exit;
        }
    }

    public function states($id){


      $cidades = City::selectAll();

      foreach ($cidades as $cidade ) {
        if ($cidade['estado'] == $id['id'] ) {
          echo "<option value=" .$cidade[id] . ">" . utf8_encode($cidade['nome']) . "</option>";
        }
      }

    }
}
