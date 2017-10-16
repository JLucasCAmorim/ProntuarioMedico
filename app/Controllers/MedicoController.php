<?php
namespace App\Controllers;
use \App\Models\Medico;
use \App\Models\City;
use \App\Models\State;
use \App\Models\Especialidade;
class MedicoController {

  /** * Listagem de usuários */
  public function index()
  {
    session_start();
    if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['admin'])))
    {
    $medicos = Medico::selectAll(); 
    \App\View::make('Médicos','medicos/index', [ 'medicos' => $medicos,
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
        $especialidades = Especialidade::selectAll();
        \App\View::make('Inserindo Médico','medicos/create', [ 'cidades' => $cidades,
        'estados' => $estados, 'especialidades' => $especialidades]);
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
        $especialidades = Especialidade::selectAll();
        $dados = $_POST;
        // pega os dados do formuário
        $nomeCompleto = isset($_POST['nomeCompleto']) ? $_POST['nomeCompleto'] : null;
        $crm = isset($_POST['crm']) ? $_POST['crm'] : null;
        $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $naturalidade = isset($_POST['naturalidade']) ? $_POST['naturalidade'] : null;
        $nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
        $celular= isset($_POST['celular']) ? $_POST['celular'] : null;
        $idestado = isset($_POST['idestado']) ? $_POST['idestado'] : null;
        $idcidade = isset($_POST['idcidade']) ? $_POST['idcidade'] : null;
        $idesp = isset($_POST['idesp']) ? $_POST['idesp'] : null;
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
        $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
        $trabalho = isset($_POST['trabalho']) ? $_POST['trabalho'] : null;
        $datanascimento = isset($_POST['datanascimento']) ? $_POST['datanascimento'] : null;

        if(empty($_POST['idesp']) && empty($_POST['idcidade']) && Medico::rg($rg) == true && Medico::cpf($cpf) == true  && Medico::crm($crm) == true ){
            $cidade_error = "Selecione sua cidade";
            $rg_error = "RG já está inserido!";
            $crm_error = "CRM já está inserido!";
            $cpf_error = "CPF já está inserido!";
            $especialidade_error = "Selecione sua especilidade";
            \App\View::make('Inserindo Médico','medicos/create', ['especilidade_error' => $especilidade_error,'crm_error' => $crm_error,'cpf_error' => $cpf_error,'rg_error' => $rg_error,'cidade_error' => $cidade_error,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]);
        }
        elseif(Medico::rg($rg) == true && Medico::cpf($cpf) == true ){
            $rg_error = "RG já está inserido!";
            $cpf_error = "CPF já está inserido";
            \App\View::make('Inserindo Médico','medicos/create', ['cpf_error' => $cpf_error ,'rg_error' => $rg_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]); 
        }
        elseif(Medico::cpf($cpf) == true &&  empty($_POST['idcidade'])){
            $cpf_error = "CPF já está inserido!";
            $cidade_error = "Selecione sua cidade";
            \App\View::make('Inserindo Médico','medicos/create', ['cidade_error' => $cidade_error,'cpf_error' => $cpf_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]); 
        }
        elseif(Medico::cpf($cpf) == true &&  empty($_POST['idcidade']) &&  empty($_POST['idesp'])){
            $cpf_error = "CPF já está inserido!";
            $especialidade_error = "Selecione sua especilidade";
            $cidade_error = "Selecione sua cidade";
            \App\View::make('Inserindo Médico','medicos/create', ['especilidade_error' => $especilidade_error,'cidade_error' => $cidade_error,'cpf_error' => $cpf_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]); 
        }
        
        elseif(empty($_POST['idcidade']) == true && Medico::rg($rg) == true  ){
            $cidade_error = "Selecione sua cidade";
            $rg_error = "RG já está inserido!";
            \App\View::make('Inserindo Médico','medicos/create', ['rg_error' => $rg_error ,'cidade_error' => $cidade_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]); 
        }
        elseif(Medico::cpf($cpf) == true ){
            $cpf_error = "CPF já está inserido!";
            
            \App\View::make('Inserindo Médico','medicos/create', ['cpf_error' => $cpf_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]); 
        }
        elseif(Medico::crm($crm) == true){
            $crm_error = "CRM já está inserido!";
            \App\View::make('Inserindo Médico','medicos/create', ['crm_error' => $crm_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]); 
        }
        elseif(Medico::rg($rg) == true){
            $rg_error = "RG já está inserido!";
            \App\View::make('Inserindo Médico','medicos/create', ['rg_error' => $rg_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]); 
        }
        elseif(empty($_POST['idcidade'])){
            $cidade_error = "Selecione sua cidade";
            \App\View::make('Inserindo Médico','medicos/create', ['cidade_error' => $cidade_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]);
        }
        elseif(empty($_POST['idesp'])){
            $especialidade_error = "Selecione sua especialidade";
            \App\View::make('Inserindo Médico','medicos/create', ['especialidade_error' => $especialidade_error ,'dados' => $dados,
            'estados' => $estados, 'cidades'=> $cidades, 'especialidades' => $especialidades]);
        }
       
        
        if (Medico::save($idmedico, $nomeCompleto, $crm, $cpf, $rg, $datanascimento,
         $naturalidade, $nacionalidade, $email, $telefone, $celular, $idesp, $idestado,
         $idcidade, $endereco, $bairro,$cep, $complemento, $trabalho))
        {
            session_start();
            $sucessMsg = "Médico adicionado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /medicos');
            exit;
        }
        
    }



    /**
     * Exibe o formulário de edição de usuário
     */
    public function edit($id, $idcidade,$idestado,$idesp)
    {   
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['admin'])))
        {
        $medico = Medico::selectAll($id)[0];
        $cidademedico = City::selectAll($idcidade)[0];
        $medicoestado = State::selectAll($idestado)[0];
        $estados = State::selectAll();
        $medicoesp = Especialidade::selectAll($idesp)[0];
        $especialidades = Especialidade::selectAll();
        \App\View::make('Editando Medico','medicos/edit',[
            'medico' => $medico, 'estados' => $estados,
            'medicoestado' => $medicoestado, 'cidademedico' => $cidademedico,
            'especialidades' => $especialidades,
            'medicoesp' => $medicoesp
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
        $idmedico = $_POST['idmedico'];
        $nomeCompleto = isset($_POST['nomeCompleto']) ? $_POST['nomeCompleto'] : null;
        $crm = isset($_POST['crm']) ? $_POST['crm'] : null;
        $rg = isset($_POST['rg']) ? $_POST['rg'] : null;
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
        $naturalidade = isset($_POST['naturalidade']) ? $_POST['naturalidade'] : null;
        $nacionalidade = isset($_POST['nacionalidade']) ? $_POST['nacionalidade'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
        $celular= isset($_POST['celular']) ? $_POST['celular'] : null;
        $idestado = isset($_POST['idestado']) ? $_POST['idestado'] : null;
        $idcidade = isset($_POST['idcidade']) ? $_POST['idcidade'] : null;
        $idesp = isset($_POST['idesp']) ? $_POST['idesp'] : null;
        $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
        $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
        $complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
        $trabalho = isset($_POST['trabalho']) ? $_POST['trabalho'] : null;
        $datanascimento = isset($_POST['datanascimento']) ? $_POST['datanascimento'] : null;



        if (Medico::update($idmedico, $nomeCompleto, $crm, $cpf, $rg, $datanascimento,
         $naturalidade, $nacionalidade, $email, $telefone, $celular, $idesp, $idestado,
          $idcidade, $endereco, $bairro, $cep, $complemento, $trabalho))
        {
            session_start();
            $sucessMsg = "Médico editado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /medicos');
            exit;
        
                
        }
        
    }


    /**
     * Remove um usuário
     */
    public function remove($id)
    {
        if (Medico::remove($id))
        {
            session_start();
            $sucessMsg = "Médico removido com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /medicos');
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
