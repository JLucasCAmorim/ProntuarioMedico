<?php
namespace App\Controllers;
use \App\Models\Sinais;
class SinaisController {

    /*
     Exibe o formulário de criação de usuário
     */
    public function create($id)
    {
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['medico'])))
        {
        \App\View::make('Sinais Vitais','sinais/create',['id' => $id]);
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
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
        $altura = isset($_POST['altura']) ? $_POST['altura'] : null;
        $peso = isset($_POST['peso']) ? $_POST['peso'] : null;
        $imc = isset($_POST['imc']) ? $_POST['imc'] : null;
        $temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : null;
        $dor = isset($_POST['dor']) ? $_POST['dor'] : null;
        $agendamento_id = $_POST['agendamento_id'];

        if (Sinais::save($data, $hora, $altura, $peso, $imc, $temperatura, $dor , $agendamento_id))
        {
            session_start();
            $id = $agendamento_id;
            $sucessMsg = "Sinais Vitais adicionados com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header("Location: /add/hipotese/$id");
            exit;
        }
        
    }




    
}
