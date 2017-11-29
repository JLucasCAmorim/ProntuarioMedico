<?php
namespace App\Controllers;
use \App\Models\Atestado;
class AtestadoController {

    /*
     Exibe o formulário de criação de usuário
     */
    public function create($id)
    {
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['medico'])))
        {
        \App\View::make('Atestado','atestados/create',['id' => $id]);
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
        $texto = isset($_POST['texto']) ? $_POST['texto'] : null;
        $agendamento_id = $_POST['agendamento_id'];

        if (Atestado::save($texto,$agendamento_id))
        {
            session_start();
            $sucessMsg = "Atendimento finalizado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header("Location: /");
            exit;
        }
        
    }




    
}
