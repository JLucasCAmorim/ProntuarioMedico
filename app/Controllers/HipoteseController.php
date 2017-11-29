<?php
namespace App\Controllers;
use \App\Models\Hipotese;
class HipoteseController {

    /*
     Exibe o formulário de criação de usuário
     */
    public function create($id)
    {
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['medico'])))
        {
        \App\View::make('Hipótese','hipotese/create',['id' => $id]);
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
        $hipotese = isset($_POST['hipotese']) ? $_POST['hipotese'] : null;
        $observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : null;
        $agendamento_id = $_POST['agendamento_id'];

        if (Hipotese::save($hipotese, $observacoes ,$agendamento_id))
        {
            session_start();
            $id = $agendamento_id;
            $sucessMsg = "Hipótese adicionada com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header("Location: /add/prescricao/$id");
            exit;
        }
        
    }




    
}
