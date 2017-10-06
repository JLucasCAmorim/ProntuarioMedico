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
