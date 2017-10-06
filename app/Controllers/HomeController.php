<?php
namespace App\Controllers;

class HomeController {

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

}
