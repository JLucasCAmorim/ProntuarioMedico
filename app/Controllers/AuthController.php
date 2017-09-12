<?php
namespace App\Controllers;
use \App\Models\User;

class AuthController {

  /** * Listagem de usuários */
  public function index()
  {

      if(!empty($_COOKIE['login'])){
        \App\View::make('home/index');
      }
      else{
      \App\View::make('Auth/login');
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

      if(isset($_COOKIE['login'])){

        setcookie("login","");
        header('Location: /');
        exit;

      }

    }



}
