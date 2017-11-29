<?php
namespace App\Controllers;
use \App\Models\Evolucao;
class EvolucaoController {

    /*
     Exibe o formulário de criação de usuário
     */
    public function create($id)
    {
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['medico'])))
        {
        \App\View::make('Evolução do Paciente','evolucao/create',['id' => $id]);
         }
          else{
            \App\View::make('Login','Auth/login');
        }
    }

    /*
      Processa o formulário de criação de usuário
     */
    public function store()
    {
        session_start();
        $dados = $_POST;
        // pega os dados do formuário
        $evolucao = isset($_POST['evolucao']) ? $_POST['evolucao'] : null;
        $agendamento_id = $_POST['agendamento_id'];

        if (Evolucao::save($evolucao,$agendamento_id))
        {
            session_start();
            $id = $agendamento_id;
            $sucessMsg = "Evolução adicionada com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header("Location: /add/atestado/$id");
            exit;
        }
        
    }




    
}
