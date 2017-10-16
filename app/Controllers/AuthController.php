<?php
namespace App\Controllers;
use \App\Models\User;

class AuthController {

  /** * Listagem de usuários */
  public function index()
  {

    session_start();
    if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])))
    {
      
      \App\View::make('Home','home/index');
     }
      else{
      \App\View::make('Login','Auth/login');
      }
    }

    public function create()
    {
        session_start();
        if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])) && (!empty ($_SESSION['admin'])))
        {
       

        \App\View::make('Cadastrando Usuário','Auth/registro');
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
        $dados = $_POST;
        
        // pega os dados do formuário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $confirmar = isset($_POST['confirmar']) ? $_POST['confirmar'] : null;
        $role = isset($_POST['role']) ? $_POST['role'] : null;

     
        if(empty($nome) &&  empty($email) &&  empty($password) &&  empty($role) &&  empty($confirmar)){
            $nome_error = "Coloque seu nome!";
            $confirmar_error = "Confirme sua senha!";
            $password_error = "Coloque sua senha!";
            $email_error = "Coloque seu email!";
            $role_error = "Coloque a permissão";
            \App\View::make('Cadastrando Usuário','Auth/registro', ['nome_error' => $nome_error,'confirmar_error' => $confirmar_error
            ,'password_error' => $password_error,'role_error' => $role_error,'email_error' => $email_error,'dados' => $dados]);
        }
        elseif(empty($_POST['nome']) &&  empty($_POST['email']) &&  empty($_POST['password']) &&  empty($_POST['role'] ) ){
            $nome_error = "Coloque seu nome!";
            $password_error = "Coloque sua senha!";
            $email_error = "Coloque seu email!";
            $role_error = "Coloque a permissão";
            \App\View::make('Cadastrando Usuário','Auth/registro', ['nome_error' => $nome_error,'email_error' => $email_error
            ,'password_error' => $password_error,'role_error' => $role_error,'dados' => $dados]); 
        }
        elseif(empty($_POST['nome']) &&  empty($_POST['email']) &&  empty($_POST['password'])){
            $nome_error = "Coloque seu nome!";
            $password_error = "Coloque sua senha!";
            $email_error = "Coloque seu email!";
            \App\View::make('Cadastrando Usuário','Auth/registro', ['nome_error' => $nome_error,'email_error' => $email_error
            ,'password_error' => $password_error,'dados' => $dados]); 
        }
        elseif(User::email($email)){
            $email_error = "Email já está inserido";
            \App\View::make('Cadastrando Usuário','Auth/registro', ['email_error' => $email_error ,'dados' => $dados]); 
        }
     
        
        
        if (User::save($nome, $email, $password, $role, $confirmar))
        {
            session_start();
            $sucessMsg = "Usuário adicionado com sucesso!";
            $_SESSION['mensagem'] = $sucessMsg;
            header('Location: /home');
            exit;
        }else{
            $password_error = "As senhas não batem!";
            $confirmar_error = "As senhas não batem!";
            \App\View::make('Cadastrando Usuário','Auth/registro', ['password_error' => $password_error ,
            'confirmar_error' => $confirmar_error ,'dados' => $dados]); 
        }
        
    }

    /**
     * Processa o formulário de criação de usuário
     */

    public function login()
    {
        // pega os dados do formuário
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $users = User::select($email, $password);
       

        header('Location: /home');
        exit;

    }
    public function logout(){
        session_start();
        session_destroy();
        header('Location: /');
        exit;

      

    }



}
