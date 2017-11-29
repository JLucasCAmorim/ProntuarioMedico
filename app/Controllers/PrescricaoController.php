<?php
namespace App\Controllers;
use \App\Models\Prescricao;
class PrescricaoController {

    /*
     Exibe o formulário de criação de usuário
     */
    public function create($id)
    {
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['medico'])))
        {
        \App\View::make('Prescrição Médica','prescricao/create',['id' => $id]);
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
        $prescricao = isset($_POST['prescricao']) ? $_POST['prescricao'] : null;
        $agendamento_id = $_POST['agendamento_id'];

        if (Prescricao::save($prescricao,$agendamento_id))
        {
            session_start();
            $id = $agendamento_id;
            $sucessMsg = "Prescrição adicionada com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header("Location: /add/evolucao/$id");
            exit;
        }
        
    }




    
}
